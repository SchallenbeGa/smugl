<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if ( captcha_check($request->captcha) == false ) {
            return back()->with('captcha','incorrect captcha!');
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'pub' => ['required', 'string','unique:'.User::class],
            'captcha' => ['required', 'captcha']
        ]);
        /*
        try{
            Spatie\Crypto\Rsa\PublicKey::fromString($request->pub);
        }catch(Exception $e){
            dd($e);
        }
        */
       

        $user = User::create([
            'name' => $request->name,
            'pub' =>   base64_encode($request->pub),
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
