@extends('layouts.product')
@section('content')
    <main class="col-sm-9 offset-sm-4 col-md-7 offset-md-3 pt-3">
        <h1 class="offset-md-4">Products</h1>
        <br>
        <a href="{!! route('products.add') !!}" class="btn btn-info offset-md-4">add product</a>
        <br><br><br>
        <table class="table table-bordered">
            <tr>
                <th>name</th>
                <th>description</th>
                <th>Price</th>
                <th>Created</th>
                <th>Last update</th>
                <th>Actions</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->descriptions}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->created_at->format('d-m-y H:i:s ')}}</td>
                    <td>{{$product->updated_at->format('d-m-y H:i:s ')}}</td>
                    <td><a href="{!! route('products.edit', ['id' => $product->id]) !!}">Change</a>
                        ||
                        <a href="javascript:;" class="delete" rel="{{$product->id}}">delete</a>
                    ||
                    <a href="{!! route('products.priceHistory', ['id' => $product->id]) !!}">Price History</a></td>
                </tr>
            @endforeach
        </table>
    </main>
@stop
@section('js')
    <script>
        $(function(){
            $(".delete").on('click', function () {
                    let id = $(this).attr("rel");
                    $.ajax({
                        type: "DELETE",
                        url: "{!! route('products.delete') !!}",
                        data: {_token:"{{csrf_token()}}", id:id},
                        complete: function () {
                            location.reload();
                        }
                    })
            });
        });
    </script>
@stop