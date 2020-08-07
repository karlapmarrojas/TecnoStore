@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete Product</h1>
                <a href="/admin/products" class="text-right">Index</a>
                <form action="/admin/products/delete" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="productid" id="productid" value="{{$product->_id}}">
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input class="form-control" type="text" name="product_name" id="product_name" value="{{$cellphone->product_name}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="brand_name">Brand Name</label>
                        <textarea name="brand_name" id="brand_name" cols="30" rows="10" class="form-control" disabled>{{$cellphone->brand_name}}</textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" value="{{$cellphone->price}}" disabled>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="submit" class="btn btn-default">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
