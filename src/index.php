<?php
mb_language('Japanese');

define('SLACK_API_POST','https://slack.com/api/chat.postMessage');

$user     = array(  'user'     => "ISHII_Bot",
        'icon_url' =>'http://kanri.sen-sv.net/slack/image/melon.jpg',
        );

$message   = "ishii";// $_GET['message'];

$reqParmArray = [
        'token'     => getenv('TOKEN'),
        'channel'   => getenv('CHANNEL'),
        'text'      => $message ,
        'username'  => $user['user'] ,
        'icon_url'  => $user['icon_url'] ,
        'pretty'    => 1 ,
        ];

echo post_message($reqParmArray);

function post_message($reqParmArray){
    $uri =  '?' .http_build_query($reqParmArray);
    $url = SLACK_API_POST . $uri ;
    $result = file_get_contents($url);
    if( ! $result ){
        return false;
    }
    $resultArray = json_decode($result,false);
    return $resultArray;
}
