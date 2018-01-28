@extends('layouts.product')
@section('content')
    <main class="col-sm-9 offset-sm-4 col-md-5 offset-md-3 pt-3">
        <h1 >Products</h1>
        <br>
        <br><br><br>
        <table class="table table-bordered">
            <tr>
                <th>price</th>
                <th>Updated at</th>
            </tr>
            @foreach($price as $price)
                <tr>
                    <td>{{$price->price}}</td>
                    <td>{{$price->created_at->format('d-m-y H:i:s ')}}</td>
                </tr>
            @endforeach
        </table>
        <a class="col-sm-9 offset-sm-4 col-md-5 offset-md-8 pt-8 btn-success" href="{!! route('products') !!}">list</a>
    </main>
@stop