<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function home(){
        // $product = Product::orderBy('created_at', 'DESC') -> get();
        $products = Product::all();
        $data = ['products' => $products];
        return view('pages.home', $data);
    }
    
    public function sezionePrivata(){
        // se loggato ritorna pagina sezione privata altrimenti ritorna il login
        if(Auth::check()){
            $products = Product::where('discount',true) ->get();
            $data = ["products" => $products];
            return view('pages.privateSection',$data);
        }else{
            return view('pages.userOnly');
        }
        // per usare il metodo "standard" nella rotta gestire con middleware
    }
}
