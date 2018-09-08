<?php 
function dbconnect() {
    $host = 'localhost';
    $dbuser = 'cl53-nfcps';
    $db = 'cl53-nfcps';
    $pwd = 'ecYBzVw-q';
    return new mysqli($host, $dbuser, $pwd, $db);
}
function local_dbconnect() {
    $host = 'localhost';
    $dbuser = 'cl53-uniilo';
    $db = 'cl53-uniilo';
    $pwd = 'c4Eb/!rKx';
    return new mysqli($host, $dbuser, $pwd, $db);
}
function footer(){
    echo '<footer class="container-flunibend text-center">
        <div class="row">
            
            <div id="reach-us" class="col-sm-3">
                <h6 style="color:#000;font-size: 16px; font-weight:bold;">REACH US</h6>
                <span class="glyphicon glyphicon-earphone"></span> +234 703 869 1920 <br/>
                <span class="glyphicon glyphicon-envelope"></span> mail@nfcps.org.ng <br/>
                <span class="glyphicon glyphicon-map-marker"></span> NFCPS Secretariat, Faculty of Pharmaceutical Sciences, University of Nigeria Nsukka
                <br/><br/>
                <a href="https://www.facebook.com/nfcpsnigeria" style="color:white;font-size:14px;"><img src="../img/fb-icon.png"/>https://www.facebook.com/nfcpsnigeria</a> 
            </div>
            
            <div class="col-sm-9">
                <p style="color:black">NFCPS UNN 2015</p>
                <div class="visitor-count">
                    <p>Visitors Count:</p>
                    <img alt="Hit counter" src="../counter.php" />
                </div>
            </div>';
}
function postCount(){//function to get the total number of posts
    $query = "select count(id) from posts";
    return @local_dbconnect()->query($query)->fetch_assoc();    
}
function displayPost($num){//function to get a specific post entry by its id
        $query = "select * from posts where posts.id = $num";
        return @local_dbconnect()->query($query)->fetch_assoc();
}

function getReplies(){
    
}
?>