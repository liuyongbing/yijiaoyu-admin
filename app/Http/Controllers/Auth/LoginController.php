<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\AccountsRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
        
        $this->init();
    }
    
    public function init()
    {
        $this->repository = new AccountsRepository();
    }
    
    public function login(){
        return view('auth.login');
    }
    
    public function auth(Request $request)
    {
        $data = [
            'username' => $request->input('mobile'),
            'code' => $request->input('code'),
        ];
        $result = $this->repository->login($data);
        
        if(!empty($result)) {
            $request->session()->put('id', $result['id']);
            $request->session()->put('account', $result['account']);
        }
        
        return redirect()->route('dashboard');
    }
    
    /**
     * 注销
     * @param Request $request
     */
    public function logout(Request $request)
    {
        $request->session()->flush();
        
        return redirect('login');
    }
}
