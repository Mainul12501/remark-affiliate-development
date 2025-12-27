<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Laravel\Facades\Image;
use Uzzal\Acl\Traits\AccessControlled;

class User extends Authenticatable
{
    use HasFactory, Notifiable, AccessControlled;
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }
    public function getUserRoles(){
        return $this->hasMany(UserRole::class, 'user_id','id');
    }

    public static function checkValidation($request)
    {
        if($request->account_type == 'backend'){

            return Validator::make($request->all(), [

                'account_type'  => 'required|in:frontend,backend',
                'name'          => 'required|string|max:255',
                'email'         => 'required|email|max:255|unique:users,email',
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'confirmed',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$]).+$/'
                ],

                'mobile_no'     => ['required','regex:/^(01)[0-9]{9}$/', 'unique:users,mobile_no'],
                'role_id'       => 'required|array',
                'role_id.*'     => 'integer',
                'profile_image' => 'nullable|image|mimes:jpeg,jpg,webp,png|max:1048',

            ], [

                'account_type.required' => 'Account type field is required.',
                'account_type.in'       => 'Account type must be frontend or backend.',
                'name.required'         => 'Name is required.',
                'email.required'        => 'Email is required.',
                'email.email'           => 'Provide valid email address.',
                'email.unique'          => 'Email already exists.',
                'password.required'     => 'Password field is required.',
                'password.min'          => 'Password must be at least 8 characters long.',
                'password.confirmed'    => 'Password confirmation does not match.',
                'password.regex'        => 'Password must contain uppercase, lowercase, number and a special character (@, #, $).',
                'mobile_no.required'    => 'Mobile number is required.',
                'mobile_no.regex'       => 'Mobile number must be 11 digits & start with 01.',
                'mobile_no.unique'      => 'Mobile number already exists.',
                'role_id.required'      => 'Select at least one role.',
                'profile_image.image'   => 'Please upload valid image file.',
                'profile_image.mimes'   => 'Image must be jpeg, jpg, png or webp format.',
                'profile_image.max'     => 'Image size must be less than 1MB.',

            ]);
        }else{
            return Validator::make($request->all(), [
                'account_type'  => 'required|in:frontend,backend',
                'name'          => 'required|string|max:255',
                'email'         => 'required|email|max:255|unique:users,email',
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'confirmed',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$]).+$/'
                ],
                'mobile_no'     => ['required','regex:/^(01)[0-9]{9}$/', 'unique:users,mobile_no'],
                'profile_image' => 'nullable|image|mimes:jpeg,jpg,webp,png|max:1048',

            ], [

                'account_type.required' => 'Account type field is required.',
                'account_type.in'       => 'Account type must be frontend or backend.',
                'name.required'         => 'Name is required.',
                'email.required'        => 'Email is required.',
                'email.email'           => 'Provide valid email address.',
                'email.unique'          => 'Email already exists.',
                'password.required'     => 'Password field is required.',
                'password.min'          => 'Password must be at least 8 characters long.',
                'password.confirmed'    => 'Password confirmation does not match.',
                'password.regex'        => 'Password must contain uppercase, lowercase, number and a special character (@, #, $).',

                'mobile_no.required'    => 'Mobile number is required.',
                'mobile_no.regex'       => 'Mobile number must be 11 digits & start with 01.',
                'mobile_no.unique'      => 'Mobile number already exists.',
                'profile_image.image'   => 'Please upload valid image file.',
                'profile_image.mimes'   => 'Image must be jpeg, jpg, png or webp format.',
                'profile_image.max'     => 'Image size must be less than 1MB.',

            ]);
        }
    }

    public static function updateValidation($request,$user)
    {
        if($request->account_type == 'backend'){

            return Validator::make($request->all(), [
                'account_type'  => 'required|in:frontend,backend',
                'name'          => 'required|string|max:255',
                'email'         => 'required|email|max:255|unique:users,email,'. $user->id,
                'password' => [
                    'nullable',
                    'string',
                    'min:8',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$]).+$/'
                ],

                'mobile_no'     => ['required','regex:/^(01)[0-9]{9}$/', 'unique:users,mobile_no,' . $user->id],
                'role_id'       => 'required|array',
                'role_id.*'     => 'integer',
                'profile_image' => 'nullable|image|mimes:jpeg,jpg,webp,png|max:1048',

            ], [

                'account_type.required' => 'Account type field is required.',
                'account_type.in'       => 'Account type must be frontend or backend.',
                'name.required'         => 'Name is required.',
                'email.required'        => 'Email is required.',
                'email.email'           => 'Provide valid email address.',
                'email.unique'          => 'Email already exists.',
                'password.min'          => 'Password must be at least 8 characters long.',
                'password.regex'        => 'Password must contain uppercase, lowercase, number and a special character (@, #, $).',
                'mobile_no.required'    => 'Mobile number is required.',
                'mobile_no.regex'       => 'Mobile number must be 11 digits & start with 01.',
                'mobile_no.unique'      => 'Mobile number already exists.',
                'role_id.required'      => 'Select at least one role.',
                'profile_image.image'   => 'Please upload valid image file.',
                'profile_image.mimes'   => 'Image must be jpeg, jpg, png or webp format.',
                'profile_image.max'     => 'Image size must be less than 1MB.',

            ]);
        }else{
            return Validator::make($request->all(), [
                'account_type'  => 'required|in:frontend,backend',
                'name'          => 'required|string|max:255',
                'email'         => 'required|email|max:255|unique:users,email,'. $user->id,
                'password' => [
                    'nullable',
                    'string',
                    'min:8',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$]).+$/'
                ],
                'mobile_no'     => ['required','regex:/^(01)[0-9]{9}$/', 'unique:users,mobile_no,' . $user->id],
                'profile_image' => 'nullable|image|mimes:jpeg,jpg,webp,png|max:1048',

            ], [

                'account_type.required' => 'Account type field is required.',
                'account_type.in'       => 'Account type must be frontend or backend.',
                'name.required'         => 'Name is required.',
                'email.required'        => 'Email is required.',
                'email.email'           => 'Provide valid email address.',
                'email.unique'          => 'Email already exists.',
                'password.required'     => 'Password field is required.',
                'password.min'          => 'Password must be at least 8 characters long.',
                'password.regex'        => 'Password must contain uppercase, lowercase, number and a special character (@, #, $).',

                'mobile_no.required'    => 'Mobile number is required.',
                'mobile_no.regex'       => 'Mobile number must be 11 digits & start with 01.',
                'mobile_no.unique'      => 'Mobile number already exists.',
                'profile_image.image'   => 'Please upload valid image file.',
                'profile_image.mimes'   => 'Image must be jpeg, jpg, png or webp format.',
                'profile_image.max'     => 'Image size must be less than 1MB.',

            ]);
        }
    }
    public static function imageUpload($request)
    {
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $ext = uniqid() . '.' . $file->getClientOriginalExtension();
            if ($request->is('admin/*')) {
                $store = './backend/uploads/';
            } else {
                $store = './front/uploads/';
            }
            $path = $store . $ext;
            Image::read($file)->resize(160, 135)->save($path, quality: 75, progressive: true);
            return $path;
        }
    }

    public static function storeUserInfo($request)
    {
        $userData = [
            'name'                  => $request->name ?? null,
            'email'                 => $request->email ?? null,
            'password'              => Hash::make($request->password),
            'mobile_no'             => $request->mobile_no,
            'account_type'          => $request->account_type,
            'password_changed_at'   => now(),
            'profile_image'         => self::imageUpload($request),
        ];

        $user = User::create($userData);

        if ($user && !empty($request->role_id)) {
            self::insertUserRoleInfo($request, $user);
        }

        return $user;
    }

    public static function updateUserInfo($request, $user)
    {
        $userData = [
            'name'          => $request->name ?? $user->name,
            'email'         => $request->email ?? null,
            'mobile_no'     => $request->mobile_no,
            'account_type'  => $request->account_type,
            'is_active'     => $request->is_active,
        ];

        if ($request->filled('password')) {
            $userData['password']            = Hash::make($request->password);
            $userData['password_changed_at'] = now();
        }

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');

            if (!empty($image)) {
                if (!empty($user->profile_image) && file_exists($user->profile_image)) {
                    @unlink($user->profile_image);
                }

                $userData['profile_image'] = self::imageUpload($request);
            }
        } else {
            $userData['profile_image'] = $user->profile_image;
        }

        $user->update($userData);

        if ($request->account_type == 'backend') {
           UserRole::where('user_id', $user->id)->delete();
            if (!empty($request->role_id)) {
                self::insertUserRoleInfo($request, $user);
            }
        } else {
           UserRole::where('user_id', $user->id)->delete();
        }

        return $user;
    }
    public static function profileInfoUpdate($request, $user)
    {
        $image = $request->hasFile('profile_image');
        if (!empty($image)) {
            if (file_exists($user->profile_image)) {
                unlink($user->profile_image);
                $imageUrl = self::imageUpload($request);
            } else {
                $imageUrl = self::imageUpload($request);
            }
        } else {
            $imageUrl = $user->profile_image;
        }

        $user->update([
            'name'              => $request->name ?? $user->name,
            'email'             => $request->email ?? $user->email,
            'mobile_no'         => $request->mobile_no ?? $user->mobile_no,
            'profile_image'     => $imageUrl ?? $user->profile_image,
        ]);
        return $user;
    }

    public static function insertUserRoleInfo($request, $user)
    {
        if (!empty($request->role_id)) {
            foreach ($request->role_id as $item) {
                UserRole::create([
                    'user_id' => $user->id ?? 0,
                    'role_id' => $item ?? 0
                ]);
            }
        }
    }

}
