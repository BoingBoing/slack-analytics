<?php

require_once('setup.php');

function slackMessage($message, $channel="#dev") {

    // Get cURL resource
    $curl = curl_init();
    // Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => SLACK_WEBHOOK_URL,
        CURLOPT_USERAGENT => 'Google Analytics Slack Integration',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => array(
            "payload" => json_encode(array(
                "channel" => $channel,
                "username" => "Analytics Bot",
                "text" => $message,
                "icon_emoji" => ":chart_with_upwards_trend:",
              )),
        )
    ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    echo $resp;
    if(!$resp){
        die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
    }
    // Close request to clear up some resources
    curl_close($curl);

}



?>