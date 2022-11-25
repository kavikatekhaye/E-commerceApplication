<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

     $rules = [
        'email'    => 'required|email',
        'password' => 'required',
    ];

    $request->validate($rules);
    // check if exists
    $data = request(['email', 'password']);
    $userExist = User::where('email',$data['email'])->where('roles',1)->count();
    if($userExist == 1){
       $request->authenticate();

       $request->session()->regenerate();
       return redirect()->route('login');

    }else{
       return redirect()->route('index');

    }

    if (!auth()->attempt($data)) {

        return back()->with(["msg", "wrong details please try again"]);

    }
        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
