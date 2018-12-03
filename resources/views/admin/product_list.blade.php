@extends('layouts.app2')

@section('page-title')
    <li><a href="{{route('admin.index')}}">{{ __('message.title.dashboard') }}</a></li>
    <li class="active">{{ __('message.product') }}</li>
@endsection

@section('content')
    <div class="animated fadeIn">
        <div class="rows">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">{{ __('message.product') }}</strong>
                        <div class="float-right">
                            <a href="{{ route('admin.product.create') }}" class="btn btn-outline-info"
                               title="show">{{ __('message.create') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive m-t-40">
                            <table class="table table-striped table-bordered" id="admin_product_list">
                                <thead>
                                <tr>
                                    <th>{{ __('message.id') }}</th>
                                    <th>{{ __('message.product') }}</th>
                                    <th>{{ __('message.category') }}</th>
                                    <th>{{ __('message.image') }}</th>
                                    <th>{{ __('message.brief') }}</th>
                                    <th>{{ __('message.order_detai_title.description') }}</th>
                                    <th>{{ __('message.price') }}</th>
                                    <th>{{ __('message.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td width="13%">{{ $product->name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td width="10%"><img src="{{ asset('images/products/' . $product->image) }}">
                                        </td>
                                        <td>{{ $product->brief }}</td>
                                        <td width="20%">{{ str_limit($product->description, $limit = 30, $end = '...') }}</td>
                                        <td>{{ number_format($product->price) . ' ₫' }}</td>
                                        <td>
                                            <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}"
                                               class="btn btn-outline-primary"><i class="fa fa-info"></i></a>
                                            <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}"
                                               class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.product.destroy', ['id' => $product->id]) }}"
                                               class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#admin_product_list').DataTable();
        });
    </script>
@endsection
