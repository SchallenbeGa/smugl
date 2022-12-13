<?php
namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
class CaptchaServiceController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function capthcaFormValidate(Request $request, Closure $next)
    {
        $request->validate([
            'captcha' => 'required|captcha'
        ]);
        return $next($request);
    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}