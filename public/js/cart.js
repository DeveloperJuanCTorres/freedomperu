/*
|--------------------------------------------------------------------------
| CART.JS
|--------------------------------------------------------------------------
*/

const Cart = {

    init() {

        this.bindEvents();

    },

    bindEvents() {

        // aumentar cantidad
        $(document).off('click','.quantity-plus');
        $(document).on('click','.quantity-plus',this.increase);

        // disminuir cantidad
        $(document).off('click','.quantity-minus');
        $(document).on('click','.quantity-minus',this.decrease);

        // eliminar
        $(document).off('click','.remove-cart');
        $(document).on('click','.remove-cart',this.remove);

    },

    increase() {

        let id = $(this).closest('.quantity-group').data('id');

        Cart.update(id,1);

    },

    decrease() {

        let id = $(this).closest('.quantity-group').data('id');

        Cart.update(id,-1);

    },

    update(id,action){

        $.ajax({

            url:'/cart/update',

            type:'POST',

            data:{
                _token:$('meta[name="csrf-token"]').attr('content'),
                id:id,
                action:action
            },

            beforeSend(){

                Cart.loading(true);

            },

            success:function(response){

                Cart.refresh(response);

            },

            complete(){

                Cart.loading(false);

            }

        });

    },

    remove(){

        let id=$(this).data('id');

        Swal.fire({

            title:'¿Eliminar producto?',

            text:'El producto será eliminado del carrito.',

            icon:'warning',

            showCancelButton:true,

            confirmButtonText:'Sí, eliminar',

            cancelButtonText:'Cancelar',

            confirmButtonColor:'#1f0a34'

        }).then((result)=>{

            if(!result.isConfirmed) return;

            $.ajax({

                url:'/cart/remove',

                type:'POST',

                data:{
                    _token:$('meta[name="csrf-token"]').attr('content'),
                    id:id
                },

                beforeSend(){

                    Cart.loading(true);

                },

                success:function(response){

                    Cart.refresh(response);

                    Swal.fire({

                        toast:true,
                        position:'top-end',
                        timer:1800,
                        showConfirmButton:false,
                        icon:'success',
                        title:'Producto eliminado'

                    });

                },

                complete(){

                    Cart.loading(false);

                }

            });

        });

    },

    refresh(response){

        /*
        response debe devolver:

        html
        subtotal
        total
        quantity
        offcanvas
        */

        $("#cartItems").html(response.cart);

        $('#cart-content').html(response.offcanvas);

        $('.cart-counter').text(response.quantity);

        $('#subtotal').text(response.subtotal);

        $('#total').text(response.total);

        $("#cartSubtotal").text("S/ " + response.subtotal);

        $("#cartTotal").text("S/ " + response.total);

        $("#cart-count").text(response.count);

        $("#cartSummary").html(response.summary);

        Cart.bindEvents();

    },

    loading(show){

        if(show){

            $('body').addClass('loading-cart');

        }else{

            $('body').removeClass('loading-cart');

        }

    }

};

$(function(){

    Cart.init();

});