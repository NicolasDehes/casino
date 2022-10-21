var stripe = null;
var form = document.getElementById('payment-form');
var formBtn = document.getElementById('submit-btn');
var formBtnText = document.querySelector('#button-text');
var formSpinner = document.querySelector('#spinner');

document.addEventListener('DOMContentLoaded', function () {
    var stripePublicKey = form.dataset.stripePublicKey;
    stripe = Stripe(stripePublicKey);
    var card = stripe.elements().create('card', {
        hidePostalCode: true,
        style: {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4',
                },
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a',
            },
        },
    });

    // Bind Stripe card to the DOM
    card.mount('#card-element');

    // Launch payment on submit
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        pay(stripe, card);
    });
});

// Collect card details and pays for the order
var pay = function (stripe, card) {
    changeLoadingState(true);

    stripe
        .createPaymentMethod('card', card)
        .then(function (result) {
            if (result.error) {
                showError(result.error.message);
                throw result.error.message;
            } else {
                return fetch('../api/pay.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        paymentMethodId: result.paymentMethod.id,
                        amount : document.getElementById("number-credit").value + '00',
                        idUser : form.dataset.iduser,
                    }),
                });
            }
        })
        .then(async function (result) {
            return result.json();
        })
        .then(function (paymentData) {
            // Card needs 2 step validation / 3D secure
            if (paymentData.requiresAction) {
                handleAction(paymentData.clientSecret);
            }
            // Triggered an error from server, we show it
            else if (paymentData.error) {
                showError(paymentData.error);
            }
            // Everything went perfect, payment completed !
            else {
                orderComplete(paymentData.clientSecret);
            }
        })
        .catch(function (error) {
            console.log(error);
        });
};

// Request authentication (used by some cards that require 3D secure payments)
var handleAction = function (clientSecret) {
    stripe
        .handleCardAction(clientSecret)
        .then(function (data) {
            if (data.error) {
                showError('Your card was not authenticated, please try again');
            } else if (data.paymentIntent.status === 'requires_confirmation') {
                fetch('../api/pay.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        paymentIntentId: data.paymentIntent.id,
                        amount : document.getElementById("number-credit").value + '00',
                        idUser : form.dataset.iduser,
                    }),
                })
                    .then(function (result) {
                        return result.json();
                    })
                    .then(function (response) {
                        if (response.error) {
                            showError(response.error);
                        } else {
                            orderComplete(clientSecret);
                        }
                    });
            }
        });
};

// Shows a success message when the payment is complete
var orderComplete = function (clientSecret) {
    stripe
        .retrievePaymentIntent(clientSecret)
        .then(function (result) {
            console.info(result);
            form.classList.add('hidden');
            changeLoadingState(false);
            window.location.href = '../controleur/FrontControleur.php?action=profil';
        });
};

// Show an error message
var showError = function (errorMsgText) {
    console.error(errorMsgText);
    changeLoadingState(false);
};

// Toggle spinner on payment submission
var changeLoadingState = function (isLoading) {
    if (isLoading) {
        formBtn.disabled = true;
        formSpinner.classList.remove('hidden');
        formBtnText.classList.add('hidden');
    } else {
        formBtn.disabled = false;
        formSpinner.classList.add('hidden');
        formBtnText.classList.remove('hidden');
    }
};