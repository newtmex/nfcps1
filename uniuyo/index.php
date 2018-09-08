<?php 
require($_SERVER['DOCUMENT_ROOT'].'/nfcps1/script/functions.php');

$blog = new blog();
$blogName = $blog->blogName;//Set the blog name for php to use

?>
<!DOCTYPE html>
<html>
<head>
    <title>NFCPS <?php echo strtoupper($blogName); ?> Blog</title>
    <link rel="stylesheet" href="../css/blog_design.css" />
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script>
        var blogName = '<?php echo $blogName; ?>';//Set the blog name for javascript to use
    </script>
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