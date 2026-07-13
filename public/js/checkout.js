$("#btnPagar").click(function () {

    console.log("Botón presionado");
    console.log(window.CULQI_PUBLIC_KEY);

    Culqi.publicKey = window.CULQI_PUBLIC_KEY;

    Culqi.settings({
        title: "Miski Store",
        currency: "PEN",
        amount: 5000
    });

    Culqi.options({
        lang: "auto"
    });

    console.log("Abriendo Culqi...");

    Culqi.open();

});

function culqi() {

    if (Culqi.token) {

        enviarPago(
            Culqi.token.id,
            Culqi.token.email
        );

    } else if (Culqi.error) {

        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: Culqi.error.user_message
        });

    }

}

function enviarPago(token, email){

    $.ajax({

        url:'/culqi/pagar',

        type:'POST',

        data:{

            _token:$('meta[name="csrf-token"]').attr('content'),

            token:token,

            email:email,

            amount:5000,

            currency_code:'PEN',

            device_finger_print_id:Culqi.token.client.device_fingerprint

        },

        success:function(res){

            console.log(res);

            Swal.fire({

                icon:'success',

                title:'Pago realizado',

                text:'Cargo creado correctamente.'

            });

        },

        error:function(xhr){

            console.log("STATUS:", xhr.status);
            console.log("RESPONSE:", xhr.responseJSON);

            // Swal.fire({
            //     icon: 'error',
            //     title: 'Error',
            //     html: '<pre style="text-align:left">' +
            //         JSON.stringify(xhr.responseJSON, null, 2) +
            //         '</pre>'
            // });

        }

    });

}