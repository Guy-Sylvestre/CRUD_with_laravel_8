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
        <a href="/products/{{$product->id}}/edit" class="btn btn-default">Edit</a>
        

        {!! Form::open(['action' => ['App\Http\Controllers\ProductController@destroy', $product->id], 'class' => 'pull-right']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!! Form::close() !!}
@endsection

       
