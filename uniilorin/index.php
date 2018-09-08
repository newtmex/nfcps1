<?php 
require('functions.php');
if (isset($_REQUEST['article'])){
    $postNum = $_REQUEST['article'];
} else {
    $postNum = postCount()['count(id)'];   
}

#prepare the post navigation links
$prev = $postNum + 1;
$prev = "http://nfcps.org.ng/uniilorin/index.php?article=$prev";
if ($postNum == postCount()['count(id)']) {$prev_display = "display:none;";}
$next = $postNum - 1;
$next = "http://nfcps.org.ng/uniilorin/index.php?article=$next";
if ($postNum == 1) {$next_display = "display:none;";}
$home = postCount()['count(id)'];
$home = "http://nfcps.org.ng/uniilorin/index.php?article=$home";

#get the content to be displayed
$errorFalse_display = "";
if ($postNum > postCount()['count(id)'] || $postNum < 1){
        $errorFalse_display = "display:none;";//for elements that should not be displayed when there is an error
        $prev_display = "display:none;";
        $next_display = "display:none;";
        
    } else {//for elements that should not be displayed when there is no error
        $content = displayPost($postNum);// get the last post entry -- refer to the postCount() function
    } 

?>
<!DOCTYPE html>
<html>
    <head>
         <title>NFCPS UNIILORIN BLOG</title>
         <base href="http://www.nfcps.org.ng">
         <link rel="icon" href="/img/uniilorin.jpg">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/design.css">
        <link rel="stylesheet" href="uniilorin/blog_design.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
         
    </head>
            <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand center" href="http://www.nfcps.org.ng"><img height="29px" src="../img/logo.png"></a>
                </div>
             </nav>
        <div id="header">
            <img alt="NFCPS UNIILORIN BLOG" width="100%" src="ui/b_img/header.png" />
        </div>
        
        <div id="top_row">
            <!--Top ads area-->
        </div>
        
        <div id="body" class="row">
        <!-- Start left side bar-->
            <div class="sidebar col-sm-3">
                <div class="well">
                    <h5>Executive of this School? <a href="http://nfcps.org.ng/uniilorin/exco">Click here to post an article</a></h5>
                </div>
                
                <div class="well">
                    <h4>Recent Posts</h4>
                    <?php
                        $query = "select * from posts ORDER BY posts.id DESC";
                        $recent_posts = local_dbconnect()->query($query);
                        $totalPosts = postCount()['count(id)'];
                        $count = 0;
                        while ($count < 10 && $row = $recent_posts->fetch_assoc()) {
                            $recent = $row['heading'];
                            echo "<a href=\"http://nfcps.org.ng/uniilorin/index.php?article=$totalPosts\">$recent</a><br />";
                            $totalPosts -= 1;
                            $count++;
                        }
                        
                    ?>
                </div>
            </div>
   <!-- End left side bar-->
            
    <!-- Start Content-->
            <div id="content" class="jumbotron col-sm-6">
                <h1 id="post"><?php echo $content['heading']; ?></h1>
                <div><?php //echo $content['image']; ?></div><!-- Work on this line, it is spitting out gibberish instead of the image-->
                <p><?php echo $content['content']; ?></p>
                
                    <span>By <?php echo $content['author']; ?></span>
                    <span>On <?php echo $content['date']; ?></span>
                
                <div style="clear:both;">
                    <ul class="pager">
                        <li style="<?php echo $prev_display?>"><a href="<?php echo $prev;?>">Previous Article</a></li>
                        <li style="<?php echo $notFound_display?>"><a href="<?php echo $home;?>">Home</a></li>
                        <li style="<?php echo $next_display?>"><a href="<?php echo $next;?>">Next Article</a></li>
                    </ul>
                </div>
             </div>
   <!-- End Content-->
            
   <!-- Start Right side bar-->
            <div class="sidebar col-sm-3">
                
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
            </div>
        </div>
   <!-- End Right side bar-->
   
    <body>
        <?php footer();?>
    </body>
</html>