@extends('layouts.app2')
@section('css')
<link rel="stylesheet" href="{{ asset('css/customer.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                {{ __('Quản Lý Sản Phẩm')}}

                <button class="float-right btn btn-outline-primary" data-toggle="modal"
                 data-target="#ProductModal" id="btnCreateProduct">Create</button>
            </div>

            <div class="card-body">
                <table class="table table-bordered" id="admin_product_list">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sản Phẩm</th>
                        <th>Só lượng</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Miêu tả</th>
                        <th>Thể Loại</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="UpdateImageModal" role="dialog" aria-labelledby="UpdateImageModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ảnh sản phẩm</h5>
                    <input id="image_product_id" hidden="hidden">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="images-container" id="images-container">
                        <div class="images">
                            {{-- <div class="mySlides">
                                <div class="numbertext">1 / 3</div> 
                                <img src="{{ asset('images/product/1.jpg') }}" style="width:100%">
                                <div class="text">Caption Text</div>
                            </div> --}}
                        </div>
                        <div class="image-button" id="image-button">
                            <a class="image-prev" id="image-prev" >&#10094;</a>
                            <a class="image-next" id="image-next" >&#10095;</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="addImageProduct" class="btn btn-primary">Thêm ảnh</button>
                    <input type="file" id="file_image_product" name="images[]" multiple hidden="hidden">
                    <button type="button" id="main_image_button" class="btn btn-primary">Chọn làm ảnh đại diện</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="ProductModal" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="CreateProductModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg model-big" >
            <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="titleModalProduct">Thông Tin Sản Phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-5">
                                <p class="text" id="choose_image_product_modal"></p>
                                <img id="image_review_create" class="img-thumbnail">
                                <input type="file" id="product_image" name="image">
                            </div>
                            <div class="col-7">
                                @csrf
                                <div class="form-group" id="group_product_id">
                                    <label for="id" class="pr-1 form-control-label">ID</label>
                                    <input type="text" name="id" required class="form-control" placeholder="ID sản phẩm" id="product_id">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="pr-1 form-control-label">Sản Phẩm</label>
                                    <input type="text" name="name" required class="form-control" placeholder="Tên sản phẩm" id="product_name">
                                </div>
                                <div class="form-group">
                                    <label for="" class="px-1 form-control-label">Giá</label>
                                    <input type="number" name="price" required class="form-control" placeholder="Giá sản phẩm" id="product_price">
                                </div>
                                <div class="form-group">
                                     <label for="" class="px-1 form-control-label">Số lượng</label>
                                    <input type="number" name="quantity" required class="form-control" placeholder="Số lượng sản phẩm" id="product_quantity">
                                </div>
                                <div class="form-group">
                                    <label for="" class="px-1 form-control-label">Thể loại</label>
                                    <select class="form-control" required id="product_category" name="category_id">
                                        <option value="" class="" hidden>--Chọn thể loại--</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="" class="px-1  form-control-label">Miêu tả</label>
                                    <textarea id="ckeditor_product_descrition" name="ckeditor" class="form-control ckeditor"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-primary" id="btnSubmitProduct" value="Thêm sản phẩm">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    </div>
                    {{--</form>--}}
            </div>
        </div>
    </div>

@endsection
