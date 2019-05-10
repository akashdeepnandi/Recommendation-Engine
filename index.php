
<?php
    include_once "conn.php";
    $categories = ["STARTERS", "SOUPS", "MAIN COURSE", "BREADS AND RICE"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recomendation Engine</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="db.js"></script>
</head>

<body>
    <div class="container-fluid" style="padding-bottom:10px">
        <nav class="navbar sticky-top navbar-light bg-light">
            <a class="navbar-brand ml-auto" href="cart.php">
                <button class="btn btn-outline-success"><i class="fas fa-shopping-cart"></i> Cart</button>
            </a>
        </nav>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top:10px">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/xxx2.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Find the best restaurants, cafés, and bars in your city</h5>
                        <!-- start search -->
                        <div class="row justify-content-center">
                            <div class="col-xs-4">
                                <form class="form-inline">
                                    <input class="form-control mr-sm-3" type="search"
                                        placeholder="Search for restaurants or cuisines" aria-label="Search">
                                    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                        <!-- end search -->

                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/xxx2.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Find the best restaurants, cafés, and bars in your city</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/xxx2.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Find the best restaurants, cafés, and bars in your city</h5>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!--------------------------------------STARTER HEADER STARTS--------------------------------------->
        <!-- container-fluid

         -->

<?php

        $sql = "SELECT * FROM item;";
        $result = mysqli_query($conn, $sql);
        $item = [];
        $i=0;
        
        while($row = mysqli_fetch_assoc($result)) {
            $item[$i] = $row;
            $i++;
        }
        $id = 1;
        foreach ($categories as $val) {
            $c=0;
            
            switch ($val) {
                case 'STARTERS':
                $c=4;
                break;
                case 'SOUPS':
                $c=2;
                break;
                case 'MAIN COURSE':
                $c=5;
                break;
                case 'BREADS AND RICE':
                $c=4;
                break;
            }
            echo '<div class="row p-2 rounded-left" style="background-color:#5CB85C; margin-left:0px; margin-top:10px; width: 20%"><div class="align-middle" style="color:white">'.$val.'</div></div>';

            for ($i=0; $i < $c; $i++) { 
                echo '<div class="row" style="margin-top:10px;">
                <div class="col-4" style="width:auto; height:auto;">
                    <img id="maincourse_img1" class="img-fluid" style="width:auto; height: auto;" src='.$item[$id-1]['i_image'].'>
                </div>
                <div class="col-2">
                    <div class="caption">
                        <h4>'.$item[$id-1]['i_name'].'</h4>
                        <hr style="margin-top:-5px;">
                        <p id="maincourse_desc1">'.$item[$id-1]['i_description'].'</p>
                        <hr style="margin-top:-5px;">
                        <p class="caption-footer">
                            <a class="navbar-brand" href="readmore.php?id='.$item[$id-1]['i_id'].'">
                                <button class="btn btn-outline-info"><i class="fas fa-info-circle"></i> Read More </button>
                            </a>
                            <button class="btn btn-outline-success" onclick="addToCart('.$item[$id-1]['i_id'].')" ><i
                                    class="fas fa-shopping-cart"></i> Add to
                                Cart</button>
                        </p>
                    </div>
                </div>
                <div class="col-4" style="width:auto; height:auto;">
                    <img id="maincourse_img2" class="img-fluid" style="width:auto; height: auto;" src='.$item[$id]['i_image'].'>
                </div>
                <div class="col-2">
                    <div class="caption">
                        <h4 id="maincourse_title2">'.$item[$id]['i_name'].'</h4>
                        <hr style="margin-top:-5px;">
                        <p id="maincourse_desc2">'.$item[$id]['i_description'].'</p>
                        <hr style="margin-top:-5px;">
                        <p class="caption-footer">
                        <a class="navbar-brand" href="readmore.php?id='.$item[$id]['i_id'].'">
                                <button class="btn btn-outline-info"><i class="fas fa-info-circle"></i> Read More </button>
                            </a>
                            <button class="btn btn-outline-success" onclick="addToCart('.$item[$id]['i_id'].')"><i
                                    class="fas fa-shopping-cart"></i> Add to
                                Cart</button>
                        </p>
                    </div>
                </div>
            </div>';
            $id+=2;
            }
        }

?>        
 

        <!-----------------------------------STARTER SELECTION ENDS--------------------------------------->


    </div>  <!-- container ends here -->
    
</body>

<script>

    $('.carousel').carousel({
        interval: 2000
    })
</script>

</html>


<!-- 
    <div class="row" style="margin-top:10px;">
            <div class="col-4" style="width:auto; height:auto;">
                <img id="starter_img1" class="img-fluid" style="width:auto; height: auto;" src="./img/starter.jpg">
            </div>
            <div class="col-2">
                <div class="caption">
                    <h4 id="starter_title1">abc</h4>
                    <hr style="margin-top:-5px;">
                    <p id="starter_desc1">asfhghkdfadaasdasda</p>
                    <hr style="margin-top:-5px;">
                    <p class="caption-footer">
                        <button type="button" class="btn btn-outline-info"><i class="fas fa-info-circle"></i> Read More 1
                        </button>
                        <button class="btn btn-outline-success" style="margin-top:5px"><i
                                class="fas fa-shopping-cart"></i> Add to
                            Cart</button>
                    </p>
                </div>
            </div>
            
            <div class="col-4" style="width:auto; height:auto;">
                <img id="starter_img1" class="img-fluid" style="width:auto; height: auto;" src="./img/starter.jpg">
            </div>
            <div class="col-2">
                <div class="caption">
                    <h4 id="starter_title1">def</h4>
                    <hr style="margin-top:-5px;">
                    <p id="starter_desc1">asfhghkdfadaasdasda</p>
                    <hr style="margin-top:-5px;">
                    <p class="caption-footer">
                        <button type="button" class="btn btn-outline-info"><i class="fas fa-info-circle"></i> Read More 1
                        </button>
                        <button class="btn btn-outline-success" style="margin-top:5px"><i
                                class="fas fa-shopping-cart"></i> Add to
                            Cart</button>
                    </p>
                </div>
            </div>

        </div>
 -->