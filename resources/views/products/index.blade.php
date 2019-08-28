@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- ================================== -->
            <h2 class="text-center">Products Table</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Product name</th>
                    <th scope="col">Product price</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name}}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-primary btn-sm">Update</a>
                        </td>
                        <td>
                            <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                        
                    </tbody>
                </table>
            <!-- ================================== -->
        </div>
    </div>
</div>
@endsection
