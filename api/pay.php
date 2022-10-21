<?php

require '../vendor/autoload.php';
require '../consts.php';
require './stripeHelper.php';

use App\StripeHelper;
use Stripe\Stripe;

header('Content-Type: application/json');

// Only accessible by POST method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(400);

    echo json_encode([
        'error' => 'Invalid request.',
    ]);

    exit;
}

// Begin payment process
try {
    // Set Stripe key
    Stripe::setApiKey(STRIPE_SECRET_KEY);

    // Simulate a cart, implement yours here
    $cart = require './cart.php';

    // Calculate the total amount for the payment intent, once again, implement yours here
    $amount = StripeHelper::calculateAmountFromCart($cart);

    // Build a body object from the request, we'll use it for creating our payment intent
    $body = StripeHelper::buildBodyFromRequest();

    // Build the payment intent
    $intent = StripeHelper::createPaymentIntent($body, $amount);

    // Build the response
    $response = StripeHelper::generateResponse($intent);

    echo json_encode($response);
}
// Catch any other error, just in case
catch (Exception $e) {
    echo json_encode([
        'error' => $e->getMessage(),
    ]);
}