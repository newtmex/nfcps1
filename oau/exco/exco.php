<?php
session_start();
if(isset($_REQUEST['logout'])) unset($_SESSION['oau_exco']);//logout code
if(!isset($_SESSION['oau_exco'])) header('location: /oau/exco/');
$user = $_SESSION['oau_oau'];
require('/home/sites/nfcps.org.ng/public_html/oau/functions.php');
if (isset($_REQUEST['post'])){
    $db = local_dbconnect();
   #collect post's data
    $heading = $_REQUEST['heading'];
    $content = $_REQUEST['content'];
    $date = date('M jS, Y. g:i:s A');
   #store post's data 
    $query = "INSERT INTO `posts` (`heading`, `content`, `date`, `author`) VALUES ('".$heading."', '".$content."', '".date('M jS, Y. g:i:s A')."', '$user')";
    $db->query($query);
    $message = '<div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Your post have been created.
                </div>';
}
?>

<!DOCTYPE html>
<html>
    <head>
         <title>Administator - OAU BLOG</title>
                    <base href="http://www.nfcps.org.ng">
         <link rel="icon" href="/img/oau.jpg">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/design.css">
        <link rel="stylesheet" href="oau/blog_design.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
         
    </head>
            
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand center" href="/"><img height="29px" src="../../img/logo.png"></a>
                </div>
                
                </div>
            </div>
     </nav>
        <div id="header">
            <img alt="NFCPS OAU BLOG" width="100%" src="oau/b_img/header.png" />
        </div>
        
        <div id="top_row">
            <h1>Admin Area</h1>
        </div>
        <div id="body" class="row">
            <div class="col-sm-3">
                <form method="post" class="well" action="">
                    <legend>Hi <?php echo $user;?></legend>
                    <button name="logout" class="btn-warning">logout</button>
                </form>
                <div class="well">
                    <h5><a href="http://nfcps.org.ng/oau" target="_blank">Back to blog</a></h5>
                </div>
            </div>
            <div id="content" class="jumbotron col-sm-8">
                <form role="form" class="" method="post" action="" >
                    <legend>Create new post</legend>
<?php
if(isset($message)) echo $message;
?>
                    <div class="form-group">
                        <label>Heading</label>
                        <input type="text" class="form-control" name="heading">
                    </div>
			         <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" rows="50" name="content"></textarea>
                    </div>
			  <div>
				<button name="post" class="">Post</button>
			  </div>
		</form> 
            </div>
        </div>
        <footer style="text-align: center">
            NFCPS OAU
        </footer>
    </body>
</html>
