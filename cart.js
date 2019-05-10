// var db = openDatabase('my9.db', '1.0', 'Cart DB', 2 * 1024 * 1024);

// db.transaction(function (tx) {
//     tx.executeSql('SELECT * FROM Items', [], function (tx, results) {
//         var len = results.rows.length, i;
//         document.querySelector('#cart').innerText += len;

//         msg = "<p><b>" + results.rows.item(0).lastname + "</b></p>"; 
//             document.querySelector('#name').innerHTML +=  msg; 

//     }, null);
// });


$(document).ready(function () {

    /* Set rates + misc */
    var taxRate = 0.05;
    var shippingRate = 15.00;
    var fadeTime = 300;


    /* Assign actions */
    $('.product-quantity input').change(function () {
        updateQuantity(this);
    });

    $('.product-removal button').click(function () {
        removeItem(this);
    });


    /* Recalculate cart */
    function recalculateCart() {
        var subtotal = 0;

        /* Sum up row totals */
        $('.product').each(function () {
            subtotal += parseFloat($(this).children('.product-line-price').text());
        });

        /* Calculate totals */
        var tax = subtotal * taxRate;
        var shipping = (subtotal > 0 ? shippingRate : 0);
        var total = subtotal + tax + shipping;

        /* Update totals display */
        $('.totals-value').fadeOut(fadeTime, function () {
            $('#cart-subtotal').html(subtotal.toFixed(2));
            $('#cart-tax').html(tax.toFixed(2));
            $('#cart-shipping').html(shipping.toFixed(2));
            $('#cart-total').html(total.toFixed(2));
            if (total == 0) {
                $('.checkout').fadeOut(fadeTime);
            } else {
                $('.checkout').fadeIn(fadeTime);
            }
            $('.totals-value').fadeIn(fadeTime);
        });
    }


    /* Update quantity */
    function updateQuantity(quantityInput) {
        /* Calculate line price */
        var productRow = $(quantityInput).parent().parent();
        var price = parseFloat(productRow.children('.product-price').text());
        var quantity = $(quantityInput).val();
        var linePrice = price * quantity;

        /* Update line price display and recalc cart totals */
        productRow.children('.product-line-price').each(function () {
            $(this).fadeOut(fadeTime, function () {
                $(this).text(linePrice.toFixed(2));
                recalculateCart();
                $(this).fadeIn(fadeTime);
            });
        });
    }


    /* Remove item from cart */
    function removeItem(removeButton) {
        /* Remove row from DOM and recalc cart total */
        var productRow = $(removeButton).parent().parent();
        productRow.slideUp(fadeTime, function () {
            productRow.remove();
            recalculateCart();
        });
    }

});

function proceedToPay() {
    console.log("This is the checkout button");
    document.getElementById("myButton").style.display="none";

    $("#formDiv").append("<form><div class='form-group'><label for='name'>Full name</label><input type='text' class='form-control' id='exampleInputEmail1' placeholder='Enter full name'></div><div class='form-group'><label for='phnNo'>Phone Number</label><input type='number' class='form-control' id='phoneNo' placeholder='Phone Number'></div><button type='submit' class='btn btn-primary'>Pay Now</button></form>");
}



