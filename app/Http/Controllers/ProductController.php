<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('product_name', 'asc')->paginate(3);

        /*$products =DB::table('products')
                    #Afficher en orde ascendant
                    ->orderBy('product_name', 'asc')
                    #Système de pagination
                    ->paginate(1);
                    #->get();*/
       
        //return '<h1> Bienvenudans ce cours </h1>';
        return view('products.services')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product =new Product();
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->description = $request->description;

        #Sauvegarder
        $product->save();

        #Ajoute de session de massage
        Session::put('message', 'Le produit '.$request->product_name.' '.' a été inseré avec succes');

        #Redirection
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        return view('products.edit_product', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        #Récupération de l'ID pour la mise a jour de mes données
        #return $request->input();
        $product = Product::find($id);

        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->description = $request->product_description;

        $product->update();

        #return redirect('/services');
        #Une rédirecttion
        return redirect('/products')->with('message', 'Le produit '.$request->product_name.' a été modifié avec succès ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);

        $product->delete();
    
        return redirect('/products')->with('message', 'Le produit '.$product->product_name.' a été supprimé avec succès ');
    
    }
}
