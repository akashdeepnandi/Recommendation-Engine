<?php
    include_once "conn.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM item WHERE i_id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['i_name'];
    $description = $row['i_description'];
    $image = $row['i_image'];
    $price = $row['i_price'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $name;?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid" style="padding-bottom:10px; padding-top: 10px">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <i class="fas fa-info-circle"></i>
                Item Details
            </a>
            <a class="navbar-brand ml-auto" href="cart.php">
                <button class="btn btn-outline-success"><i class="fas fa-shopping-cart"></i> Cart <span class="badge badge-success" id="cart_count"></span></button>
            </a>
        </nav>

        <div class="row" style="margin-top:10px;">
            <div class="col-6" style="width:auto; height:auto;">
                <img id="img1" src=<?php echo $image;?> class="img-fluid" style="width:auto; height: auto;">
                <div class="row" style="margin-top:10px">
                </div>
            </div>

            <div class="col-6" style="width:auto; height:auto;">
                <h1 id = "starter_title1"><?php echo $name;?></h1>
                <h3><?php echo $description;?></h3>
                <h4 id="price">Price: ₹ <?php echo $price;?></h4>
                <button type="button" class="btn btn-success btn-lg" onclick="addToCart(document.getElementById('starter_title1').innerText, document.getElementById('price').innerText, document.getElementById('img1').src)"><i class="fas fa-shopping-cart"></i> Add To
                    Cart</button>
            </div>
        </div>
    </div>
</body>

<script>
    var db = openDatabase('cart_db', '1.0', 'Cart DB', 2 * 1024 * 1024);
    var len;
    db.transaction(function(tx) {
        tx.executeSql('SELECT * FROM cart_item', [], function(tx, results) {
            len = results.rows.length;
            document.querySelector('#cart_count').innerHTML += len;
        }, null);
    });
    function addToCart(i_id) {   
        db.transaction(function (tx) { 
            var x = 1;
            tx.executeSql("INSERT INTO cart_item (i_id, i_qty) VALUES (?, ?)",[i_id, x]);
            location.reload();
        });
    }
</script>

</html>