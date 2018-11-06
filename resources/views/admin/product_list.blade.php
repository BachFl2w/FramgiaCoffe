@extends('layouts.app2')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Quản Lý Sản Phẩm</div>

            <div class="card-body">
                <table class="table table-bordered" id="admin_role_list">
                    <tr>
                        <th>ID</th>
                        <th>Sản Phẩm</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Miêu tả</th>
                        <th>Thể Loại</th>
                        <th>Action</th>
                    </tr>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td><a href="" aria-hidden="true" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{ $product->id }}" id="product_id"><i class="fa fa-picture-o fa-3x" ></i>
                                </a></td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>
                                <button class="btn btn-outline-primary"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-outline-danger"><i class="fa fa-edit"></i></button>
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
                            {{--<img src="{{ asset('images/product/1.jpg') }}" style="width:100%">--}}
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
