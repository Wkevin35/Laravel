<?php

namespace App\Http\Middleware;

use App\Shop\Entity\User;

use Closure;

class AuthUserAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //預設不允許存取
        $is_allow_access = false;
        //取得會員編號
        $user_id = session()->get('user_id');

        if (!is_null($user_id)){
            //sesssion有會員編號 取得會員資料
            $User = User::findOrFail($user_id);

            if ($User->type == 'A'){
                //是管理者允許存取
                $is_allow_access = true;
            }
        }

        if (!$is_allow_access){
            return redirect()->to('/');
        }
        
        return $next($request);
    }
}
