<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "";
}

if (!isset($_SESSION['cart_Items'])) {
    $_SESSION['cart_Items'] = array();
}
$size = count($_SESSION['cart_Items']);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Contact - Symphony</title>

        
        <link type="text/css" rel="stylesheet" href="static/css/bootstrap.min.css"/>

        
        <link type="text/css" rel="stylesheet" href="static/css/MainStyles.css"/>
    </head>

    <body>
          <?php
        $bt = '';
        if (empty($_SESSION['username'])) {
            $bt = "<a href='SignUpForm.php' class='btn btn-danger'/>Sign Up</a> "
                    . "<a href='SignInForm.php' class='btn btn-warning'/>Sign In</a> ";
        } else {
            $bt = "<div Style='color:white;'>" . $_SESSION['username'] . "&nbsp;&nbsp;<a href='signout.php' class='btn btn-info'/>Sign Out</a>&nbsp;&nbsp;         <a href='shoppingCart.php'><span class='glyphicon glyphicon-shopping-cart'></span>Cart&nbsp;<span class='badge'>" . $size . "</span></a>
</div>
             ";
        }
        ?>
        <?php
        include_once('./forumController.php');



        $field = '';
        if (empty($_SESSION['username'])) {
            $field = '   <div class="form-group col-lg-4">
                                    <label>First Name</label>
                                    <input type="text" name="fName" class="form-control">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Last Name</label>
                                    <input type="text" name="lName"  class="form-control">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Email Address</label>
                                    <input type="email" name="email" class="form-control">
                                </div>';
        } else {
            $field = '';
        }



        $forum = getLatestComments();
        $view = '<div class="row">';
        foreach ($forum as $row) {
            $name = $row["fName"] . '' . $row["lName"];
            $title = $row["title"];
            $msg = $row["comment"];
            $date = $row["date"];
            $rating = $row["rating"];
            $rate = "";
            for ($i = 0; $i < $rating; $i++) {
                $rate.="&#9733;";
            }
            for ($i = 0; $i < 5 - $rating; $i++) {
                $rate.="&#9734;	";
            }
            $view.='<br><div class="form-group col-lg-12"><label>' . $name . '</label></div>'
                    . '<div class="form-group col-lg-12"> ' . $rate . '&nbsp;&nbsp;<small>' . $date . '</small></div>'
                    . '<div class="form-group col-lg-12"><label>' . $title . '</label></div>'
                    . '<div class="form-group col-lg-12">' . $msg . '<hr></div><hr>';

        }
        $view.='</div>';
        ?>
            <div style="float:right; padding: 5px; width: 40%;">
            <div class="container col-lg-6">
                <div class="row">		
                    <form id="search"  role = "form"  
                          action = "home.php" method = "get">           
                        <div id="custom-search-input">                        
                            <div class="input-group col-md-12">
                                <input type="text" class="search-query form-control" placeholder="Search"  name="search"/>
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="submit">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <?php
                echo $bt;
                ?>
            </div>
        </div>
        <br>
        <br>
        <div class="brand">SYMPHONY</div>
        <div class="address-bar">Get Your Favorite Music Album Now</div>

        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
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
               
            </div>
            
        </nav>

        <div class="container">

            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                        <hr>
                        <h2 class="intro-text text-center">Contact <strong>SYMPHONY</strong>
                        </h2>
                        <hr>
                    </div>
                    <div class="col-md-8">
                        
                        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
                        <div style='overflow:hidden;height:440px;width:700px;'>
                            <div id='gmap_canvas' style='height:440px;width:700px;'>
                            </div>
                            <style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div>
                        <script type='text/javascript'>function init_map() {
                                var myOptions = {zoom: 10, center: new google.maps.LatLng(6.865661299999999, 79.86145390000001), mapTypeId: google.maps.MapTypeId.ROADMAP};
                                map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                                marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(6.865661299999999, 79.86145390000001)});
                                infowindow = new google.maps.InfoWindow({content: '<strong>SYMPHONY</strong><br>57, ramakrishna road, colombo 06, srilanka <br>'});
                                google.maps.event.addListener(marker, 'click', function () {
                                    infowindow.open(map, marker);
                                });
                                infowindow.open(map, marker);
                            }
                            google.maps.event.addDomListener(window, 'load', init_map);
                        </script>

                    </div>

                    <div class="col-md-4">
                        <p>Phone: <strong>0775075588</strong>
                        </p>
                        <p>Email: <strong>feedback@symphony.com</strong>
                        </p>
                        <p>Address: <strong>#57,<br>Ramakrishna Road,<br>Colombo 06.<br>00600</strong>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-8">

                <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
                <div style='overflow:hidden;height:440px;width:700px;'>
                    <div id='gmap_canvas' style='height:440px;width:700px;'>
                    </div>
                    <style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div>
                <script type='text/javascript'>function init_map() {
                        var myOptions = {zoom: 10, center: new google.maps.LatLng(6.865661299999999, 79.86145390000001), mapTypeId: google.maps.MapTypeId.ROADMAP};
                        map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                        marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(6.865661299999999, 79.86145390000001)});
                        infowindow = new google.maps.InfoWindow({content: '<strong>SYMPHONY</strong><br>57, ramakrishna road, colombo 06, srilanka <br>'});
                        google.maps.event.addListener(marker, 'click', function () {
                            infowindow.open(map, marker);
                        });
                        infowindow.open(map, marker);
                    }
                    google.maps.event.addDomListener(window, 'load', init_map);
                </script>

            </div>

            <div class="col-md-4">
                <p>Phone: <strong>0775075588</strong>
                </p>
                <p>Email: <strong>feedback@symphony.com</strong>
                </p>
                <p>Address: <strong>#57,<br>Ramakrishna Road,<br>Colombo 06.<br>00600</strong>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
          </div>
            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                        <hr>
                        <h2 class="intro-text text-center">Contact <strong>form</strong>
                        </h2>
                        <hr>
                        <p>Send us your feedback and give us your thought on this site and let us know as to what we need to improve. </p>
                        <form role="form" action="addComment.php" method="get">
                            <div class="row">
                                <?php echo $field; ?>
                                <div class="form-group col-lg-4">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-lg-12">

                                    <label>Message</label>
                                    <textarea class="form-control" name="msg" rows="6"></textarea>
                                    <small>Please let us know as to what your suggesions or demands are in the above given box</small>
                                </div>
                                <div class="rate">
                                    Rate us <br>                                 
                                    <input type="radio" id="star5" name="rate" value="5" /><label for="star5" >5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" /><label for="star4" >4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" /><label for="star3" >3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" /><label for="star2" >2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" /><label for="star1" >1 star</label>
                                    
                                </div>
                                
                                <div class="form-group col-lg-12">
                                    <br>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <h4><u><b>Review Highlights</b></u></h4>
                        <?php echo $view; ?>
                    </div>
                </div>
            </div>

        </div>
        

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p>Copyright &copy; 2016 <a href="index.html"> www.symphony.com </a> All rights reserved | Website Design by <a href="#"> DESIGN </a> Company.</p>
                    </div>
                </div>
            </div>
        </footer>

        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.js"></script>

    </body>

</html>
