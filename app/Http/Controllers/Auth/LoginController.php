<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('guest',['except'=>'logout']);
    }

    // protected function credentials(Request $request)
    // {
    //     $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
    //         ? $this->username()
    //         : 'username';

    //     return [
    //         $field => $request->get($this->username()),
    //         'password' => $request->password,
    //     ];
    // }

    public function login(Request $request){
        
    // $this->validate($request, [
    //     'email'    => 'required',
    //     'password' => 'required',
    // ]);

    $login_type = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL ) ? 'username' : 'username';

    $request->merge([
        $login_type => $request->input('username')
    ]);

    if (Auth::attempt($request->only($login_type, 'password'))) {
        $request->session()->flash('status','Selamat datang di sistem pendukung keputusan kenaikan kelas SMK Widya Dharma');
        return redirect()->intended($this->redirectPath());
    }

    return redirect()->back()
        ->withInput()
        ->with('status-danger','Username atau Password Salah');
    } 
}
