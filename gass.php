<?php
///////////////////////////////////////////
///////CREATED BY ARUDJI HERMATYAR////////
//////www.facebook.com/bantalku567///////
/////https://github.com/arudji1211//////
///////////////////////////////////////

include 'tri_req.php';

$tri = new tri();
$imei = "868880043302499";
echo "Masukkan No Telepon : ";
$msisdn = trim(fgets(STDIN));
$otp = $tri->request_otp($msisdn,$imei);
echo $otp[1] . "\r\n";
echo "Masukkan OTP : ";
$otp = trim(fgets(STDIN));
$login = $tri->login($msisdn,$otp);
$login = json_decode($login,true);
$bearer = $login['access_token'];
$id = $tri->trans($bearer);
$id = json_decode($id,true);
$id = $id['data'][0]['rewardTransactionId'];
for($id1 = 23111801; $id1 < 23111803;$id1++)
{
  $gass = $tri->claim($bearer,$id,$id1);
  echo $gass . "\r\n";
  sleep(2);
}


?>
