@extends('layouts.app2')

@section('page-title')
    <li><a href="{{route('admin.user.index')}}">{{ __('message.title.dashboard') }}</a></li>
    <li class="active">{{ __('message.order') }}</li>
@endsection

@section('content')
<div class="animated">
    <div class="rows">
        <div class="card">
            <div class="card-header">
                {{ __('Manager Order') }}

            </div>

            <div class="card-body">
                <table class="table table-bordered" id="admin_order_list">
                    <thead>
                        <tr>
                            <th>{{ __('message.id') }}</th>
                            <th>{{ __('message.order_title.receiver') }}</th>
                            <th>{{ __('message.order_title.time_order') }}</th>
                            <th>{{ __('message.order_title.address_order') }}</th>
                            <th>{{ __('message.order_title.phone_order') }}</th>
                            <th>{{ __('message.order_title.status') }}</th>
                            <th>{{ __('message.order_title.note') }}</th>
                            <th>{{ __('message.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->receiver }}</td>
                            <td>{{ $order->order_time }}</td>
                            <td>{{ $order->order_place }}</td>
                            <td>{{ $order->order_phone }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->note }}</td>
                            <td>
                                <a href="{{ route('admin.order.edit', ['id' => $order->id]) }}" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('admin.order.destroy', ['id' => $order->id]) }}" onclick="return confirm('Delete this one? ')" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            
            var order_table = $('#admin_order_list').DataTable(); 
        });
    </script>
@endsection
