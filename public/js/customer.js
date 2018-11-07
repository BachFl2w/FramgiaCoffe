// $.noConflict();

$(document).ready(function() {

    // CKEDITOR.replace('ckeditor');

    /**
     * setup ajax
     */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });

    /**
     * admin category page
     */
    var category_table = $('#admin_category_list').DataTable({
        ajax: {
            url: route('admin.category.json'),
            dataSrc: '',
            type: 'get',
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            {
                data: null,
                defaultContent: [
                    '<button class="btn btn-success" title="Update" data-toggle="modal" data-target="#CategoryModal" id="btnUpdateCategory"><i class="fa fa-cog"></i></button> ' +
                    '<button class="btn btn-danger" title="Delete" id="btnDeleteCategory"><i class="fa fa-trash-o"></i></button> '
                ],
            },
        ],
    });

    $('#btnCreateCategory').click(function() {

        $('#category_id').val('');

        $('#category_name').val('');

        $('#category_group_id').hide();

    });

    $('#admin_category_list tbody').on('click', '#btnUpdateCategory', function() {

        $('#category_group_id').show();

        $('#category_id').prop('readonly', true);

        var row = $(this).closest('tr');

        var id = row.find('td:eq(0)').text();

        var name = row.find('td:eq(1)').text();

        $('#category_id').val(id);

        $('#category_name').val(name);

    });

    $('#btnSubmitCategory').click(function() {

        var id = $('#category_id').val();

        var name = $('#category_name').val();

        var url = route('admin.category.store');

        if (id != '') {
            url = route('admin.category.update', { id: id });

        }

        $.ajax({
            type: 'post',
            url: url,
            data: {
                'name': name,
            },
            success: function(res) {
                category_table.ajax.reload();
                $('#CategoryModal').modal().hide();
            },
            error: function(res) {
                console.log(res);
            },
        });
    });

    $('#admin_category_list tbody').on('click', '#btnDeleteCategory', function() {

        if (confirm('Co xoa the loai nay ko ?')) {

            var row = $(this).closest('tr');

            var id = row.find('td:eq(0)').text();

            $.ajax({
                type: 'get',
                url: route('admin.category.destroy', { id: id }),
                success: function(res) {
                    category_table.ajax.reload();
                },
                error: function(res) {
                    console.log(res);
                },
            });
        }

    });

    // "use strict";

    // [].slice.call(document.querySelectorAll('select.cs-select')).forEach(function(el) {
    //     new SelectFx(el);
    // });

    // jQuery('.selectpicker').selectpicker;


    // $('#menuToggle').on('click', function(event) {
    //     $('body').toggleClass('open');
    // });

    // $('.search-trigger').on('click', function(event) {
    //     event.preventDefault();
    //     event.stopPropagation();
    //     $('.search-trigger').parent('.header-left').addClass('open');
    // });

    // $('.search-close').on('click', function(event) {
    //     event.preventDefault();
    //     event.stopPropagation();
    //     $('.search-trigger').parent('.header-left').removeClass('open');
    // });

    /**
     * admin role page
     */
    var role_table = $('#admin_role_list').DataTable({
        ajax: {
            url: route('admin.role.json'),
            dataSrc: '',
            type: 'get',
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            {
                data: null,
                defaultContent: [
                    '<button class="btn btn-outline-primary" title="Update" data-toggle="modal" data-target="#RoleModal" id="btnUpdateRole"><i class="fa fa-cog"></i></button> ' +
                    '<button class="btn btn-outline-danger" title="Delete" id="btnDeleteRole"><i class="fa fa-trash-o"></i></button> '
                ],
            },
        ],
    });


    $('#btnCreateRole').click(function() {

        $('#role_id').val('');

        $('#role_name').val('');

        $('#role_group_id').hide();

    });

    $('#admin_role_list tbody').on('click', '#btnUpdateRole', function() {

        $('#role_group_id').show();

        $('#role_id').prop('readonly', true);

        var row = $(this).closest('tr');

        var id = row.find('td:eq(0)').text();

        var name = row.find('td:eq(1)').text();

        $('#role_id').val(id);

        $('#role_name').val(name);

    });

    $('#btnSubmitRole').click(function() {

        var id = $('#role_id').val();

        var name = $('#role_name').val();

        var url = route('admin.role.store');

        if (id != '') {
            url = route('admin.role.update', { id: id });

        }

        $.ajax({
            type: 'post',
            url: url,
            data: {
                'name': name,
            },
            success: function(res) {
                role_table.ajax.reload();
                $('#RoleModal').modal().hide();
            },
            error: function(res) {
                console.log(res);
            },
        });
    });

    $('#admin_role_list tbody').on('click', '#btnDeleteRole', function() {

        if (confirm('Co xoa the loai nay ko ?')) {

            var row = $(this).closest('tr');

            var id = row.find('td:eq(0)').text();

            $.ajax({
                type: 'get',
                url: route('admin.category.destroy', { id: id }),
                success: function(res) {
                    role_table.ajax.reload();
                },
                error: function(res) {
                    console.log(res);
                },
            });
        }
    });

    /**
     * admin topping page
     */

    var topping_table = $('#admin_topping_list').DataTable({
        ajax: {
            url: route('admin.topping.json'),
            dataSrc: '',
            type: 'get',
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'price' },
            { data: 'quantity' },
            {
                data: null,
                defaultContent: [
                    '<button class="btn btn-outline-primary" title="Update" data-toggle="modal" data-target="#ToppingModal" id="btnUpdateTopping"><i class="fa fa-edit"></i></button> ' +
                    '<button class="btn btn-outline-danger" title="Delete" id="btnDeleteTopping"><i class="fa fa-trash-o"></i></button> '
                ],
            },
        ],
    });

    $('#btnCreateTopping').click(function() {

        $('#topping_id').val('');

        $('#topping_name').val('');

        $('#topping_price').val('');

        $('#topping_quantity').val('');

        $('#topping_group_id').hide();

    });

    $('#admin_topping_list tbody').on('click', '#btnUpdateTopping', function() {

        $('#topping_group_id').show();

        $('#topping_id').prop('readonly', true);

        var row = $(this).closest('tr');

        var id = row.find('td:eq(0)').text();

        var name = row.find('td:eq(1)').text();

        var price = row.find('td:eq(2)').text();

        var quantity = row.find('td:eq(3)').text();

        $('#topping_id').val(id);

        $('#topping_name').val(name);

        $('#topping_price').val(price);

        $('#topping_quantity').val(quantity);

    });

    $('#btnSubmitTopping').click(function() {

        var id = $('#topping_id').val();

        var name = $('#topping_name').val();

        var price = $('#topping_price').val();

        var quantity = $('#topping_quantity').val();


        var url = route('admin.topping.store');

        if (id != '') {
            url = route('admin.topping.update', { id: id });
        }

        $.ajax({
            type: 'post',
            url: url,
            data: {
                'name': name,
                'price': price,
                'quantity': quantity
            },
            success: function(res) {
                topping_table.ajax.reload();
                $('#ToppingModal').modal().hide();
            },
            error: function(res) {
                console.log(res);
            },
        });
    });

    $('#admin_topping_list tbody').on('click', '#btnDeleteTopping', function() {

        if (confirm('Co xoa the loai nay ko ?')) {

            var row = $(this).closest('tr');

            var id = row.find('td:eq(0)').text();

            $.ajax({
                type: 'get',
                url: route('admin.topping.destroy', { id: id }),
                success: function(res) {
                    topping_table.ajax.reload();
                },
                error: function(res) {
                    console.log(res);
                },
            });
        }
    });

    /**
     * admin product page
     **/

    var product_table = $('#admin_product_list').DataTable({
        ajax: {
            url: route('admin.product.json'),
            dataSrc: '',
            type: 'get',
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            {
                data: null,
                defaultContent: [
                    '<a href="" id="showImageProduct" data-toggle="modal" data-target="#UpdateImageModal">' +
                    '<i class="fa fa-picture-o fa-3x" ></i>' +
                    '</a>'
                ],
            },
            { data: 'price' },
            { data: 'description' },
            { data: 'category.name' },
            {
                data: null,
                defaultContent: [
                    '<button class="btn btn-outline-primary" title="Update" data-toggle="modal" data-target="#ProductModal" id="btnUpdateProduct"><i class="fa fa-edit"></i></button> ' +
                    '<button class="btn btn-outline-danger" title="Delete" id="btnDeleteProduct"><i class="fa fa-trash-o"></i></button> '
                ],
            },
        ],
    });

    $('#btnCreateProduct').click(function() {

        $('#image_review_create').hide();

        $('#group_product_id').hide();

        $('#product_name').val('');

        $('#product_price').val('');

        $('#product_quantity').val('');

        $('#product_image').val('');

        $.ajax({
            type: 'get',
            url: route('admin.category.json'),
            dataType: 'json',
            success: function(data) {

                var arr = Object.entries(data);

                var option = '';

                arr.forEach(function(element, index) {

                    option += '<option value="' + element[1].id + '">' + element[1].name + '</option>';

                });

                $('#product_category').append(option);
            },
        });
    });

    $('#product_image').change(function() {

        $('#image_review_create').show();

        if (this.files && this.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {

                $('#image_review_create').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    });

    $('#btnSubmitProduct').click(function(e) {

        e.preventDefault();

        var product = {
            'name': $('#product_name').val(),
            'price': $('#product_price').val(),
            'quantity': $('#product_quantity').val(),
            'category_id': $('#product_category').val(),
            'description': CKEDITOR.instances['ckeditor'].getData(),
        };

        $.ajax({
            method: 'post',
            data: product,
            url: route('admin.product.store'),
            success: function(res) {
                product_table.ajax.reload();
                $('#ProductModal').modal().hide();
            },
            error: function(xhr, status, error) {
                var err = eval('(" + xhr.responseText + ")');
                alert(err.Message);
            },
        });

    });
    
    $('#admin_product_list tbody').on('click', '#showImageProduct', function() {

        $('#images-container .images').empty();

        var row = $(this).closest('tr');

        var id = row.find('td:eq(0)').text();

        $('#image_product_id').val(id);

        $.ajax({

            type: 'get',

            url: route('admin.product.images', { id: id }),

            success: function(data) {

                var arr = Object.entries(data);

                var div_images = '';

                if (arr.length == 0) {

                    $('#images-container .image-button').empty();

                    $('#main-image-button').hide();

                    div_images = '<h3 class="text-center">No Image</h3>';

                    $('#images-container .images').append(div_images);

                } else {
                    arr.forEach(function(element, index) {

                        var url_image = "http://127.0.0.1:8000/images/product/" + element[1].name;

                        div_images += '<div class="mySlides">' +
                            '<div class="numbertext">' + (index + 1) + ' / ' + arr.length + '</div>' +
                            '<img id="image_url_current" src="' + url_image + '" style="width:100%">' +
                            '<div class="text-cap">' + 'Caption Text' + '</div>' +
                            '</div>';
                    });

                    $('.images').append(div_images);

                    plusSlides(0)
                }

            },
            error: function(res) {
                console.log(res);
            },
        });
    });

    $('#addImageProduct').click(function() {
        $("#file_image_product").click();
    });

    $('#file_image_product').change(function() {

        var form = new FormData();

        form.append('product_id',product_id);

        form.append( 'images', images);

        var images = ('#file_image_product')[0].files;

        var product_id = $('#image_product_id').val();

        $.ajax({
            cache: false,
            contentType: false,
            processData: false,
            url: route('admin.product.uploadimage'),
            type: 'post',
            data: form,
            success: function (res) {
                console.log(res);
            },
            error: function (res) {
                console.log(res)
            }
        })
    });

    $('#main_image_button').click(function(event) {

        var t = $("#images").children("mySlides");

        console.log(t)
    })
});

var slideIndex = 1;

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
}
