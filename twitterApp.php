<?php

require_once('TwitterAPIExchange.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
'oauth_access_token' => "47986850-TtahnM7TmCrxZZYoyVpGWRmdF8UM03JDGFTsAAIFk",
'oauth_access_token_secret' => "Li5g5cfzRMmuA2kUeLUF0TvkE18P5t6pbaFvzXbpcQqFr",
'consumer_key' => "OqacVsjU28z0CT8I1m5jnqjQI",
'consumer_secret' => "kbWYEMBXGBKGHeT2FAh01L8yguA9b2aDqxwYbphpRELx5TfRHx"
);
$url = "https://api.twitter.com/1.1/search/tweets.json";
$requestMethod = "GET";
$hashList = urlencode("#QuickBase OR #NoCode OR #LowCode OR #QBCommunitySummit");
if (isset($_GET['q']))  {$q = urlencode($_GET['q']);}  else {$q  = $hashList;}
if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 20;}
$getfield = "?q=$q&count=$count";
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);
#rint_r($string);
#cho "<br /";
if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
if (isset($string["statuses"])) {
        $string = $string["statuses"];
} else {
    echo "<h3>No records found</h3>";
    exit;
}
$i=1;
foreach($string as $items)
    {
        echo "Tweet count: ".$i;
        echo "Time and Date of Tweet: ".$items['created_at']."<br />";
        echo "Tweet: ". $items['text']."<br />";
        echo "Tweeted by: ". $items['user']['name']."<br />";
        echo "Screen name: ". $items['user']['screen_name']."<br />";
        echo "Followers: ". $items['user']['followers_count']."<br />";
        echo "Friends: ". $items['user']['friends_count']."<br />";
        echo "Listed: ". $items['user']['listed_count']."<br /><hr />";
        $i++;
    }

    
