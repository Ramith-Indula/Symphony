<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "";
}

if (!isset($_SESSION['cart_Items'])) {
    $_SESSION['cart_Items'] = array();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="static/css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="static/css/style.css"/>
        <link type="text/css" rel="stylesheet" href="static/css/MainStyles.css"/>

        <title>My Orders</title>
    </head>
    <body>
        <?php
        include_once('./orderController.php');
        include_once ('./albumController.php');
        $msg = '';
        $orders = getOrderByUser($_SESSION['username']);
        foreach ($orders as $order) {

            $orderID = $order["id"];
            $date = $order["date"];

            $albums = getOrderDetails($orderID);
            $total = 0;
            $msg .= '<hr>
                      
                        <table align="center" width="90%" cellpadding="20">
                        <tr><td>Order Id : ' . $orderID . '<br>
                            Date :' . $date . '<br></td>
                            </tr>
                        <tr>
                        <th  width="20%" height="40" ><p  class=" text-center intro-text">Album ID</p></th>
                        <th  width="50%" height="40" ><p  class=" text-center intro-text">Album</p></th>
                        <th  width="30%" height="40"  ><p  class=" text-center intro-text">Price</p></th>
                        </tr>';


            foreach ($albums as $value) {
                $albumID = $value['Album_albumID'];
                $album = getAlbumDetails($albumID);
                $name = $album["name"];
                $price = $value['price'];
                $url = $album["url"];
                $artist = $album["artistName"];
                $total += $price;
                $msg.='<tr>'
                        . '<td   width="10%" height="40" align="center">' . $albumID . '</td>'
                        . '<td width="50%" height="40" align="center"><p style="font-size:15px;"><img class="img-responsive" src=' . $url . ' alt="" align="left" width="50" height="100"><strong>' . $name . '</strong><br>'
                        . $artist . '</p></td>'
                        . '<td width="30%" height="40" align="center">' . $price . '</td>'
                        . '</tr>';
            }
            $msg.='<tr><td width="10%" height="40"></td>'
                    . '<td width="50%" height="40" align="right"><br><br><p><strong>Total:</strong></p></td>'
                    . '<td width="10%" height="40" align="center"><hr><p><strong >US $' . $total . '</strong></p></td>'
                    . '</table><hr>';
        }
        ?>
        <div class="brand">SYMPHONY</div>
        <div class="address-bar">Get Your Favorite Music Album Now</div>

        <nav class="navbar navbar-default">
            <div class="container">          

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div> <!--class="collapse navbar-collapse navbar-ex1-collapse ">-->
                    <ul class="nav navbar-nav navbar-color ">
                        <li><a href="home.php">Home</a>
                        </li>
                        <li><a href="categoryView.php">Categories</a>
                        </li>
                        <li><a href="about.html">About</a>
                        </li>
                        <li><a href="quiz.html">Quiz</a>
                        </li>
                        <li><a href="contact.php">Contact</a>
                        </li>
                        <li><a href="vote.html">Vote</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <div class="row">
            <div class="box" >
                <?php echo $msg; ?>
            </div>
        </div>
        <!-- /.container -->
        <footer style="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p>Copyright &copy; 2016 <a href="index.html"> www.symphony.com </a> All rights reserved | Website Design by <a href="#"> DESIGN </a> Company.</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
    <script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="static/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="static/js/SignInScripts.js"></script>
</html>

