@extends('layouts.app')

@section('title')
    Sauver les Produits
@endsection

@section('contenu')

    @if (Session::has('message'))
        <div class="alert alert-success">
            {{----------------------------Afficher le message---------------------}}
            {{Session::get('message')}}
             {{--------------------------Supprimer le message--------------------}}
            {{Session::put('message', null)}}
        </div>
    @endif

    {{--<form action="{{url('/products/store')}}" method="POST" class="form-horizontal">--}}
    {!! Form::open(['action' => 'App\Http\Controllers\ProductController@store', 'methode'=> 'POST', 'class' => 'form-horizontal']) !!}
        {{csrf_field()}}
        <div class="form-group">
            <label>Product</label>
            <input type="text" name="product_name" placeholder="Product Name" class="form-control" >
        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input type="text" name="product_price" placeholder="Product Price" class="form-control" >
        </div>
        <div class="form-group">
            <label>Product description</label>
            <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <input type="submit" value="Ajouter Produit" class="btn btn-primary">
    {{--</form>--}}
    {!! Form::close() !!}

@endsection
