@extends('layouts.app')

@section('title')
    Home
@endsection


@section('contenu')

    <h1>Welcome to the services Home</h1>

    @foreach ($products as $product)
        <div class="well card my-3">
            <h3 class="card-header"><a href="/show/{{$product->id}}">{{$product->product_name}}</a></h3>
            <h4 class="card-body">{{$product->product_price}} $</h4>
            <small class="card-footer">Crée à {{$product->created_at}}</small>
        </div>
    @endforeach

    {{--Système de pagination--}}
    {{$products->links()}} 

    {{--<div class="jumbotron">
        <h1>Welcome to the laravel 7.X project</h1>
    </div>--}}
    
@endsection

       
