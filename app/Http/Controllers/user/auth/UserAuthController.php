<?php
namespace App\Http\Controllers\user\auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class UserAuthController extends Controller
{
    public function signUpPage()
    {
        $binding = [
        	'title'=>'註冊'
        ];

        return view('auth.signUp',$binding);
    }

    public function signupProcess()
    {
        $input = request()->all();
        
        $rules=[
            //暱稱
            'nickname'=>[
                'required',
                'max:50'
            ],
            //Email
            'email'=>[
                'required',
                'max:150',
                'email'
            ],

            //密碼
            'password'=>[
                'required',
                'same:password_confirmation',
                'min:6'
            ],

            //密碼驗證
            'password_confirmation'=>[
                'required',
                'min:6'
            ],

            //帳號類型
            'type'=>[
                'required',
                'in:G,A'
            ]
        ];

        $validator = Validator::make($input,$rules);

        if ($validator -> fails()){
            return redirect('/user/auth/sign-up')
                   ->withErrors($validator);
        }else{
            echo "sucessful";
        }
    }
}