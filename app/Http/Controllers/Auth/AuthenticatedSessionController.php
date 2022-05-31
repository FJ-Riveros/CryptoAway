<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
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
    // public function store(LoginRequest $request)
    public function store(Request $request)
    {

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);

      //   $credentials = $request->validate([
      //     'email' => ['required', 'email'],
      //     'password' => ['required'],
      //   ]);

      // if (Auth::attempt($credentials)) {
      //     $request->session()->regenerate();

      //     return redirect()->intended('dashboard');
      // }else{
      //   return "Incorrect Login";

      // }
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

    public $loginAfterSignUp = true;


    public function APILogin(Request $request)
    {
      $credentials = $request->only(['email', 'password']);

      if(auth()->attempt($credentials)){
          return "Loggeado con exito";
      }

      return "Ha fallado";
    //   if (!$token = auth()->attempt($credentials)) {
    //     return response()->json(['error' => 'Unauthorized'], 401);
    //   }

    //   return $this->respondWithToken($token);
    }
    public function getAuthUser(Request $request)
    {
        return response()->json(auth()->user());
    }
    
    protected function respondWithToken($token)
    {
      return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
      ]);
    }
}
