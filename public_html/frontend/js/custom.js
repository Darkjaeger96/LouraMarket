$(document).ready(function () {

    loadCart();
    loadWish();

    function loadCart() {
        $.ajax({
            type: "GET",
            url: "/load-cart-data",
            success: function (response) {
                $('.cartCount').html('');
                $('.cartCount').html(response.count);
            }
        });
    }

    function loadWish() {
        $.ajax({
            type: "GET",
            url: "/load-wishlist-data",
            success: function (response) {
                $('.wishlistCount').html('');
                $('.wishlistCount').html(response.count);
            }
        });
    }

    $('.btnAddToCart').click(function (e) {
        e.preventDefault();

        let product_id = $(this).closest('.product_data').find('.product_id').val();
        let product_quantity = $(this).closest('.product_data').find('.quantityInput').val();

        //https://laravel.com/docs/9.x/csrf
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_quantity': product_quantity
            },
            success: function (response) {
                Swal.fire({
                    position: 'top',
                    title: response.status,
                    showConfirmButton: false,
                    timer: 2000
                })
                loadCart();
            }
        });
    });

    $('.btnAddWishToCart').click(function (e) {
        e.preventDefault();

        let product_id = $(this).closest('.product_data').find('.product_id').val();
        let product_wish_quantity = $(this).closest('.product_data').find('.quantityWishInput').val();

        //https://laravel.com/docs/9.x/csrf
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_quantity': product_wish_quantity
            },
            success: function (response) {
                Swal.fire({
                    position: 'top',
                    title: response.status,
                    showConfirmButton: false,
                    timer: 2000
                })
                loadCart();
            }
        });
    });


    $('.btnAddToWishlist').click(function (e) {
        e.preventDefault();

        let product_id = $(this).closest('.product_data').find('.product_id').val();

        //https://laravel.com/docs/9.x/csrf
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/add-to-wishlist",
            data: {
                'product_id': product_id,
            },
            success: function (response) {
                Swal.fire({
                    position: 'top',
                    title: response.status,
                    showConfirmButton: false,
                    timer: 2000
                })
                loadWish();
            }
        });
    });




    $('.btnIncrement').click(function (e) {
        e.preventDefault();
        let incValue = $(this).closest('.product_data').find('.quantityInput').val();
        let value = parseInt(incValue, 10);
        let products_Remaining = $(this).closest('.product_data').find('.productRem').val();
        let quantity_Remaining = $(this).closest('.product_data').find('.quantityRem').val();

        //console.log("value: " + value);
        //console.log("remain: " + products_Remaining);

        value = isNaN(value) ? 0 : value;
        if (value < products_Remaining || value < quantity_Remaining) {
            value++;
            $(this).closest('.product_data').find('.quantityInput').val(value);
        }
    });

    $('.btnDecrement').click(function (e) {
        e.preventDefault();
        let decValue = $(this).closest('.product_data').find('.quantityInput').val();
        let value = parseInt(decValue, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.quantityInput').val(value);

        }
    });

    $('.btnWishIncrement').click(function (e) {
        e.preventDefault();
        let incValue = $(this).closest('.product_data').find('.quantityWishInput').val();
        let value = parseInt(incValue, 10);
        let quantity_Remaining_Wish = $(this).closest('.product_data').find('.quantityWishRem').val();

        //console.log("value: " + value);
        //console.log("remain: " + products_Remaining);

        value = isNaN(value) ? 0 : value;
        if (value < quantity_Remaining_Wish) {
            value++;
            $(this).closest('.product_data').find('.quantityWishInput').val(value);
        }
    });

    $('.btnWishDecrement').click(function (e) {
        e.preventDefault();
        let decValue = $(this).closest('.product_data').find('.quantityWishInput').val();
        let value = parseInt(decValue, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.quantityWishInput').val(value);

        }
    });

    $('.btnDeleteCartItem').click(function (e) {
        e.preventDefault();
        //https://laravel.com/docs/9.x/csrf
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            type: "POST",
            url: "delete-cart-item",
            data: {
                'prod_id': prod_id,
            },
            success: function (response) {
                window.location.reload();

                Swal.fire({
                    position: 'top',
                    title: response.status,
                    showConfirmButton: false,
                    timer: 2000
                })
            }
        });
    });

    $('.btnDeleteWishItem').click(function (e) {
        e.preventDefault();
        //https://laravel.com/docs/9.x/csrf
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let product_id = $(this).closest('.product_data').find('.product_id').val();
        $.ajax({
            type: "POST",
            url: "delete-wishlist-item",
            data: {
                'product_id': product_id,
            },
            success: function (response) {
                window.location.reload();

                Swal.fire({
                    position: 'top',
                    title: response.status,
                    showConfirmButton: false,
                    timer: 2000
                })
            }
        });

    });

    $('.changeQuantity').click(function (e) {
        e.preventDefault();
        $('.spLoading').show();
        //https://laravel.com/docs/9.x/csrf
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let prod_id = $(this).closest('.product_data').find('.prod_id').val();
        let product_quantity = $(this).closest('.product_data').find('.quantityInput').val();

        data = {
            'prod_id': prod_id,
            'prod_quantity': product_quantity,
        }

        $.ajax({
            type: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                window.location.reload();
            }
        });
    });

    $('.quantityInput').on("change", function (e) {
        e.preventDefault();

        let prod_id = $(this).closest('.product_data').find('.prod_id').val();
        let product_quantity = $(this).closest('.product_data').find('.quantityInput').val();
        let quantity_Remaining = $(this).closest('.product_data').find('.quantityRem').val();
        
        if (!this.value || this.value <= 0) {
            $(this).closest('.product_data').find('.quantityInput').val(1);

            product_quantity = 1;
            
            $('.spLoading').show();
            //https://laravel.com/docs/9.x/csrf
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            data = {
                'prod_id': prod_id,
                'prod_quantity': product_quantity,
            }

            $.ajax({
                type: "POST",
                url: "update-cart",
                data: data,
                success: function (response) {
                    window.location.reload();
                }
            });
        } else if (parseInt(product_quantity) > parseInt(quantity_Remaining)) {
            $(this).closest('.product_data').find('.quantityInput').val(quantity_Remaining);
            console.log("quantity: " + product_quantity);
            console.log("remain: " + quantity_Remaining);

            product_quantity = quantity_Remaining;

            $('.spLoading').show();
            //https://laravel.com/docs/9.x/csrf
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            data = {
                'prod_id': prod_id,
                'prod_quantity': product_quantity,
            }

            $.ajax({
                type: "POST",
                url: "update-cart",
                data: data,
                success: function (response) {
                    window.location.reload();
                }
            });
            
        } else {

            $('.spLoading').show();
            //https://laravel.com/docs/9.x/csrf
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            data = {
                'prod_id': prod_id,
                'prod_quantity': product_quantity,
            }

            $.ajax({
                type: "POST",
                url: "update-cart",
                data: data,
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

});