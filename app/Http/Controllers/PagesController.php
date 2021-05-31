<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

#laravel query bulder pour la base de données
use Illuminate\Support\Facades\DB;


use Session;

#Gestion avec notre propre modèle
use App\Models\Product;


class PagesController extends Controller
{
    //
#-----------------------------------------------------------------------
#-------------------------------- HOME ----------------------------
    public function home() {
        $products = Product::orderBy('product_name', 'asc')->paginate(3);

        /*$products =DB::table('products')
                    #Afficher en orde ascendant
                    ->orderBy('product_name', 'asc')
                    #Système de pagination
                    ->paginate(1);
                    #->get();*/
       
        //return '<h1> Bienvenudans ce cours </h1>';
        return view('pages.home')->with('products', $products);
    }



#-------------Afficher les détails d'un produit en fonctionde son ID --------------------
    public function show($id){

        /*$product = DB::table('products')
                    ->where('id', $id)
                    ->first();*/

        $product = Product::find($id);
        return view('pages.show')->with('product', $product);
    }

#------------Afficher les valeur des  produits depuis le font end ----------------------
    public function edit($id){
        $product = Product::find($id);
        return view('pages.edit_product', ['product' => $product]);
        #$product = Product::find($id);
        #return view('pages.edit_product')->with('product', $product);
    }

#------------Modifier le produit depuis le font end -------------------------------------
    public function editproduct(Request $request){

        #Récupération de l'ID pour la mise a jour de mes données
        #return $request->input();
        $product = Product::find($request->id);

        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->description = $request->product_description;

        $product->update();

        #return redirect('/services');
        #Une rédirecttion
        return redirect('/services')->with('message', 'Le produit '.$request->product_name.' a été modifié avec succès ');
    }

#------------Supprimer le produit depuis le font end -------------------------------------
public function delete(Request $request){

    $product = Product::find($request->id);

    $product->delete();

    return redirect('/services')->with('message', 'Le produit '.$product->product_name.' a été supprimé avec succès ');
}


#-----------------------------------------------------------------------
#-------------------------------- APROPOS ----------------------------
    public function apropos() {
        //return '<h1> Bienvenudans la page appros </h1>';
        return view('pages.apropos');
    }




#-----------------------------------------------------------------------
#-------------------------------- SERVICES ----------------------------
    public function services() {

        $products = Product::orderBy('product_name', 'asc')->paginate(3);

        /*$products =DB::table('products')
                    #Afficher en orde ascendant
                    ->orderBy('product_name', 'asc')
                    #Système de pagination
                    ->paginate(1);
                    #->get();*/
       
        //return '<h1> Bienvenudans ce cours </h1>';
        return view('pages.services')->with('products', $products);
        //return view('pages.services');
    }


#-----------------------------------------------------------------------
#-------------------------------- NEW PRODUCT ----------------------------
    public function create(){
        return view('pages.create');
    }


    /*Comme il s'agit d'inserer des objects dans la base de données on utilise "Request" suivie
    d'un argument '$request'
    */
    public function saveproduct(Request $request){
        $product =new Product();
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->description = $request->description;

        #Sauvegarder
        $product->save();

        #Ajoute de session de massage
        Session::put('message', 'Le produit '.$request->product_name.' '.' a été inseré avec succes');

        #Redirection
        return redirect('/create');
    }

    
}
