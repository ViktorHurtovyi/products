@extends('layouts.product')
@section('content')
    <main class="col-sm-9 offset-sm-4 col-md-5 offset-md-3 pt-3">
        <br>
        <form method="post">
            {!! csrf_field() !!}
            <p>name: <br><input type="text" name="name" class="form-control" required value="{{$product->name}}"></p>
        <p>descriptions <br><input name="descriptions" class="form-control" value="{{$product->descriptions}}"></p>
            <p>price: <br><input type="number" name="price" class="form-control" value="{{$product->price}}"></p>
            <button type="submit" class="btn-success" style="cursor: pointer">change</button>
        </form>
    </main>
@stop