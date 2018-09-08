var latestPostId = 1;
getRecentArticles();

setInterval(function(){
    $(function(){
        $.post("../script/functions.php",
            {
                blog: blogName,
                make_req: 'latestPostId'
            },
            function(inCominglatestPostId){
                if(inCominglatestPostId !== latestPostId){
                    $("#recent_articles ul *").remove();
                    getRecentArticles();
                    latestPostId = inCominglatestPostId;
                }
            }
        );
    });
},20);


function article(rel){
    
   $(function(){
            $.post("../script/functions.php",
                {
                    blog: blogName,
                    make_req: rel//var rel will either be home, prev or next based on what the user will click. php will then handle the request accordingly
                },
                function(data){
                    $('#main_column').html(data);
                    window.history.replaceState('','', 'index.php');
                }
            
            );
    });
}





function getRecentArticles(){
    $.post("../script/functions.php",
        {
            blog: blogName,
            make_req: "recent_article"
        },
        function(data){
            $('#recent_articles ul').append(data);
        }
    );
}
function more(articleId){// function to show every detail of the artice whose id = articleId
    
    $.post("../script/functions.php",
        {
            blog: blogName,
            make_req: "full_article",
            post_id: articleId,
        },
        function(data){
            $('#main_column').html(data);
            window.history.replaceState('','Title', 'index.php?article='+articleId);
            
        }
    );
    
}   


if (displayAll == false){
    more(articleId);
}else{
    article('home');// show latest five articles
}