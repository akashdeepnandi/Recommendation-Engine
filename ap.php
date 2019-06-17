<?php
    include_once "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Testing Apriori</title>
</head>
<body>
    <h1>Hello!</h1>
    <?php
        $sql = "SELECT p_id FROM purchase;";
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);
        $p_id = []; //Array created to store purchase ids of every order
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($p_id, $row["p_id"]);
        }

        $item_count = [];
        $item_data = "";
        $i_name = [];
        $fileName = "/home/akash/Documents/item_data"; //location of the file
        $fp = fopen($fileName,"w");
        if( $fp == false ) {
            echo ( "Error in opening file" );
            exit();
        }
        foreach ($p_id as $p) { //for each purchase
            //executing query to fetch item ids(i_id) using purchase ids(p_id)
            
            $sql = "SELECT i_id FROM purchase_items WHERE p_id=".$p;
            $result = mysqli_query($conn, $sql);
            
            $arr = []; //indexing for this array is used from 1 to 30

            for ($i=1; $i <=30 ; $i++) { 
                $arr[$i] = 0;
            }
            $str = "";
            while ($row = mysqli_fetch_assoc($result)) {
                if ($str == "") {
                    $str = $str.$row["i_id"];
                } else {
                    $str = $str.", ".$row["i_id"];
                }

                $arr[$row["i_id"]] = 1;

            }
            
            array_push($item_count, $arr);
            fwrite( $fp, $str."\n" );
            $item_data = $item_data.$str."<br>";
        }
        $x = "Akash<br>deep";
        echo $item_data;
        //fetching item names
        $sql = "SELECT i_name FROM item;";
        $result = mysqli_query($conn, $sql);
        
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($i_name, $row["i_name"]);
        }
        
        
        //showing mXn array         

        foreach ($item_count as $arr) {
            echo implode(" ", $arr)."<br>";
        }

        
        

    ?>
</body>
</html>