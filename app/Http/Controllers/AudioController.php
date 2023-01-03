<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class AudioController extends Controller
{

    public function index()
    {
        $req = "invent a new music melody with 5 notes, the format should be NOTE+OCTAVE in a json format";
        $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer ".env('OPENAIKEY'),
            ])->post("https://api.openai.com/v1/completions", [
                'prompt' => $req,
                'model'=> "text-davinci-003",
                'temperature'=> 0,
                'max_tokens'=> 200
            ]
        );
        //dd($response->json());
        $choices = $response->json()['choices'];
        $ole = json_decode($choices[0]["text"]);
        $res = [];
        foreach($ole as $x){
            $res[] = $x;
        }
        return view('play',compact('res'));
    }
    
}