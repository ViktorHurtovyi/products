@extends('layouts.product')
@section('content')
    <main class="col-sm-9 offset-sm-4 col-md-5 offset-md-3 pt-3">
    <h1>Add product</h1>
        <br>
        <form method="post">
            {!! csrf_field() !!}
        <p>Name<br><input type="text" name="name" class="form-control"></p>
            <p>Descriptions<br><input type="text" name="descriptions" class="form-control"></p>
            <p>Price<br><input type="number" name="price" class="form-control"></p>
        <button type="submit" class="btn-success">add</button>
            <a class="col-sm-9 offset-sm-4 col-md-5 offset-md-8 pt-8 btn-success" href="{!! route('products') !!}">list</a>
    </form>
    </main>
@stop