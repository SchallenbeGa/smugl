<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class PgpController extends Controller
{
    public function index()
    {  
        return view('auth.pgp_check');
    }
   
    public function store(Request $request)
    {
        if ( captcha_check($request->captcha) == false ) {
            return back()->with('captcha','incorrect captcha!');
        }
        $request->validate([
            'decrypted_code' => ['required', 'string', 'max:255'],
            'captcha' => ['required', 'captcha']
        ]);     
        return redirect(RouteServiceProvider::HOME);
    }
    
}
