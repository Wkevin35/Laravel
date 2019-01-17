<?php
namespace App\Http\Controllers\user\auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shop\Entity\User;
use Validator;
use Hash;
use Mail;

class UserAuthController extends Controller
{
    //登入畫面
    public function signInPage(){
        $binding = [
            'title' => '登入'
        ];

        return view('auth.signIn',$binding);
    }

    //登入表單檢查
    public function signInProcess(){
        $input = request()->all();

        $rules = [
            'email'=>[
                'required',
                'max:150',
                'email'
            ],
            'password'=>[
                'required',
                'min:6'
            ]
        ];

        $validator = Validator::make($input,$rules);

        if ($validator->fails()){
            return redirect('/user/auth/sign-in')
                   ->withErrors($validator) 
                   ->withInput();
        }

        //撈取使用者資料
        $User = User :: where('email',$input['email'])->firstOrFail();

        //檢查密碼是否正確
        $is_password_correct = Hash::check($input['password'], $User->password);

        if (!$is_password_correct){
            //密碼錯誤回傳錯誤訊息
            $error_message=[
                'msg'=>[
                    '密碼驗證錯誤'
                ]
            ];
            return redirect('/user/auth/sign-in')
                   ->withErrors($error_message)
                   ->withInput();
        }

        //創建session陣列
        $User_array=[
            $this->NICK_NAME=>$User->nickname,//暱稱
            $this->TYPE => $User->type,      //會員型別
            $this->USER_ID => $User->id,          //會員ID
        ];
        session()->push($this->USER,$User_array);
        // session()->put($this->USER_ID,$User->id);
        // session()->put($this->NICK_NAME,$User->nickname);
        // session()->put($this->TYPE,$User->type);
        // return redirect('/user/auth/sign-in')
        //         ->with('success','登入成功');
        return redirect()->intended('/')->with('success','登入成功');
    }

    //註冊畫面
    public function signUpPage()
    {
        $binding = [
        	'title'=>'註冊'
        ];

        return view('auth.signUp',$binding);
    }

    //註冊表單檢查
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
                   ->withErrors($validator)
                   ->withInput();
        }

        //密碼加密
        $input['password'] = Hash::make($input['password']);

        //新增會員資料
        $Users = User::create($input);

        // $mail_binding = [
        //     'nickname' => $input['nickname']
        // ];

        // Mail::send('email.signUpEmailNotification', $mail_binding, function ($message) use($input){
        //     //寄件人
        //     $message->to($input['email']);
        //     //收件人
        //     $message->from('j309028133@gmail.com');
        //     //郵件主旨
        //     $message->subject('恭喜註冊 Shop Laravel 成功');
        // });

        //重新導向到登入頁
        return redirect('user/auth/sign-in')
               ->with('success','註冊成功');
    }

    //登出
    public function signOut(){
        //清除session
        // session()->forget($this->USER_ID);
        session()->forget($this->USER);

        return redirect('/');
    }
}