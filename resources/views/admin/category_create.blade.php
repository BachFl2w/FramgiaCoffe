@extends('layouts.app2')

@section('page-title')
    <li><a href="{{route('admin.user.index')}}">Dashboard</a></li>
    <li><a href="{{route('admin.user.index')}}">{{ __('message.category') }}</a></li>
    <li class="active">{{ __('message.create') }}</li>
@endsection

@section('content')
    <div class="card">
            {!! Form::open(['route' => 'admin.category.store', 'method' => 'post']) !!}
            <div class="card-header">{{ __('message.category_action.create') }}</div>
            
            <div class="card-body">
                @csrf
                <div class="form-group">
                    {!! Form::label('name', __('message.name'), ['class' => 'form-control-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
                </div>
            </div>
            <div class="card-footer">
                {!! Form::submit(__('message.create'), ['class' => 'btn btn-info']) !!}
                {!! Form::reset(__('Reset'), ['class' => 'btn btn-warning']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection
