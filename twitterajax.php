<?php

//if(isset($_POST)){
// do all the process with your post data
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "YOUR TOKEN",
    'oauth_access_token_secret' => "YOUR TOKEN SECRET",
    'consumer_key' => "YOUR KEY",
    'consumer_secret' => "YOUR SECRET"
);



/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$search = $_GET['q'];
$search= preg_replace('/\s+/', '', $search);
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=#'.$search.'';
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$response = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();
header('Content-Type: application/json');

echo json_encode($response);
//echo "<h1>Tweets for ".$search."</h1>";

//$reply = json_decode($response);
/*
echo '<ul id="ticker">';

$i= count($reply->statuses);
for($j=0;$j<$i;$j++)
{
echo '<li><a href="https://twitter.com/'.$reply->statuses[$j]->user->screen_name.'/status/'.$reply->statuses[$j]->id.'" ><img src="'.$reply->statuses[$j]->user->profile_image_url.'" /></a> @'.$reply->statuses[$j]->user->name.': '.$reply->statuses[$j]->text.'</li>';
//echo "</br>";
}

echo "</ul>";

}
//echo $reply[1]->text;
*/
?>	
