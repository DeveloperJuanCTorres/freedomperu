<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Culqi\Culqi;

class CulqiController extends Controller
{
    public function pagar(Request $request)
    {

        $request->validate([

            'token'=>'required',

            'email'=>'required|email',

            'amount'=>'required',

            'currency_code'=>'required',

            'device_finger_print_id'=>'required'

        ]);

        try{

            $culqi = new Culqi([

                'api_key'=>config('services.culqi.secret_key')

            ]);

            $body=[

                "amount"=>(int)$request->amount,

                "currency_code"=>$request->currency_code,

                "capture"=>true,

                "email"=>$request->email,

                "source_id"=>$request->token,

                "description"=>"Compra Miski Store",

                "antifraud_details"=>[

                    "address" => "Av. Javier Prado 123",

                    "address_city"=>"Lima",

                    "country_code"=>"PE",

                    "first_name"=>"Juan",

                    "last_name"=>"Torres",

                    "phone_number"=>"978209130",

                    "device_finger_print_id"=>$request->device_finger_print_id

                ],

                "metadata"=>[

                    "origin"=>"Laravel",

                    "integration"=>"Checkout"

                ]

            ];

            $encryption = [

                "rsa_public_key" => config('services.culqi.rsa_public_key'),

                "rsa_id" => config('services.culqi.rsa_id'),

            ];

            $charge = $culqi->Charges->create(
                $body,
                $encryption
            );

            if (is_string($charge)) {
                $charge = json_decode($charge);
            }

            if (isset($charge->object) && $charge->object == "error") {

                return response()->json([
                    'success' => false,
                    'message' => $body,
                    'data' => $charge
                ],422);

            }

            return response()->json([
                'success' => true,
                'message' => 'Pago aprobado.',
                'data' => $charge
            ]);

        }

        catch(\Exception $e){

            return response()->json([
                'success' => false,
                'exception' => get_class($e),
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ], 500);

        }

    }

}
