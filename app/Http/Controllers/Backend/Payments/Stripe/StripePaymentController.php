<?php

namespace App\Http\Controllers\Backend\Payments\Stripe;

use Stripe\Stripe;
use App\Models\OrderGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Backend\Payments\PaymentsController;

class StripePaymentController extends Controller
{
    # stripe payment view
    public function initPayment()
    {
        return view('payments.stripe');
    }

    # init payment
    public function checkoutSession()
    {
        $amount = 0;
        if (session('payment_type') == 'order_payment') {
            $orderGroup = OrderGroup::where('order_code', session('order_code'))->first(['grand_total_amount']);
            $amount = round($orderGroup->grand_total_amount * 100);
        }
        $supportedCurrency = [
            "EUR",   # Euro
            "GBP",   # British Pound Sterling
            "CAD",   # Canadian Dollar
            "AUD",   # Australian Dollar
            "JPY",   # Japanese Yen
            "CHF",   # Swiss Franc
            "NZD",   # New Zealand Dollar
            "HKD",   # Hong Kong Dollar
            "SGD",   # Singapore Dollar
            "SEK",   # Swedish Krona
            "DKK",   # Danish Krone
            "PLN",   # Polish Złoty
            "NOK",   # Norwegian Krone
            "CZK",   # Czech Koruna
            "HUF",   # Hungarian Forint
            "ILS",   # Israeli New Shekel
            "MXN",   # Mexican Peso
            "BRL",   # Brazilian Real
            "MYR",   # Malaysian Ringgit
            "PHP",   # Philippine Peso
            "TWD",   # New Taiwan Dollar
            "THB",   # Thai Baht
            "TRY",   # Turkish Lira
            "RUB",   # Russian Ruble
            "INR",   # Indian Rupee
            "ZAR",   # South African Rand
            "AED",   # United Arab Emirates Dirham
            "SAR",   # Saudi Riyal
            "KRW",   # South Korean Won
            "CNY"    # Chinese Yuan
        ];

        if (Session::has('currency_code')) {
            if (in_array(strtoupper(Session::get('currency_code')), $supportedCurrency)) {
                $currencyCode = strtoupper(Session::get('currency_code'));
            } else {
                $currencyCode = 'USD';
                $amount = priceToUsd($amount);
            }
        } else {
            $currencyCode = 'USD';
            $amount = priceToUsd($amount);
        }
        if ($amount <= 0) {
            return (new PaymentsController)->payment_failed();
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => "USD",
                        'product_data' => [
                            'name' => "Payment"
                        ],
                        'unit_amount' => $amount,
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
            'cancel_url' => route('stripe.cancel'),
        ]);
        return response()->json(['id' => $session->id, 'status' => 200]);
    }

    # successful payment
    public function success()
    {
        try {
            $payment = ["status" => "Success"];
            $payment_type = session('payment_type');
            if ($payment_type == 'order_payment') {
                return (new PaymentsController)->payment_success(json_encode($payment));
            }
        } catch (\Exception $e) {
            return (new PaymentsController)->payment_failed();
        }
    }

    # cancelled
    public function cancel()
    {
        return (new PaymentsController)->payment_failed();
    }
}
