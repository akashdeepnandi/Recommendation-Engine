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
    <style>
        a:hover {
            text-decoration: none;
            color: #5CB85C;
        }
    </style>
</head>

<body>
<!-- <div class="container-fluid" style="padding-bottom:10px; padding-top: 10px">
        <nav class="navbar navbar-light bg-light">
            <a href="index.php">
            <button type="button" class="btn btn-primary">
                Homepage <span class="badge badge-light" id="cart"></span>
            </button>
            </a>
        </nav> -->
    <div class="container-fluid" style="padding-bottom:10px; padding-top: 10px">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <i class="fas fa-info-circle"></i>
                Item Details
            </a>

            <a class="navbar-brand ml-auto" href="index.php">
                <button class="btn btn-outline-primary"><i class="fas fa-home"></i> Home <span class="badge badge-primary"></span></button>
            </a>

            <a class="navbar-brand float-right" href="cart.php">
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
                <button type="button" class="btn btn-success btn-lg" onclick="addToCart()"><i class="fas fa-shopping-cart"></i> Add To
                    Cart</button>
            </div>
        </div>
    
    
        <div class="row p-2 rounded-left" style="background-color:#5CB85C; border-radius:100%; margin-left:0px; margin-top:5px; margin-bottom:10px; width: 20%"><div class="align-middle" style="color:white">RECOMMENDATIONS</div></div>
        <div>
        <?php
            $file = fopen("rules.csv","r");
            $items = [];
            while(! feof($file)) { //rules in items
                $arr = fgetcsv($file);
                if ($arr[0] == $id) {
                    array_push($items, $arr);
                }
            }
            $temp = [];
            for ($i = sizeof($items)-1, $j = 0; $i >=0 ; $i--, $j++) { 
                $temp[$j] = $items[$i];            
            }
            $items = $temp;

            $i = 0;
            
            foreach ($items as $item) {
                if($i < 3) {
                    $sql = "SELECT * FROM item WHERE i_id='$item[1]'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
    

                    echo "<div style='display:inline-block'><a href='readmore.php?id=".$row['i_id']."'><img src=".$row['i_image']." class='img-fluid float-left' style='padding-right:20px;width:400px; margin-bottom:5px'><h4 align='center'>".$row['i_name']."</h4></a></div>";
                    $i++;
                }
            }
            
            
            
            fclose($file);
        ?>
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
    function addToCart() {  
        i_id = <?php echo $_GET['id']; ?> 
        db.transaction(function (tx) { 
            var x = 1;
            tx.executeSql("INSERT INTO cart_item (i_id, i_qty) VALUES (?, ?)",[i_id, x]);
            location.reload();
        });
    }
</script>

</html>