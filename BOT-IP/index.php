
<?php

if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
  $ip_address = $_SERVER['REMOTE_ADDR'];
}
file_put_contents("cker.txt", $ip_address. "\n", FILE_APPEND);


echo "bad boy";
exit();


?>
