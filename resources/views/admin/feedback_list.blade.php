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
                <table class="table table-bordered" id="feedback">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Người dùng</th>
                            <th scope="col">Sản phẩm </th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')

<script type="text/javascript">

$(document).ready(function() {
    var table = $('#feedback').DataTable({
        ajax: {
            url: route('admin.feedback.json'),
            dataSrc: '',
            type: 'get',
        },
        columns: [
            { data: 'id' },
            { data: 'user.name' },
            { data: 'product.name' },
            { data: 'content' },
            {
                data: 'status',
                render: function(data, type, row) {
                    var checked = (data == 1) ? 'checked' : '';
                    return `<a href="#" class="active">
                        <label class="switch switch-3d switch-primary mr-3">
                            <input type="checkbox" class="switch-input" ${checked}>
                            <span class="switch-label"></span><span class="switch-handle"></span>
                        </label>
                    </a>`;
                },
            },
        ],
    });

    $('#feedback tbody').on('click', '.active', function(event) {
        event.preventDefault();
        var id = $(this).closest('tr').find('td:eq(0)').text();

        $.ajax({
            url: route('admin.feedback.active', id),
            type: 'GET',
        })
        .done(function(data) {
            table.ajax.reload();
            console.log("success");
        })
        .fail(function() {
            swal('Something wrong !', {icon: 'error'});
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    });
});

</script>

@endsection
