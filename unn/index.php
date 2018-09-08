<?php 
$path = explode('\\', getcwd());//get the path to the current blog and split into entries in array $path
$blogName = $path[count($path) - 1];//set blog name as the last value of the $path array
$db = $blogName;

require($_SERVER['DOCUMENT_ROOT'].'/nfcps1/script/functions.php');




?>
<!DOCTYPE html>
<html>
<head>
    <title>NFCPS <?php echo strtoupper($blogName); ?> Blog</title>
    <link rel="stylesheet" href="../css/blog_design.css" />
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script>
        var displayAll = true;
        var blogName = '<?php echo $blogName; ?>';//Set the blog name for javascript to use

    </script>
    <?php
 if(isset($_GET['article'])){
     echo " <script>var displayAll = false;var articleId = ". $_GET['article'].";</script>";
 }

?>
    <script type="text/javascript" src="../js/script.js"></script>
</head>
<body>
    <div id="header">
        <h1>Welcome to NFCPS <?php echo strtoupper($blogName); ?> Blog</h1>
    </div>
    <div id="body">
        <div id="left_column">
            <div id="recent_articles">
                <h3>Recent Articles</h3>
                <ul>

                </ul>
            </div>
            <div id="artid">
              
            </div>
        </div>
        <div id="main_column">
        
        </div>
        <div id="right_column">

        </div>
    </div>
    <div id="footer">
    
    </div>

</body>
</html>
