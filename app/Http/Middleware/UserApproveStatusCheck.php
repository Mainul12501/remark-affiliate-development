<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;
use Symfony\Component\HttpFoundation\Response;

class UserApproveStatusCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = CustomHelper::loggedUser();
        if ($user->approve_status == 1 || $user->is_super_dev)
        {
            return $next($request);
        }else {
            return CustomHelper::returnRedirectWithMessage($user->user_type == 'influencer' ? route('influencer.profile-verify') : ($user->user_type == 'partner'?route('partner.profile-verify') : route('home')) , 'error', 'Your Account has not been Approved yet. Please contact the administrator.');
        }
    }
}
