<?php
session_start();
require('/home/sites/nfcps.org.ng/public_html/uniilorin/functions.php');
if (isset($_REQUEST['login'])){
    $db = dbconnect();
    $user = $_REQUEST['username'];
    $pwd = sha1($_REQUEST['password']);
    
  //CHeck if the user is an exco and is from this school before continuing  
    $query = "SELECT * FROM users WHERE username = '$user'";
    $rslt = $db->query($query)->fetch_assoc();
    if ($rslt['exco'] == "1" && $pwd == $rslt['password'] && $rslt['school'] == "uniilorin"){
       $_SESSION['uniilorin_exco'] = $user;//set specific session based on the school
       header('Location: http://nfcps.org.ng/uniilorin/exco/exco.php'); 
    } else {
        $message = '<div class="alert alert-warning">
                        <strong>Login Failed!</strong> Password or username incorrect. Or you are not yet an executive in this school.
                    </div>';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
         <title>Administator - UNIILORIN BLOG</title>
         <base href="http://www.nfcps.org.ng">
         <link rel="icon" href="/img/uniilorin.jpg">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/design.css">
        <link rel="stylesheet" href="ui/blog_design.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
         
    </head>
            
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                
                <a class="navbar-brand center" href="/"><img height="29px" src="../../img/logo.png"></a>
                </div>
                
                </div>
            </div>
     </nav>
        <div id="header">
            <img alt="NFCPS UNIILORIN BLOG" width="100%" src="ui/b_img/header.png" />
        </div>
        
        <div id="top_row">
            <h1>Admin Area</h1>
        </div>
        
        <div id="body" class="row">
            <div id="content" class="jumbotron col-sm-7">
                <form role="form" class="" method="post" action="">
                        <legend>Login</legend>
<?php 
if(isset($message)) echo $message;
?>
                        <div class="form-group">
                            <label>username</label>
                            <input class="form-control" type="text" name="username" />
                        </div>
                        <div class="form-group">
                            <label>password</label>
                            <input class="form-control" type="password" name="password" />
                        </div>
                        <div>
                            <button name="login" class="btn-default">Login</button>
                        </div>
                </form>
            </div>
        </div>
        <footer>
            NFCPS UNIILORIN
        </footer>
    </body>
</html>