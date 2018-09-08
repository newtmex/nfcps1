<?php
require('/home/sites/nfcps.org.ng/public_html/unn/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>NFCPS - Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/logo.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/design.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                
                <a class="navbar-brand center" href="/nfcps"><img height="29px" src="img/logo.png"></a>
                </div>
                
            </div>
    </nav>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
<!-- Make sure that the images added here are of the same size -->
               
                <div class="item active">
                <img src="img/big_god.jpg" alt="NFCPS">
                </div>
                
                <div class="item">
                <img src="img/bold_faith.jpg" alt="NFCPS">
                </div>
                
                <div class="item">
                <img src="img/grace.jpg" alt="NFCPS">
                </div>
                
                <div class="item">
                <img src="img/colossians.jpg" alt="NFCPS">
                </div>
                
                <div class="item">
                <img src="img/jesus.jpg" alt="NFCPS">
                </div>
                
                <div class="item">
                <img src="img/rooted.jpg" alt="NFCPS">
                </div>
                
                <div class="item">
                <img src="img/success_journey.jpg" alt="NFCPS">
                </div>
                
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <div class="header-anchor">
            <p>Welcome to the official website of the National Fellowship of Christian Pharmacy Students</p>
        </div>
    
        </div>
    <div  class="container-fluid">
        <div  class="row">
            <div class="col-sm-8">
                <div class="row">
                    <form role="form" class="jumbotron" method="post" action="" enctype="multipart/form-data" >
                        <legend>NFCPS Registration Form</legend>
<?php 
if(isset($_REQUEST['register'])){
    $db = dbconnect();
  #Get credentials
    $name = $_REQUEST['f_name']." ".$_REQUEST['s_name'];
    $school = $_REQUEST['school'];
    $username = $_REQUEST['username'];
    $password = sha1($_REQUEST['password']);
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];
  #Store creds
    $query = "INSERT INTO users (name, school, username, password, phone, email) VALUES ('$name', '$school', '$username', '$password', '$phone', '$email')";
    $db->query($query);
    echo "<div class=\"alert alert-success\">      
            <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
            <strong>Success!</strong> Your account have been created.
        </div>";
}
?>                        
                        <div class="form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" name="f_name" required />
                        </div>
                        <div class="form-group">
                            <label>Sur Name</label>
                            <input class="form-control" type="text" name="s_name" required/>
                        </div>
                        <div class="form-group">
                            <label>School</label>
                            <select class="form-control" name="school" required>
                                <option> </option>
                                <option value="unn">University of Nigeria, Nsukka</option>
                                <option value="abu">Ahmadu Bello University, Zaria</option>
                                <option value="delsu">Delta State University, Abraka</option>
                                <option value="igbinedion">Igbinedion University</option>
                                <option value="madona">Madona University</option>
                                <option value="oau">OAU Ile-Ife</option>
                                <option value="oou">OOU</option>
                                <option value="udus">Usman Danfodio University, Sokoto</option>
                                <option value="unigombe">University of Gombe</option>
                                <option value="ui">University of Ibadan</option>
                                <option value="uniben">University of Bennin</option>
                                <option value="uniilorin">University of Ilorin</option>
                                <option value="unijos">University of Jos</option>
                                <option value="unilag">University of Lagos</option>
                                <option value="unimaid">University of Maiduguri</option>
                                <option value="uniport">University of Portharcourt</option>
                                <option value="uniuyo">University of Uyo</option>
                                <option value="unizik">Nnamdi Azikiwe University</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>username</label>
                            <input class="form-control" type="text" name="username" required/>
                        </div>
                        <div class="form-group">
                            <label>password</label>
                            <input class="form-control" type="password" name="password" required/>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input class="form-control" type="text" name="phone" maxlength="11" required/>
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="email" name="email" required/>
                        </div>
                        <div class="form-group">
                            <button class="btn-primary" name="register">Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="sidebar col-sm-4">
                <div class="well">
                    <h3>News</h3>
                    <div class="well">
                        <h4>National Convention</h4>
                        <p>25th to 29th of May, 2016 all christian pharmacy students will be converging at University of Nigeria, Nsukka for the annual National Convention of NFCPS.
                            This will be the 25th of it's kind. It will run with the theme "Rooted Firmly in Christ", Colossians 2:7.</p>
                    </div>
                    <div class="fb-page" data-href="https://www.facebook.com/nfcpsnigeria" data-tabs="timeline" data-width="400" data-height="700" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true">
                        <div class="fb-xfbml-parse-ignore">
                            <blockquote cite="https://www.facebook.com/nfcpsnigeria">
                                <a href="https://www.facebook.com/nfcpsnigeria">
                                    Our Facebook Feeds
                                </a>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="well">
                    <h3>Visit Our Blogs</h3>
                    <div class="list-group">
                        <a href="#" class="list-group-item">University of Nigeria, Nsukka</a>
                        <a href="#" class="list-group-item">Ahmadu Bello University, Zaria</a>
                        <a href="#" class="list-group-item">Delta State University, Abraka</a>
                        <a href="#" class="list-group-item">Igbeniedion University</a>
                        <a href="#" class="list-group-item">Madona University</a>
                        <a href="#" class="list-group-item">OAU Ile-Ife</a>
                        <a href="#" class="list-group-item">OOU</a>
                        <a href="#" class="list-group-item">Usman Danfodio University, Sokoto</a>
                        <a href="#" class="list-group-item">University of Gombe</a>
                        <a href="#" class="list-group-item">University of Ibadan</a>
                        <a href="#" class="list-group-item">University of Bennin</a>
                        <a href="#" class="list-group-item">University of Ilorin</a>
                        <a href="#" class="list-group-item">University of Jos</a>
                        <a href="#" class="list-group-item">University of Lagos</a>
                        <a href="#" class="list-group-item">University of Maiduguri</a>
                        <a href="#" class="list-group-item">University of Portharcourt</a>
                        <a href="#" class="list-group-item">University of Uyo</a>
                        <a href="#" class="list-group-item">Nnamdi Azikiwe University</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid text-center">
        <div class="row">
            
            <div id="reach-us" class="col-sm-3">
                <h6 style="color:#000;font-size: 16px; font-weight:bold;">REACH US</h6>
                <span class="glyphicon glyphicon-earphone"></span> +234 703 869 1920 <br/>
                <span class="glyphicon glyphicon-envelope"></span> mail@nfcps.org.ng <br/>
                <span class="glyphicon glyphicon-map-marker"></span> NFCPS Secretariat, Faculty of Pharmaceutical Sciences, University of Nigeria Nsukka
                <br/><br/>
                <a href="https://www.facebook.com/nfcpsnigeria" style="color:white;font-size:14px;"><img src="img/fb-icon.png"/>https://www.facebook.com/nfcpsnigeria</a> 
            </div>
            
            <div class="col-sm-9">
                <p style="color:black">NFCPS 2015</p>
                <div class="visitor-count">
                    <p>Visitors Count:</p>
                    <img alt="Hit counter" src="counter.php" />
                </div>
            </div>
        </div>
<?php 
echo "hi"; ?>
    </footer>
</body>
</html>