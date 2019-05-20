<?php
    include_once "conn.php";
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $cart_item = $_POST['cart_item'];
    $subtotal = (float) $_POST['subtotal'];
    $tax = (float) $_POST['tax'];
    $shipping = (float) $_POST['shipping'];
    $total = (float) $_POST['total'];
    $c_id = 0;
    $p_id = 0;

    //insertion into customer table
    $sql = "SELECT * FROM customer WHERE c_phone='$phone';"; 
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $c_id = $row['c_id'];
        $s = "Old c_id: ".$c_id;
    } else {
        $sql = "INSERT INTO customer(c_name, c_phone) VALUES ('$name','$phone');";
        mysqli_query($conn, $sql);
        $sql = "SELECT * FROM customer WHERE c_phone='$phone';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $c_id = $row['c_id'];
        $s =  "New c_id: ".$c_id;
    }


    //insertion into purchase table
    $sql = "INSERT INTO purchase(c_id, p_subtotal, p_tax, p_shipping, p_total) VALUES ('$c_id', '$subtotal', '$tax', '$shipping', '$total')";
    mysqli_query($conn, $sql);
    $sql = "SELECT p_id FROM purchase ORDER BY p_id DESC LIMIT 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $p_id = $row['p_id'];

    //insertion into purchase_item table
    foreach ($cart_item as $c_item) {
        $id = $c_item["i_id"];
        $qty = $c_item["i_qty"];
        $total = (float) $c_item["i_price"]*$qty;
        $sql =  "INSERT INTO purchase_items(c_id, p_id, i_id, qty, total_price) VALUES ('$c_id','$p_id','$id','$qty','$total');";
        mysqli_query($conn, $sql);
    }

    echo "Order placed!";
?>