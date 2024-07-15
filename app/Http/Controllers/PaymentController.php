<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function pay()
    {
        $checkoutMethod = CheckoutController::checkout();
        dd($checkoutMethod);
        $data = [
            'data' => [
                'attributes' => [
                    'line_items' => [
                        [
                            'currency'      => 'PHP',
                            'amount'        => 10000,
                            'description'   => 'text',
                            'name'          => 'Test Product',
                            'quantity'      => 1,
                        ]
                    ],
                    'payment_method_types' => [
                        'card',
                    ],
                    'success_url' => 'http://localhost:8000/success',
                    'cancel_url'  => 'http://localhost:8000/success',
                    'description' => 'text'
                ],
            ]
       ];

       $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions')
                    ->withHeader('Content-Type: application/json')
                    ->withHeader('accept: application/json')
                    ->withHeader('Authorization: Basic '.env('AUTH_PAY'))
                    ->withData($data)
                    ->asJson()
                    ->post();

        Session::put('session_id',$response->data->id);

        return redirect()->to($response->data->attributes->checkout_url);
    }

    public function success()
    {
       $sessionId = Session::get('session_id');


      $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions/'.$sessionId)
                ->withHeader('accept: application/json')
                ->withHeader('Authorization: Basic '.env('AUTH_PAY'))
                ->asJson()
                ->get();


    }

}
