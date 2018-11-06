// $.noConflict();

jQuery(document).ready(function($) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });

    "use strict";

    [].slice.call(document.querySelectorAll('select.cs-select')).forEach(function(el) {
        new SelectFx(el);
    });

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

    /**
     * Role javascript
     */
    // $('#admin_role_list').DataTable({
    //     bLengthChange: false,
    //     bInfo: false,
    //     ajax: {
    //         url: route('admin.role.json'),
    //         dataSrc: '',
    //         type: 'get',
    //     },
    //     columns: [
    //         { data: 'id' },
    //         { data: 'name' },
    //         {
    //             data: null,
    //             defaultContent: [
    //                 '<a class="btn btn-success" aria-label="Settings" data-toggle="modal" data-target="#model_update_role" id="btnShowUpdate"><i class="fa fa-cog" aria-hidden="true"></i></a> ' +
    //                 '<a class="btn btn-warning" aria-label="Delete" id="btnDelete"><i class="fa fa-trash-o" aria-hidden="true"></i></a> ' +
    //                 '<a class="btn btn-primary" data-toggle="modal" data-target="#model_update_role" id="btnRole"><i class="fa fa-bars" aria-hidden="true"></i></a>'
    //             ],
    //         },
    //     ],
    // });

    $('#product_id').click(function(){

        var product_id = $(this).attr('data-id');

        var div_images = '<div class="mySlides">' +
            '<div class="numbertext">' + '1 / 3' + '</div>' +
            '<img src="" style="width:100%">' +
            '<div class="text">' + 'Caption Text' + '</div>' +
            '</div>';
        $.ajax({
            type: 'get',
            url: route('admin.product.images', {id: product_id}),
            success: function (data) {

                var url_image = '{{ asset("images/product/' + data.name + '") }}';

                var div_images = '<div class="mySlides">' +
                    '<div class="numbertext">' + '1 / 3' + '</div>' +
                    '<img src="' + url_image + '" style="width:100%">' +
                    '<div class="text">' + 'Caption Text' + '</div>' +
                    '</div>';

                $('.images-container').add(div_images);
            },
            error: function (res) {
                console.log(res);
            },
        })
    });
});
// var slideIndex = 1;
// showSlides(slideIndex);
//
// function plusSlides(n) {
//     showSlides(slideIndex += n);
// }
//
// function currentSlide(n) {
//     showSlides(slideIndex = n);
// }
//
// function showSlides(n) {
//     var i;
//     var slides = document.getElementsByClassName("mySlides");
//     if (n > slides.length) { slideIndex = 1 }
//     if (n < 1) { slideIndex = slides.length }
//     for (i = 0; i < slides.length; i++) {
//         slides[i].style.display = "none";
//     }
//     slides[slideIndex - 1].style.display = "block";
// }
