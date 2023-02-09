<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function home(){
        // $product = Product::orderBy('created_at', 'DESC') -> get();
        $products = Product::all();
        $data = ['products' => $products];
        return view('pages.home', $data);
    }
    
    public function sezionePrivata(){
        if(Auth::check()){
            $products = Product::where('discount',true) ->get();
            $data = ["products" => $products];
            return view('pages.privateSection',$data);
        }else{
            return view('pages.userOnly');
        }
        // per usare il metodo "standard" nella rotta gestire con middleware
    }
    
    public function dashBoard(){
        if(Auth::check()){
            $users = User::all();
            $products = Product::all();
            $discounts = Product::where('discount',true) ->get();
            // https://laravel.com/docs/5.0/queries#aggregates query make with aggregates
            $prices = DB::table('products')
                    -> sum('price');
            $data = [
                    "users" => $users,
                    "products" => $products,
                    "discounts" => $discounts,
                    "prices" => $prices
                    ];
            return view('pages.dashboard',$data);
        }else{
            return view('pages.userOnly');
        }
    }
}
