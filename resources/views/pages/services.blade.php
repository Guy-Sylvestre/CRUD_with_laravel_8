@extends('layouts.app')

@section('title')
    Services
@endsection

@section('contenu')

        @if (Session::has('message'))
        <div class="alert alert-succes">
            {{----------------------------Afficher le message---------------------}}
            {{Session::get('message')}}
            {{--------------------------Supprimer le message--------------------}}
            {{Session::put('message', null)}}
        </div>
        @endif
        <h1>Welcome to the services page</h1>

        @foreach ($products as $product)
            <div class="well">
                <h3><a href="/show/{{$product->id}}">{{$product->product_name}}</a></h3>
            </div>
        @endforeach
    
        {{--Système de pagination--}}
        {{$products->links()}} 
    
        {{--<div class="jumbotron">
            <h1>Welcome to the laravel 7.X project</h1>
        </div>--}}

@endsection

       
