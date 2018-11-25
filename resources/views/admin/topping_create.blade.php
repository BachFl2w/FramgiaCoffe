@extends('layouts.app2')

@section('page-title')
    <li><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li><a href="{{route('admin.topping.index')}}">{{ __('message.topping') }}</a></li>
    <li class="active">{{ __('message.create') }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">{{ __('message.topping') }}</div>
        <div class="card-body">
            <form action="{{ route('admin.topping.store') }}" novalidate method="post">
                @csrf
                <div class="form-group row">
                    <h5 class="col-md-1 col-form-label-sm">{{ __('message.topping') }}</h5>
                    <input type="text" name="name" class="form-control col-md-11">
                </div>
                <div class="form-group row">
                    <h5 class="col-md-1 col-form-label-sm">{{ __('message.price') }}</h5>
                    <input type="number" name="price" class="form-control col-md-11">
                </div>
                <div class="form-group row">
                    <h5 class="col-md-1 col-form-label-sm">{{ __('message.quantity') }}</h5>
                    <input type="number" name="quantity" class="form-control col-md-11">
                </div>
                <div class="text-xs-right">
                    <button type="submit" class="btn btn-info">{{ __('message.update') }}</button>
                    <a href="{{ route('admin.topping.index') }}" class="btn btn-danger">{{ __('message.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
