<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shetabit\Payment\Exceptions\InvalidPaymentException;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Payment\Invoice;

class InvoiceController extends Controller
{
    public function zarinPal_request(Request $request)
    {

        # create new invoice
        $price = (int) $request->price;
        $invoice = (new Invoice)->amount($price);


        # purchase the given invoice
        return Payment::callbackUrl(route('zarinpal.verify' , $price))
            ->purchase($invoice, function($driver, $transactionId) {
                // we can store $transactionId in database
                \App\Invoice::create([
                    'transaction_id' => $transactionId
                ]);
            }
            )->pay()->getTargetUrl();

    }

    public function callback($price, Request $request)
    {

        # you need to verify the payment to insure the invoice has been paid successfully
        // we use transaction's id to verify payments
        // its a good practice to add invoice's amount.

        $price = (int) $price;
        $pay = \App\Invoice::where('transaction_id' , request()->get('Authority'))->first();
        try {
            Payment::amount($price)->transactionId(\request()->get('Authority'))->verify();
            if ($pay)
            {
                $pay->update([
                    'price' => $price ,
                    'message' => 'پرداخت با موفقیت انجام شد'
                ]);
            }
            return redirect(route('pay.success'))->with('pay_id' , request()->get('Authority'));

        } catch (InvalidPaymentException $exception) {
            /**
            when payment is not verified , it throw an exception.
            we can catch the exception to handle invalid payments.
            getMessage method, returns a suitable message that can be used in user interface.
             **/
            //echo $exception->getMessage();
            $pay->update([
                'message' => $exception->getMessage() ,
                'price' => $price
            ]);

            return redirect(route('pay.error'));
        }
    }
}
