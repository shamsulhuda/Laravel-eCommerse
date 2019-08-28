@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white">
            <!-- ============================================ -->
            <h2 class="text-center">Create new product</h2>
            <form action="{{ route('products.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleFormControlInput1">Products Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ old('name')}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Product price</label>
                    <input type="text" name="price" class="form-control" id="exampleFormControlInput1" value="{{ old('price') }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Product Image</label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Product Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ old('description') }}</textarea>
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
