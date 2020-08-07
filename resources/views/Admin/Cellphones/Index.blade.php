@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Products</h1>
                <a href="/admin/cellphones/create" class="text-right">Create New Product</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Cellphone as $cellphone)
                            <tr>
                                <th scope="row">{{ $loop->index + 1}}</th>
                                <td>{{ $cellphone->product_name }}</td>
                                <td>{{ $cellphone["brand_name"] }}</td>
                                <td>{{ $cellphone->price}}</td>
                                <td>
                                    <a href="/admin/cellphones/{{ $cellphone->_id }}">Details</a> |
                                    <a href="/admin/cellphones/edit/{{ $cellphone->_id }}">Edit</a> |
                                    <a href="/admin/cellphone/delete/{{ $cellphone->_id }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection