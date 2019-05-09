<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Read More</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "SELECT * FROM item";
        $result = $conn->query($sql);
        $item_array = array();        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $item = array();
                $item["id"] = $row["i_id"];
                $item["name"] = $row["i_name"];
                $item["price"] = $row["i_price"];
                array_push($item_array,$item);
            }
        }
        $conn->close();        
    ?>
    <script>var items = <?php echo json_encode($item_array); ?>;</script>
    <script>
        var items_arr = [];
        $(document).ready(function() {
            for(i=0;i<items.length;i++) {
                items_arr[items[i].id] = items[i];
            }
            var db = openDatabase('cart_db', '1.0', 'Cart DB', 2 * 1024 * 1024);
            db.transaction(function (tx) { 
                tx.executeSql('SELECT * FROM cart_item', [], function (tx, results) { 
                var len = results.rows.length, i; 
                for (i = 0; i < len; i++) {
                    id = results.rows.item(i).i_id; 
                    amount = items_arr[id].price;
                    $("#my_div").append("<div class='row' style='margin-bottom: 5px;'><div class='col-4'>"+items_arr[id].name+"</div><div class='col-4'>"+amount+"</div><div class='col-4'><button class='btn btn-danger' onClick='deleteItem("+id+")'>delete</button></div></div>"); 
                } 

                }, null); 
            });
        });
        function deleteItem(mid) {
            var db = openDatabase('cart_db', '1.0', 'Cart DB', 2 * 1024 * 1024);
            db.transaction(function (tx) { 
                tx.executeSql('DELETE FROM cart_item WHERE i_id='+mid, [], function (tx, results) { 
                    location.reload(); 

                }, null); 
            });            
        }
    </script>
</head>
<body>
    <div id="my_div">
    </div> 
    <button class="btn btn-success" type="submit">Order Now!</button>
</body>
</html>