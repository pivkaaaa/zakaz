<?php

			$server = $_SERVER['HTTP_HOST'];
			$name = $_POST['name'];
			if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
			if (empty($phone))
			{
				echo "I can not send!";
				exit;
			}
			$ip = $_SERVER['REMOTE_ADDR'];
			
			if (isset($_POST['theme'])) {$theme = '<br><strong>: </strong> '.($_POST["theme"]);}
			
			$success_url = './success/index.php?name='.$_POST['name'].'&phone='.$_POST['phone'].''; 
 
			
			$mail_header = "MIME-Version: 1.0\r\n";
			$mail_header.= "Content-type: text/html; charset=UTF-8\r\n";
			 
			
			$to = "pivkaaaa@gmail.com"; //заменить почту на свою
			$subject = "Заявка с сайта: $server";
			
			$message = "<strong>Имя:</strong> $name<br><strong>Телефон:</strong> $phone  $theme
			<br><strong>Время заказа:</strong> ".date("d.m.Y H:i:s")." <br><strong>IP покупателя:</strong> $ip";
			if (mail($to,$subject,$message,$mail_header))
			header('Location: '.$success_url);
			else echo 'Oshibka otpravki - otklyuchena funkciya (php mail). Obratites v podderzhku xostinga';
		?>