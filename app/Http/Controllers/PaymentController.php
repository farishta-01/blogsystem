<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Helpers\SecurityHelper;
use Stripe\Customer;
use Stripe\Charge;




class PaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('frontend.payment');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */

    public function payment(Request $request): RedirectResponse
    {
        dd($request->all());
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Create a new customer and save the card details
            $customer = Customer::create([
                'name' => $request->cardholder_name,
                'email' => $request->email,
                'source' => $request->stripeToken,
            ]);

            // Retrieve the card details from the customer object
            $card = $customer->sources->retrieve($customer->default_source);

            // Encrypt sensitive data
            $encryptedCardNumber = SecurityHelper::encrypt($request->card_number);
            $encryptedCvv = SecurityHelper::encrypt($request->cvv);

            // Save the customer ID and other details to your database
            $user = Auth::user();
            $user->stripe_customer_id = $customer->id;
            $user->card_last_four = substr($request->card_number, -4);
            $user->card_brand = $card->brand;
            $user->encrypted_card_number = $encryptedCardNumber;
            $user->encrypted_cvv = $encryptedCvv;
            $user->card_expiration_date = $request->expiration_year . '-' . $request->expiration_month . '-01';
            $user->save();

            // Charge the customer
            Charge::create([
                "amount" => 10 * 100,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => "Test payment from itsolutionstuff.com."
            ]);

            return back()->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

}