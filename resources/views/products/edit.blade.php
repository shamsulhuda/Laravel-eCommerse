@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white">
            <!-- ============================================ -->
            <h2 class="text-center">Update Product</h2>
            <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="name">Products Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label for="price">Product price</label>
                    <input type="text" name="price" class="form-control" id="price" value="{{ $product->price }}">
                </div>
                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" name="image" class="form-control-file" id="image">
                    
                </div>
                <div class="form-group">
                    <label for="description">Product Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3">{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                <button class="form-control btn btn-success">Save product</button>
                </div>
                </form>
            <!-- ============================================ -->
        </div>
    </div>
</div>
@endsection
