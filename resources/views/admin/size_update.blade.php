@extends('layouts.app2')

@section('page-title')
    <li><a href="{{route('admin.index')}}">{{ __('message.title.dashboard') }}</a></li>
    <li><a href="{{route('admin.size.index')}}">{{ __('message.size') }}</a></li>
    <li class="active">{{ __('message.create') }}</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            {!! Form::open(['route' => 'admin.size.store', 'method' => 'post']) !!}
            <div class="card-header">{{ __('message.size_action.update') }}</div>

            <div class="card-body">
                @csrf
                <div class="form-group">
                    {!! Form::label('id', __('message.id'), ['class' => 'form-control-label']) !!}
                    {!! Form::text('id', $size->id, ['class' => 'form-control', 'id' => 'id', 'readonly']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', __('message.name'), ['class' => 'form-control-label']) !!}
                    {!! Form::text('name', $size->name, ['class' => 'form-control', 'id' => 'name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('percent', __('message.percent'), ['class' => 'form-control-label']) !!}
                    {!! Form::text('percent', $size->percent, ['class' => 'form-control', 'id' => 'percent']) !!}
                </div>
            </div>
            <div class="card-footer">
                {!! Form::submit(__('message.update'), ['class' => 'btn btn-info']) !!}
                <a href="{{ route('admin.size.index') }}" class="btn btn-danger">{{ __('message.cancel') }}</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
