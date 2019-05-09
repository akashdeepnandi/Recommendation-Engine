
<?php
    include_once "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            $c_name = $_POST['c_name'];
            $phone = $_POST['phone'];
            $item_1 = $_POST['item_1'];
            $qty_1 = $_POST['qty_1'];
            $item_2 = $_POST['item_2'];
            $qty_2 = $_POST['qty_2'];
        
            if (empty($c_name) || empty($phone) || empty($item_1) || empty($qty_1) || empty($item_2) || empty($qty_2)) {
                echo "Incomplete Fields";
            } elseif (strlen($phone) != 10) {
                echo "Incomplete Phone Number!";
            } else {
            
                $item_1 = (int)$item_1;
                $qty_1 = (int)$qty_1;
                $item_2 = (int)$item_2;
                $qty_2 = (int)$qty_2;
                $qty = array($qty_1,$qty_2);
                $total = [];
                $i = 0;
                $c_id=0;

                $sql = "SELECT * FROM item WHERE i_id='$item_1' OR i_id='$item_2';";
                $result = mysqli_query($conn, $sql);
            
                while($row = mysqli_fetch_assoc($result)) {
                    $total[$i] = (float)($row['i_price'])*$qty[$i];
                    $i++;
                }
                $sql = "SELECT * FROM customer WHERE c_phone='$phone';"; 
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $c_id = $row['c_id'];
                } else {
                    $sql = "INSERT INTO customer(c_name, c_phone) VALUES ('$c_name','$phone');";
                    mysqli_query($conn, $sql);
                    $sql = "SELECT * FROM customer WHERE c_phone='$phone';";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $c_id = $row['c_id'];
                }

                //purchase table insert

                $sql = "INSERT INTO purchase(c_id) VALUES ('$c_id');";
                mysqli_query($conn, $sql);
                $sql = "SELECT p_id FROM purchase WHERE c_id='$c_id';";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $p_id = $row['p_id'];

                //purchase items
                $qty = array($qty_1, $qty_2);
                $items = array($item_1, $item_2);

                for ($x = 0; $x <= 1; $x++) {
                    $sql = "INSERT INTO purchase_items(c_id, p_id, i_id, qty, total_price) VALUES ('$c_id','$p_id','$items[$x]','$qty[$x]','$total[$x]');";
                    mysqli_query($conn, $sql);
                }


        }
    }
    ?>
</body>
</html>