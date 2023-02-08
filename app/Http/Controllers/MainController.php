<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function home(){
        return view('pages.home');
    }
    public function sezionePrivata(){
        // se loggato ritorna pagina sezione privata altrimenti ritorna il login
        if(Auth::class){
            return view('pages.privateSection');
        }else{
            return view('pages.login');
        }
    }
}
