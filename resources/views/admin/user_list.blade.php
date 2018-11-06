@extends('layouts.app2')

@section('page-title')
    List User
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">Quản Lý User</div>

        <div class="card-body">
            <table class="table table-bordered" id="admin_role_list">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Addess</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                @foreach($user as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->address }}</td>
                        <td>{{ $u->phone }}</td>
                        <td>{{ $u->role->name }}</td>
                        <td>
                            <a href="{{route('admin.user.edit', $u->id)}}" class="btn btn-outline-primary" title="View"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-outline-danger" title="Delete"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ảnh sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="images-container">

                    {{--<div class="mySlides">--}}
                        {{--<div class="numbertext">1 / 3</div>--}}
                        {{--<img src="{{ asset('images/u/1.jpg') }}" style="width:100%">--}}
                        {{--<div class="text">Caption Text</div>--}}
                    {{--</div>--}}

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Thêm ảnh</button>
                <button type="button" class="btn btn-primary">Chọn làm ảnh chính</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
