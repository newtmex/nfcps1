<?php
@$make_req = $_REQUEST['make_req'];//Get the specific data to process
@$db = $_REQUEST['blog'];//Get the name of the blog making the request
@$post_id = $_REQUEST['post_id'];


# This class was defined here so that there will be no conflict when setting the name of the blog
class blog {
    public $blogName;
    function __construct(){
        # Establish blog name
        $path = explode('\\', getcwd());//get the path to the current blog and split into entries in array $path
        $this->blogName = $path[count($path) - 1];//set blog name as the last value of the $path array
    }
}

@$blog_db = new mysqli('localhost','root','',$db);//Instantiate the requests to the blogs database





# Start processing requests
if(isset($make_req)){
# Get the id of the last post
    if($make_req == 'latestPostId'){
        print $blog_db->query("SELECT max(id) FROM posts")->fetch_assoc()['max(id)'];//Send the id of the latest entry to the post table
        $blog_db->close();
    }
# Get the IDs of all the articles available in a blog
    if ( $make_req == "all_articles"){
            $article_ids = "";
            $rslt = $blog_db->query("SELECT id FROM posts");
            while ($article = $rslt->fetch_assoc()['id']){
                $article_ids .= $article. "+";
            }
            echo $article_ids;
    }

#Get the latest five articles' heading and display function i.e the more(articleId) function for JS
    if($make_req == 'recent_article'){
        $query = "SELECT * FROM posts ORDER BY id DESC";
        $rslt = $blog_db->query($query);
        $count = 0;
        while ($count < 5 && $row = $rslt->fetch_assoc()){
            $count++;
            echo '<li><a onclick="more(' . $row["id"] .')">'. $row['heading'] .'</a></li>';
        
        }
    }

# Start of Conditionals to choose what to display in the #main_column area
    if ( $make_req == 'home' ) {// Display first 5 articles
        $query = "SELECT * FROM posts ORDER BY id DESC";
        $rslt = $blog_db->query($query);
        $count = 0;
        while ($count < 5 && $content = $rslt->fetch_assoc()){
            $count++;

?>
        <div class="content">
            <h1 class="content_title"><?php echo $content['heading']; ?></h1>
            
            <article><?php echo $content['content'];//[REM]: Write the code that will limit the amount of content that will display at this instant ?></article>
            
            <div style="clear:both;">
                <a onclick="more('<?php echo $content['id']; ?>')">More...</a>
            </div>
        </div>
<?php
        }
    }

    if( $make_req == 'full_article'){//displays the complete details of the article

        $nextArticle = $blog_db->query("SELECT max(id) FROM posts WHERE posts.id < $post_id")->fetch_assoc()['max(id)'];//next article rel to this
        $prevArticle = $blog_db->query("SELECT min(id) FROM posts WHERE posts.id > $post_id")->fetch_assoc()['min(id)'];//previous article rel to this
        //var_dump($nextArticle);exit;
        $query = "SELECT * FROM posts WHERE posts.id = $post_id";
        $rslt = $blog_db->query($query);
        $content = $rslt->fetch_assoc();
?>
    <div class="content">
                <h1 class="content_title"><?php echo $content['heading']; ?></h1>
                <div><?php //echo $content['image']; ?></div><!-- Work on this line, it is spitting out gibberish instead of the image-->
                <p><?php echo $content['content']; ?></p>
                
                    <span>By <?php echo $content['author']; ?></span>
                    <span>On <?php echo $content['date']; ?></span>

                    <ul class="pager">
                        <li><button style="<?php if ($prevArticle == NULL) echo "display:none;"; ?>" onclick="more('<?php echo $prevArticle; ?>')"><</button></li>
                        <li><button onclick="article('home')">Home</button></li>
                        <li><button style="<?php if ($nextArticle == NULL) echo "display:none;"; ?>" onclick="more('<?php echo $nextArticle; ?>')">></button></li>
                    </ul>
             </div>
<?php
    }

# End of Conditionals to choose what to display in the #main_column area
}


?>