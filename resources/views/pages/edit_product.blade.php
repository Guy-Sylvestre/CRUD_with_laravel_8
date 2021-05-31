@extends('layouts.app')

@section('title')
    Sauver les Produits
@endsection

@section('contenu')

    <form action="{{url('/editproduct')}}" method="POST" class="form-horizontal">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$product['id']}}">
        <div class="form-group">
            <label>Product</label>
            <input type="text" name="product_name" value="{{$product['product_name']}}" placeholder="Product Name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input type="text" name="product_price" value="{{$product['product_price']}}" placeholder="Product Price" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Product description</label>
            <textarea name="product_description" cols="30" rows="10" class="form-control">{{$product['description']}}</textarea>
        </div>
        <input type="submit" value="Modifier Produit" class="btn btn-primary">
    </form>













    {{--<form action="{{url('/editproduct')}}" method="POST" class="form-horizontal">
    {!! Form::open(['action' => 'App\Http\Controllers\PagesController@editproduct', 'method' => 'post', 'class' => 'form-horizontal']) !!}
        {{csrf_field()}}
        <div class="form-group">
            {{--Caché l'ID du produit pour le récupérer
            {{Form::label('id', $product->id)}}
            {{Form::label('', 'Product')}}
            {{Form::text('product_name', $product->product_name, ['placeholder'=>'Product Name', 'class' => 'form-control'])}}
            {{--<label>Product</label>
            <input type="text" value="" name="product_name" placeholder="Product Name" class="form-control" required>
        </div>
        <div class="form-group">
            {{Form::label('', 'Product Price')}} 
            {{Form::number('product_price', $product->product_price, ['placeholder'=>'Product Price', 'class' => 'form-control'])}}
            {{--<label>Product Price</label>
            <input type="number" value="" name="product_price" placeholder="Product Price" class="form-control" required>
        </div>
        <div class="form-group">
            {{Form::label('', 'Product description')}}
            {{Form::textarea('product_description', $product->description, ['placeholder'=>'Product Description', 'class' => 'form-control'])}}
            {{--<label>Product description</label>
            <textarea name="product_description" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <input type="submit" value="Modifier Produit" class="btn btn-primary">
    {!! Form::close() !!}
    {{--</form>--}}

@endsection
