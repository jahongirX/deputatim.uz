$(document).ready(function(e){
    function changeProductCount(){
        $.ajax({
            method: "GET",
            url: "/product/count",
            success: function(data){
                $('.cart .product_count').html(data);
            },
            error: function(data){
                alert('При добавление возникло ошибка, пожалуйста обратитесь к администрацию сайта!');
            }
        })

    }

    $('.add_to_cart').on('click',function(e){
        e.preventDefault();
        var productId = $(this).data('productid');
        // console.log(productId);
        $.ajax({
          method: "GET",
          url: "/product/add-to-cart",
          data: {id: productId},
          success: function(data){
              showCart();
          },
          error: function(data){
            alert('При добавление возникло ошибка, пожалуйста обратитесь к администрацию сайта!');
          }
        })
    });

    function showCart(){
        let loader = "<div class='loader'><img src='/images/loader.gif' alt=''></div>"
        $('.cart_modal .modal-body').html(loader)
        $.ajax({
            method: "GET",
            url: "/product/show-cart",
            success: function(data){
                var myModal = new bootstrap.Modal(document.querySelector('.cart_modal'))
                $('.cart_modal .modal-body').html(data);
                myModal.show();
                changeProductCount();
            },
            error: function(data){
                alert('При добавление возникло ошибка, пожалуйста обратитесь к администрацию сайта!');
            }
        })
    }



    $('.show_cart').on('click',function (e){
        e.preventDefault();
        showCart();
    })

    // Cart view add & delete product
    $('.cart_body .delete').on('click',function (e){
        var productId = $(this).data('product');
        // console.log(productId);
        $.ajax({
            method: "GET",
            url: "/product/delete-from-cart",
            data: {id: productId},
            success: function(data){
                location.reload();
            },
            error: function(data){
                alert('При добавление возникло ошибка, пожалуйста обратитесь к администрацию сайта!');
            }
        })
        e.preventDefault();
    })

    $('.cart_body .add').on('click',function (e){
        var productId = $(this).data('product');
        // console.log(productId);
        $.ajax({
            method: "GET",
            url: "/product/add-to-cart",
            data: {id: productId},
            success: function(data){
                location.reload();
            },
            error: function(data){
                alert('При добавление возникло ошибка, пожалуйста обратитесь к администрацию сайта!');
            }
        })
        e.preventDefault();
    })

    // AJAX LOADED FUNCTIONS
    $( document ).ajaxStop(function(){
        $('.minus_product_cart').on('click',function (e){
            e.preventDefault();
            let productId = $(this).data('id');
            let loader = "<div class='loader text-center'><img src='/images/loader.gif' alt=''></div>"
            $('.cart_modal .modal-body').html(loader)

            $.ajax({
                method: "GET",
                url: "/product/delete-item",
                data: {id: productId},
                success: function(data){
                    var myModal = new bootstrap.Modal(document.querySelector('.cart_modal'))
                    $('.cart_modal .modal-body').html(data);
                    changeProductCount();
                },
                error: function(data){
                    alert('При отправке запроса произошло ошибка, пожалуйста обратитесь к администрацию сайта!');
                }
            })

        })

        $('.plus_product_cart').on('click',function (e){
            e.preventDefault();
            let productId = $(this).data('id');
            let loader = "<div class='loader text-center'><img src='/images/loader.gif' alt=''></div>"
            $('.cart_modal .modal-body').html(loader)

            $.ajax({
                method: "GET",
                url: "/product/add-item",
                data: {id: productId},
                success: function(data){
                    var myModal = new bootstrap.Modal(document.querySelector('.cart_modal'))
                    $('.cart_modal .modal-body').html(data);
                    changeProductCount();
                },
                error: function(data){
                    alert('При отправке запроса произошло ошибка, пожалуйста обратитесь к администрацию сайта!');
                }
            })

        })
    })




    // Catalog opener function
    $('.catalog_btn').on('click',function(e){
        e.preventDefault();
        $(this).toggleClass('show');
        var icon = $(this).find('svg');
        if($(this).hasClass('show')){
            icon.removeClass('fa-bars').addClass('fa-times');
        }else{
            icon.removeClass('fa-times').addClass('fa-bars');
        }
    })
    
    $('.slider_block').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })

    $('.product_slider').owlCarousel({
        loop:true,
        margin:10,
        thumbs: true,
        thumbsPrerendered: true,
        nav:false,
        dots: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })
    
    

    $('.filter_sidebar .price .bs_slider').on('change',function(e){
        let min = $(this).parent().find('.min-slider-handle').attr('aria-valuenow');
        let max = $(this).parent().find('.max-slider-handle').attr('aria-valuenow');
        $(this).parent().parent().find('input[name=price_from]').val(min);
        $(this).parent().parent().find('input[name=price_to]').val(max);
    })

    // var addressForm = new bootstrap.Modal(document.getElementById('address_form'));
    // $('.address_action a').on('click',function(e){
    //     e.preventDefault();
    //     addressForm.show()
    // })

    $('.bs_slider').slider({});
    
})