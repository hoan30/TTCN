<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except([
    //         'logout', 'dashboard'
    //     ]);
    // }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'name' => 'required|min:2|max:250',
                'email' => 'required|email|max:250|unique:users',
                'phone' => 'required|max:250|unique:users',
                'password' => 'required|min:5|confirmed'
            ]);

        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password)
            ]);

            $credentials = $request->only('email', 'password');
            Auth::attempt($credentials);
            $request->session()->regenerate();

            return redirect()->back()->with(['mess'=>'Đăng ký thành công']);
        } catch (\Exception $e) {
            return back()->with([
                'mess' => 'Bạn vui lòng kiểm tra lại thông tin đăng ký.',
            ]);
        }
    }

    public function create(Request $request) {
        if($request->password != $request->re_password) {
            return redirect('register')->with([
               'mess' => 'Nhập lại mật khẩu không khớp.',
            ]);
        }
        try {
            $user = User::Create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
            ]);
            $user->syncRoles(2);
            $credentials = ([
                'email' => $request->email,
                'password' => $request->password,
            ]);
            if (Auth::attempt($credentials)) {
                return redirect()->route('home')->with([
                   'mess' => 'Đăng ký thành công .',
                ]);
            }else{
                return redirect('register')->with([
                   'mess' => 'Đăng ký thất bại thành công .',
                ]);
            }
        } catch (\Exception $e) {
            return redirect('register')->with([
               'mess' => 'Email đã có người sử dụng.',
            ]);
        }
    }



    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return back()
                ->with(['mess'=>'Đăng nhập thành công']);
        }

        return back()->with([
            'mess' => 'Vui lòng kiểm tra lại thông tin',
        ]);
    }

    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::check())
        {
            return view('auth.dashboard');
        }

        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')
            ->with(['mess' => 'You have logged out successfully!']);
    }
}
