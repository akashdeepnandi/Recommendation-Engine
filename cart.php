<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Cart</title>
    <link rel="stylesheet" type="text/css" href="cart.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script type="text/javascript" src="cart.js"></script>

</head>

<body>
    <div class="container-fluid" style="padding-bottom:10px; padding-top: 10px">
        <nav class="navbar navbar-light bg-light">
            <button type="button" class="btn btn-primary">
                My Cart <span class="badge badge-light" id="cart"></span>
            </button>
        </nav>

        <h1>Shopping Cart</h1>

        <div class="shopping-cart">

            <div class="column-labels">
                <label class="product-image">Image</label>
                <label class="product-details">Product</label>
                <label class="product-price">Price</label>
                <label class="product-quantity">Quantity</label>
                <label class="product-removal">Remove</label>
                <label class="product-line-price">Total</label>
            </div>

            <div class="product">
                <div class="product-image">
                    <img src="img/starter.jpg">
                </div>
                <div class="product-details">
                    <div class="product-title">Starter 1</div>
                    <p class="product-description"> Tasty</p>
                </div>
                <div class="product-price">12.99</div>
                <div class="product-quantity">
                    <input type="number" value="2" min="1">
                </div>
                <div class="product-removal">
                    <button class="remove-product">
                        Remove
                    </button>
                </div>
                <div class="product-line-price">25.98</div>
            </div>

            <div class="product">
                <div class="product-image">
                    <img src="img/starter.jpg">
                </div>
                <div class="product-details">
                    <div class="product-title">Starter 2</div>
                    <p class="product-description">Delicious</p>
                </div>
                <div class="product-price">45.99</div>
                <div class="product-quantity">
                    <input type="number" value="1" min="1">
                </div>
                <div class="product-removal">
                    <button class="remove-product">
                        Remove
                    </button>
                </div>
                <div class="product-line-price">45.99</div>
            </div>

            <div class="totals">
                <div class="totals-item">
                    <label>Subtotal</label>
                    <div class="totals-value" id="cart-subtotal">71.97</div>
                </div>
                <div class="totals-item">
                    <label>Tax (5%)</label>
                    <div class="totals-value" id="cart-tax">3.60</div>
                </div>
                <div class="totals-item">
                    <label>Shipping</label>
                    <div class="totals-value" id="cart-shipping">15.00</div>
                </div>
                <div class="totals-item totals-item-total">
                    <label>Grand Total</label>
                    <div class="totals-value" id="cart-total">90.57</div>
                </div>
            </div>

            <button id="myButton" class="checkout" onclick="proceedToPay()">Checkout</button>
            <div id="formDiv"></div>
        </div>
    </div>
</body>

</html>