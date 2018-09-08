<?php
require('/home/sites/nfcps.org.ng/public_html/unn/functions.php');
$db = dbconnect();
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

 
        </div>
    <div  class="container-fluid" style="margin-top: 50px;">
        <div  class="row">
            <div class="col-sm-8">
                
               <!-- Start Site Status -->
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>School</th>
                    <th>Level</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody>
        <?php 
            $query = "SELECT * FROM convention ORDER BY school ASC";
            $result = $db->query($query);
            $totalReg = 0;
            while ($row = $result->fetch_assoc()){
                $totalReg += 1; //increment the value of this variable as each user is processed
            ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['school']; ?></td>
                    <td><?php echo $row['level']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                </tr>
            <?php 
            }
        ?>

        <h1>Total Registered: <?php print $totalReg; ?></h1>
<a href="/convention" class="btn btn-info" role="button">Go back</a>
        </tbody>
        </table>
    <!-- End Site Status -->  
                
                
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