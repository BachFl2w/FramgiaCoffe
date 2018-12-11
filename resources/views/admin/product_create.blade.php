@extends('layouts.app2')

@section('page-title')
    <li><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li><a href="{{route('admin.product.index')}}">{{ __('message.product') }}</a></li>
    <li class="active">{{ __('message.create') }}</li>
@endsection

@section('content')
    <div class="card">
    	<div class="card-header">{{ __('message.product') }}</div>
        <div class="card-body">
            {{ Form::open(array('route' => 'admin.product.store', 'method' => 'post', 'class'=>'m-t-40', 'novalidate', 'files' => true)) }}
               @csrf
            <div class="row">
	            <div class="col-6">
		            <div class="form-group row">
		                <h5 class="col-md-2 col-form-label-sm">{{ __('message.product') }}</h5>
		                {!! Form::text('name', null, ['class' => 'form-control col-md-10', 'required' => 'required', 'placeholder' => 'Name Product']) !!}
		            </div>
		            <div class="form-group row">
		                <h5 class="col-md-2 col-form-label-sm">{{ __('message.quantity') }}</h5>
		                {!! Form::number('quantity', null, ['class' => 'form-control col-md-10', 'required' => 'required', 'placeholder' => 'Number Product']) !!}
		            </div>
		            <div class="form-group row">
		                <h5 class="col-md-2 col-form-label-sm">{{ __('message.price') }}</h5>
		                {!! Form::number('price', null, ['class' => 'form-control col-md-10', 'required' => 'required']) !!}
		            </div>
		            <div class="form-group row">
		                <h5 class="col-md-2 col-form-label-sm">{{ __('message.image') }}</h5>
		                {!! Form::file('image', ['id' => 'image', 'class' => 'col-md-10',  'required' => 'required']) !!}
		            </div>
		            <div class="form-group row">
		                <h5 class="col-md-2 col-form-label-sm">{{ __('message.category') }}</h5>
		                {!! Form::select('category_id', $categories, null, ['class' => 'form-control col-md-10', 'placeholder' => __('Choose Category'),  'required' => 'required']) !!}
		            </div>
	        	</div>
	        	<div class="col-6">
		            <h5 class="col-form-label-sm">{{ __('message.review') }}</h5>
		            <div id="" class="img-fluid">
		              	<img id="image_review_create" style="max-height: 350px" class="card-img">
		            </div>
		        </div>
        	</div>
            <div class="form-group">
                <h5 class="col-form-label-sm">{{ __('message.order_detai_title.description') }}</h5>
                {!! Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control row', 'required' => 'required']) !!}
            </div>
            <div class="text-xs-right">
                {!! Form::submit(__('message.update'), ['class' => 'btn btn-info']) !!}
                 <a href="{{ route('admin.product.index') }}" class="btn btn-danger">{{ __('message.cancel') }}</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    jQuery(document).ready(function($) {
    	$('#image').val('');
    	$('#image').change(function() {
	        if (this.files && this.files[0]) {
	            var reader = new FileReader();
	            reader.onload = function(e) {
	                $('#image_review_create').attr('src', e.target.result);
	            }
	            reader.readAsDataURL(this.files[0]);
	        }
    	});
    });
</script>
@endsection
