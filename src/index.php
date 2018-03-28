<?php
mb_language('Japanese');

define('SLACK_API_POST','https://slack.com/api/chat.postMessage');

$message   = "Hello!";

$reqParmArray = [
        'token'     => getenv('TOKEN'),
        'channel'   => getenv('CHANNEL'),
        'text'      => $message ,
        'username'  => 'Lenna',
        'icon_url'  => 'https://upload.wikimedia.org/wikipedia/en/2/24/Lenna.png',
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

