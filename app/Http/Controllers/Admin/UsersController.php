<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use App\Services\Backend\AdminUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = User::with(['roles', 'getUserRoles']);

            if (hasRole(['developer', 'super-admin'])) {
                // Full access - no additional filters
            } elseif (hasRole(['admin'])) {
                $query->where('id', auth()->id());
            } else {
                $query->where('id', auth()->id());
            }

            $model = $query->whereNotIn('id', [1])->latest();

            if (!empty($request->from_date) && !empty($request->to_date)) {
                $fromDate = Carbon::parse($request->from_date)->startOfDay();
                $toDate = Carbon::parse($request->to_date)->endOfDay();
                $model->whereBetween('created_at', [$fromDate, $toDate]);
            }

            if ($request->ajax()) {
                return DataTables::of($model)

                    ->addColumn('profile_image', function ($user) {
                        return !empty($user->profile_image)
                            ? asset($user->profile_image)
                            : asset('/backend/default_img/1.png');
                    })
                    ->editColumn('created_at', function ($model) {
                        return $model->created_at->format('Y-m-d');
                    })
                    ->addColumn('roles', function ($user) {
                        return $user->roles->pluck('name')->implode(', ');
                    })

                    ->filterColumn('created_at', function ($query, $keyword) {
                        $query->whereDate('created_at', 'like', "%{$keyword}%");
                    })

                    ->filterColumn('is_active', function ($query, $keyword) {
                        $keyword = strtolower(trim($keyword));

                        if ($keyword === 'enabled' || $keyword === 'active') {
                            $query->where('is_active', 1);
                        } elseif (in_array($keyword, ['inactive', 'deactive', 'de-active', 'disabled'])) {
                            $query->where('is_active', 0);
                        }
                    })
                    ->smart(false)
                    ->toJson();
            }
            return view('admin.users.index');
        } catch (Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'error' => 'Failed to load users',
                    'message' => $e->getMessage()
                ], 500);
            }
            return back()->with(['message' => 'Failed to load users. Please try again.', 'alert-type' => 'error']);
        }
    }
    public function create()
    {
        $roles = Role::whereNotIn('role_id',[1])->get(['role_id','name'])??'';
        return view('admin.users.create',['roles'=>$roles]);
    }
    public function store(Request $request)
    {
        try {
            $validator = User::checkValidation($request);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $user =  User::storeUserInfo($request);
            if($user){
                return back()->with(['message' => 'User created successfully','alert-type' => 'primary']);
            }
        }catch (Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }

    public function show(User $user)
    {
        return view('admin.users.show',['user'=>$user]);
    }

    public function edit(User $user)
    {
        $roles = Role::whereNotIn('role_id',[1])->get(['role_id','name'])??'';
        return view('admin.users.edit',['user'=>$user,'roles' => $roles]);
    }

    public function update(Request $request, User $user)
    {
        try {
            $validator = User::updateValidation($request,$user);
            if($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }

            $update_data =  User::updateUserInfo($request,$user);

            if($update_data){
                return redirect('admin/users')->with(['message'=> 'User updated successfully !','alert-type'=>'primary']);
            }
        }catch (Exception $ex){
            echo 'Caught exception: ', $ex->getMessage(), "\n";
        }
    }

    public function destroy(User $user)
    {
        // 1️⃣ Permission check আগে
        if (!hasRole(['super-admin'])) {
            return response()->json([
                'status'  => false,
                'message' => 'This action is unauthorized!',
            ], 403);
        }

        // 2️⃣ চাইলে নিজের account delete ব্লক করতে পারো (recommended)
        if ($user->id === auth()->id()) {
            return response()->json([
                'status'  => false,
                'message' => 'You cannot delete your own account.',
            ], 422);
        }

        $user->update(['is_active' => 0]);
        if ($user->account_type === 'backend') {
            UserRole::where('user_id', $user->id)->delete();
        }
        if ($user->profile_image && file_exists(public_path($user->profile_image))) {
            @unlink(public_path($user->profile_image));
        }
        $user->delete();
        return response()->json([
            'status'  => true,
            'message' => 'User deleted successfully!',
        ]);
    }


    public function profile(){
        $user = Auth::user();
        if(!empty($user)){
            return view('admin.users.profile',['user' => $user??'']);
        }else{
            Auth::logout();
            return redirect()->route('login');
        }
    }
    public function updateProfile(Request $request){

        $user = Auth::user();

        if(!empty($user)){
            $request->validate([
                'mobile'        => 'nullable|regex:/^(01)[0-9]{9}$/|max:11|unique:users,mobile,' . $user->id,
                'profile_image' => 'nullable|image|mimes:jpeg,jpg,webp|max:1024',
            ]);

            $update_data = AdminUserService::profileInfoUpdate($request,$user);

            if($update_data){
                return redirect()->back()->with(['message'=>'Profile info updated !!','alert-type'=>'primary']);
            }else{
                return redirect()->back()->with(['message'=>'Profile info not updated !!','alert-type'=>'error']);
            }
        }else{
            Auth::logout();
            return redirect()->route('login');
        }
    }
    public function pwChange()
    {
        return view('admin.users.password');
    }
    public function pwUpdate(Request $request){

        $this->validate($request,[
            'old_password'          =>  'required',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$]).+$/'
            ],
            'password_confirmation' =>  'required',
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with(['message'=>'Old password not matched .','alert-type'=>'error']);
        }else{
            User::where('id', auth()->user()->id )->update([
                'password' => Hash::make($request->password),
                'password_changed_at'=> now(),
            ]);
            Auth::logout();
            return redirect('/admin/login')->with(['message'=>'Password change successfully !!','alert-type'=>'primary']);
        }
    }
}
