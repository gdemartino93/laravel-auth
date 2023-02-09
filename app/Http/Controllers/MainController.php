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
            //https://laravel.com/docs/9.x/queries#aggregates query make with aggregates
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
    public function createNew(){
        return view('pages.addProduct');
    }
    public function store(Request $request){

        $data = $request ->validate([
            'name' => 'required|max:50|unique:products,name',
            'description' => 'required',
            'price' => 'integer|min:1',
            'img' => 'nullable',
            'discount' => 'nullable'
        ],[
            'name.unique' => "Esiste già un prodotto con lo stesso nome",
            'name.required' => 'Il nome è obbligatorio',
            'name.max' => 'Il tuo nome deve avere massimo 50 caratteri',
            'description.required' => 'La descrizione è obbligatorio',
            'price.integer' => 'Il prezzo deve essere numerico',
            'price.min' => 'Il prezzo minimo è di 1 euro'

        ]);
        $newProduct = new Product();

        $newProduct -> name = $data['name'];
        $newProduct -> description = $data['description'];
        $newProduct -> price = $data['price'];
        $newProduct -> img = $data['img'];
        // funzione php che verifica se una chiava ( discount) esiste all'interno di un array ( data)
        if(array_key_exists('discount', $data)) {
            // se è vero riorna 1 se è falso ritorna 0
            $newProduct -> discount = $data['discount'] ? 1 : 0;
        }

        $newProduct -> save();

        return redirect() -> route('dashboard');
    }

    public function deleteProduct(Product $product){
   
        $product -> delete();
        return redirect() -> route('dashboard');
    }
    public function redirectEditProduct(Product $product){

        $data = ["product" => $product];

        return view('pages.editProduct', $data);
    }

}
