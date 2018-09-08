<?php
if(isset($_POST['continue'])){
    $pass = 'nfcpsunn2016';
    $p = $_REQUEST['code'];
    if($p == $pass) {
        //set cookie to last for 2 hours
        setcookie('exco_approved_convention', 'ok', time()+60*60*2);
        header('location: /convention');
    }else{
      $error = "<div class=\"alert alert-danger\">      
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                    <strong>Error!</strong> You don't have access to this area.
                </div>";
   }
}//dis conditional controls d Pass Code form.
require('/home/sites/nfcps.org.ng/public_html/unn/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Convention Registration</title>
  <base href="http://www.nfcps.org.ng">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/logo.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/design.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                
                <a class="navbar-brand center" href="/"><img height="29px" src="img/logo.png"></a>
                </div>
                
            </div>
    </nav>
<?php
if(!isset($_COOKIE['exco_approved_convention'])){//cookie not set
    ?>
    <div style="font-size: 15px; margin: 10%; padding: 3%; box-shadow: 2px 2px 2px 2px rgba(0,0,0,0.3); text-align: center;">
                <form role="form" style="margin: 10%;" method="post" action="" enctype="multipart/form-data" >
                 <?php if(isset($error)) echo $error;?>
                    <div class="form-group">
                            <label style="font-size: 30px;">Pass Code</label>
                            <input class="form-control" style="text-align: center;" type="password" name="code" required />
                        </div>
                    <div class="form-group">
                            <button class="btn-primary" name="continue">Continue</button>
                        </div>
                </form>
            </div>
<?php
    exit;
}
?>
 
        </div>
    <div  class="container-fluid" style="margin-top: 50px;">
        <div  class="row">
            <div class="col-sm-8">
                <div class="row">

                    <form role="form" class="jumbotron" method="post" action="" enctype="multipart/form-data" >
<a href="http://www.nfcps.org.ng/registered.php"><div class="alert alert-info">
  <strong>Click here to see registered delegates</strong>
</div></a>
                        <legend>NFCPS Registration Form</legend>
<?php 
if(isset($_REQUEST['register'])){
    $db = dbconnect();
  #Get credentials
    $name = $_REQUEST['f_name']." ".$_REQUEST['s_name'];
    $school = $_REQUEST['school'];
    //$username = $_REQUEST['username'];
    //$password = sha1($_REQUEST['password']);
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];
    $gender = $_REQUEST['gender'];
    $level = $_REQUEST['level'];
  #Image preparation
    $target_dir = "avatar/";
    $target_file = $target_dir . basename($_FILES["passport"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["passport"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["passport"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG & JPEG files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your passport was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["passport"]["tmp_name"], $target_file)) {
          #Store creds
            $query = "INSERT INTO convention (name, school, phone, email, avatar, gender, level) VALUES ('$name', '$school', '$phone', '$email', '$target_file', '$gender', '$level')";
            $db->query($query);
            echo "<div class=\"alert alert-success\">      
                    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                    <strong>Success!</strong> Your account have been created.
                </div>";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
  
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
                            <label>Gender</label>
                            <select class="form-control" name="gender" required>
                                <option></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
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
                                <option value="ndu">Niger Delta University</option>
                            </select>
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Level</label>
                            <input class="form-control" type="text" name="level" required/>
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
                            <label>Select passport to upload (not more than 500kb)</label>
                            <input type="file" name="passport" id="passport">
                        </div>
                        <div class="form-group">
                            <button class="btn-primary" name="register">Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="sidebar col-sm-4">
                
                <div class="well">
                    <img src="img/emzor.gif" >
                </div>
                <div class="well">
                    <h3>News</h3>
                    <div class="well">
                        <h4>National Convention</h4>
                        <p>25th to 29th of May, 2016 all christian pharmacy students will be converging at University of Nigeria, Nsukka for the annual National Convention of NFCPS.
                            This will be the 25th of it's kind. It will run with the theme "Rooted Firmly in Christ", Colossians 2:7.</p>
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
    </footer>
</body>
</html>