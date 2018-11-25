@extends('layouts.app2')

@section('page-title')
    <li><a href="{{route('admin.index')}}">{{ __('message.title.dashboard') }}</a></li>
    <li class="active">{{ __('message.feedback') }}</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Quản Lý Phản Hồi
            </div>

            <div class="card-body">
                <table class="table table-bordered" id="bootstrap-data-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Người dùng</th>
                            <th scope="col">Sản phẩm </th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Trang thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedbacks as $feedback)
                            <tr>
                                <td scope="row">{{ $feedback->id }}</td>
                                <td>{{ $feedback->user->name }}</td>
                                <td>{{ $feedback->product->name }}</td>
                                <td>{{ $feedback->content }}</td>
                                <td>{{ $feedback->status }}</td>
                                <td>
                                    {!! Form::open(['route' => ['admin.user.active', $feedback->id] , 'method' => 'post']) !!}
                                        <label class="switch switch-3d switch-primary mr-3" for="active_user{{ $feedback->id }}">
                                            <input type="checkbox" class="switch-input"
                                                @if ($feedback->status == 1)
                                                    {{ 'checked' }}
                                                @endif
                                            >
                                        <span class="switch-label"></span> <span class="switch-handle"></span>
                                        </label>
                                        {!! Form::submit('', ['id' => 'active_user' . $feedback->id, 'class' => 'd-none']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table').DataTable();
        } );
    </script>
@endsection
