@extends('layouts.app2')

@section('page-title')
    <li><a href="{{route('admin.user.index')}}">Dashboard</a></li>
    <li><a href="{{route('admin.product.index')}}">{{ __('message.product') }}</a></li>
    <li class="active">{{ __('message.update') }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">{{ __('message.category') }}</div>
        <div class="card-body">
            {{ Form::open(array('route' => ['admin.product.update', $product->id], 'method' => 'PUT', 'class'=>'m-t-40', 'novalidate', 'files' => true)) }}
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group row">
                        <h5 class="col-md-2 col-form-label-sm">{{ __('message.id') }}</h5>
                        {!! Form::text('id', $product->id, ['readonly', 'class' => 'form-control col-md-10','required']) !!}
                    </div>
                    <div class="form-group row">
                        <h5 class="col-md-2 col-form-label-sm">{{ __('message.name') }}</h5>
                        {!! Form::text('name', $product->name, ['class' => 'form-control col-md-10']) !!}
                    </div>
                    <div class="form-group row">
                        <h5 class="col-md-2 col-form-label-sm">{{ __('message.quantity') }}</h5>
                        {!! Form::number('quantity', $product->quantity, ['class' => 'form-control col-md-10']) !!}
                    </div>
                    <div class="form-group row">
                        <h5 class="col-md-2 col-form-label-sm">{{ __('message.price') }}</h5>
                        {!! Form::number('price', $product->price, ['class' => 'form-control col-md-10']) !!}
                    </div>
                    <div class="form-group row">
                        <h5 class="col-md-2 col-form-label-sm">{{ __('message.image') }}</h5>
                        {!! Form::file('image', ['id' => 'image', 'class' => 'form-control col-md-8']) !!}
                        <div class="col-md-2">
                            {!! Form::text('', $product->image, ['id' => 'image_current', 'hidden']) !!}
                            {!! Form::submit(__('message.cancel'), ['id' => 'cancel_image', 'class' => 'btn btn-outline-primary']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <h5 class="col-md-2 col-form-label-sm">{{ __('Category') }}</h5>
                        {!! Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control col-md-10']) !!}
                    </div>
                </div>
                <div class="col-6">
                    <h5 class="col-form-label-sm">{{ __('Picture review') }}</h5>
                    <div id="" class="img-fluid">
                        <img id="image_review_create" src="{{ asset('images/products/' . $product->image) }}"
                             style="max-height: 350px" class="card-img">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <h5 class="col-form-label-sm">{{ __('Description') }}</h5>
                {!! Form::textarea('description', $product->description, ['id' => 'description', 'class' => 'form-control row']) !!}
            </div>
            <div class="text-xs-right">
                {!! Form::submit(__('message.order_detai_title.description'), ['class' => 'btn btn-info']) !!}
                <a href="{{ route('admin.product.index') }}" class="btn btn-warning">{{ __('message.cancel') }}</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">

        // CKEDITOR.replace('description');

        jQuery(document).ready(function ($) {
            $('#image').val('');
            $('#image').change(function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image_review_create').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
            $('#cancel_image').click(function (event) {
                event.preventDefault();
                $('#image').val('');
                $('#image_review_create').attr('src', 'http://127.0.0.1:8000/images/products/' + $('#image_current').val());
            });
        });
    </script>
@endsection
