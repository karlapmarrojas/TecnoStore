@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <h5 class="card-title">{{ $cellphone->product_name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $cellphone->brand_name }}</h6>
                    <p class="card-text">{{ $cellphone->price }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection