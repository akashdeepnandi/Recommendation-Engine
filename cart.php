<!DOCTYPE html>
<html lang="en">
<?php
    include_once "conn.php";
    $sql = "SELECT * FROM item;";
    $result = mysqli_query($conn, $sql); //item data fetched
    $item = [];
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
        $item[$i] = $row;
        $i++;
    }

    $item = json_encode($item);
  
?>
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
    <script>
        $(document).ready(function(){
            var item = <?php echo $item?>;

            var id = 0;
            var t = 0;
            var cart_item = [];
            var db = openDatabase('cart_db', '1.0', 'Cart DB', 2 * 1024 * 1024);

            db.transaction(function (tx) {
                tx.executeSql("CREATE TABLE IF NOT EXISTS cart_item (ci_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, i_id INTEGER unique NOT NULL)");
            })
            db.transaction(function (tx) {  
                tx.executeSql("SELECT i_id FROM cart_item", [], function (tx, results){
                    var len = results.rows.length; 
                    for (i = 0; i < len; i++) { 
                        id = parseInt(results.rows.item(i).i_id) - 1;
                        cart_item[i] = item[id];
                    }
                    //document.getElementById('cart').innerHTML = '<div class="column-labels"><label class="product-image">Image</label><label class="product-details">Product</label><label class="product-price">Price</label><label class="product-quantity">Quantity</label><label class="product-removal">Remove</label><label class="product-line-price">Total</label></div><div class="product"><div class="product-image"><img src="img/starter.jpg"></div><div class="product-details"><div class="product-title" id="title">Starter 1</div><p class="product-description"> Tasty</p></div><div class="product-price">12.99</div><div class="product-quantity"><input type="number" value="2" min="1"></div><div class="product-removal"><button class="remove-product">Remove</button></div><div class="product-line-price">25.98</div></div><div class="product"><div class="product-image"><img src="img/starter.jpg"></div><div class="product-details"><div class="product-title">Starter 2</div><p class="product-description">Delicious</p></div><div class="product-price">45.99</div><div class="product-quantity"><input type="number" value="1" min="1"></div><div class="product-removal"><button class="remove-product">Remove</button></div><div class="product-line-price">45.99</div></div><div class="totals"><div class="totals-item"><label>Subtotal</label><div class="totals-value" id="cart-subtotal">71.97</div></div><div class="totals-item"><label>Tax (5%)</label><div class="totals-value" id="cart-tax">3.60</div></div><div class="totals-item"><label>Shipping</label><div class="totals-value" id="cart-shipping">15.00</div></div><div class="totals-item totals-item-total"><label>Grand Total</label><div class="totals-value" id="cart-total">90.57</div></div></div><button id="myButton" class="checkout" onclick="proceedToPay()">Checkout</button><div id="formDiv"></div>';
                }, null); 
            });
            
            // if (cart_item.length === 0) {
            //     console.log("empty");
            // } else {
            //     console.log("xxx");
            // }
        });
        // db.transaction(function (tx) {
        //     tx.executeSql("DROP TABLE cart_item");
        // });
        
    </script>

</head>

<body>
    <div class="container-fluid" style="padding-bottom:10px; padding-top: 10px">
        <nav class="navbar navbar-light bg-light">
            <button type="button" class="btn btn-primary">
                My Cart <span class="badge badge-light" id="cart"></span>
            </button>
        </nav>

        <h1>Shopping Cart</h1>

        <div class="shopping-cart" id="cart">

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
                    <div class="product-title" id="title">Starter 1</div>
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