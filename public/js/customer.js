$.noConflict();

jQuery(document).ready(function($){

    // var url_table_route = $('#url_route').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });

    $('#table_user').DataTable({
        bLengthChange: false,
        bInfo: false,
        ajax: {
            url: route('user.getdata'),
            dataSrc: '',
            type: 'get',
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            { 
                data: 'image',
                render: function(data) {
                    return '<img src="images/'+ data +'"/>';
                },
            },
            { data: 'email' },
            { data: 'phone' },
            { data: 'address' },
            { data: 'role.name' },
            {
                data: null,
                defaultContent: [
                    '<a class="btn btn-success" aria-label="Settings" data-toggle="modal" data-target="#model_update_role" id="btnShowUpdate"><i class="fa fa-cog" aria-hidden="true"></i></a> ' +
                    '<a class="btn btn-warning" aria-label="Delete" id="btnDelete"><i class="fa fa-trash-o" aria-hidden="true"></i></a> ' +
                    '<a class="btn btn-primary" data-toggle="modal" data-target="#model_update_role" id="btnRole"><i class="fa fa-bars" aria-hidden="true"></i></a>'
                ],
            },
        ],
    });

    $('#table_user tbody').on('click', '#btnShowUpdate', function() {
        $('#text-info').text('Chỉnh sửa thông tin');
        var row = $(this).closest('tr');
        var id = row.find('td:eq(0)').text();
        var name = row.find('td:eq(1)').text();
        $.ajax({
            url: route('user.getbyid'),
            data: { id: id },
            type: 'get',
            success: function(res) {
                var image = 'images/' + res.image;
                $('#user_image').attr('src',image);
                console.log('image:'+ image);
            }, 
            error: function(res) {
                console.log( res);
            }
        });
        var email = row.find('td:eq(3)').text();
        var phone = row.find('td:eq(4)').text();
        var address = row.find('td:eq(5)').text();
        $('#user_id').val(id);
        $('#user_name').val(name);
        $('#user_image').val(email);
        $('#user_email').val(email);
        $('#user_phone').val(phone);
        $('#user_address').val(address);
    });

    $('#btnCancel').click(function() {
        $('#model_update_role').modal('hide');
    });

    $('#table_user tbody').on('click', '#btnRole', function() {
        $('#text-info').text('Đổi Quyền');
        $('#role_select option:first').hide();
        var row = $(this).closest('tr');
        var id = row.find('td:eq(0)').text();
        $('#user_id').val(id);
        $.ajax({
            url: route('user.getbyid'),
            data: { id: id },
            type: 'get',
            success: function(res) {
                var role_id = res.role_id;
                $('#role_select').val(role_id);
                console.log('Role_id:'+ res);
            }, 
            error: function(res) {
                console.log( res);
            }
        });
    });

    $('#btnSubmitChangRole').click(function() {
        var user_id = $('#user_id').val();
        var role_id = $('#role_select').val();

        console.log('id: ' + user_id + ' role: ' + role_id);
    });

    $('#table_user tbody').on('click', '#btnDelete', function() {
        if (confirm('Xác Nhận Xóa?')) {
            var row = $(this).closest('tr');
            var id = row.find('td:eq(0)').text();
            $.ajax({
                url: "{{ route('role.delete.get') }}",
                type: 'GET',
                data: {id: id},
                success: function(res) {
                    table.ajax.reload();
                }, error(res, status, err){
                    console.log(err)
                }
            });
        };
    });

    "use strict";

    [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
        new SelectFx(el);
    } );

    jQuery('.selectpicker').selectpicker;


    $('#menuToggle').on('click', function(event) {
        $('body').toggleClass('open');
    });

    $('.search-trigger').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        $('.search-trigger').parent('.header-left').addClass('open');
    });

    $('.search-close').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        $('.search-trigger').parent('.header-left').removeClass('open');
    });    
})

