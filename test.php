<?php
    include_once "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <?php
        $id = 5;
        echo "<a href='readmore.php?id=".$id."'>"."Click Me!"."</a>"
    ?>
    
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
        
            <th>Description</th>
       
            <th>Price in Rupees</th>
        </tr>
        <?php
            $sql = "SELECT * FROM item;";
            $result = mysqli_query($conn,$sql);
            $result_check = mysqli_num_rows($result);

            if($result_check > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['i_id'];
                    echo "<tr><td>".$row['i_id']."</td><td>"."<a href='readmore.php?id=".$id."'>".$row['i_name']."</a>"."</td><td>".$row['i_description']."</td><td>".$row['i_price']."</td></tr>";
                }
            }
        ?>
    </table>

<br><br><br>
<h1>ORDER FORM</h1>
<form action="order.php" method="post">
    <input type="text" name="c_name" placeholder="Enter Name"><br>
    <input type="text" name="phone" placeholder="Enter Phone"><br>
    <input type="text" name="item_1" placeholder="Enter Item 2"><br>
    <input type="text" name="qty_1" placeholder="Quantity of 1"><br>
    <input type="text" name="item_2" placeholder="Enter Item 2"><br>
    <input type="text" name="qty_2" placeholder="Quantity of 2"><br>
    <button type="submit" name="submit">Place Order!</button>
</form>

<?php
    $sql = "SELECT i_name FROM item;";
    $result = mysqli_query($conn,$sql);
    $result_check = mysqli_num_rows($result);

    if($result_check > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<h2>".$row['i_name']."</h2>"."<br>";
        }
    }
?>

</body>
</html>