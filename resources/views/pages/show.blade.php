@extends('layouts.app')

@section('title')
    Services
@endsection

@section('contenu')

        <h1>Les détail du produit</h1>
        <hr>
        <h2>{{$product->product_name}}</h2>
        <h3>{{$product->product_price}} $</h3>
        <hr>
        <p>{{$product->description}}</p>
        <h4>Crée à {{$product->created_at}}</h4>
        <hr>

        {{--
            Utilisation de route dynamique
            Pour editer ou modifier unproduit nous devons prendre son ID
            --}}
        <a href="/edit/{{$product->id}}" class="btn btn-default">Edit</a>
        <a href="/delete/{{$product->id}}" class="btn btn-danger">Delete</a>
        
@endsection

       
