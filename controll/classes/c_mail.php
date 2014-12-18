<?
	class Mail{
		function reCode($param){
			$enc=mb_detect_encoding($param); //узнаем кодировку
			$param=iconv($enc, "windows-1251", $param);
			return $param;
		}
		private function SetHeader($param){
			$headers= "MIME-Version: 1.0\r\n";
			$headers .='Content-Type: text/html; charset="windows-1251"'."\n";
			$headers .= "From: ".$param['SUBJECT']." <".$param['MAIL_FROM'].">\r\n";
			
			return $headers;
		}
		/* private function SetTitle($param){
			return Mail::reCode($param);
		} */
		private function SetMessage($params){
			if($params['MAIL']['TYPE'] == 'REGISTER') return $message = RegisterMail($params['USER']);
			
			return $message;
		}
		
		function Slend($params){
			$message = Mail::SetMessage($params);
			/* if(mail($params['MAIL']['MAIL_TO'],Mail::reCode($params['MAIL']['SUBJECT']),$message,Mail::SetHeader($params['MAIL']))) return true;
			else return false;  */
			
			echo $params['MAIL']['MAIL_TO'];
			echo Mail::reCode($params['MAIL']['SUBJECT']);
			echo Mail::SetHeader($params['MAIL']);
			
			pPrint($params);$param['MAIL_FROM'];
			//echo $message;
		}
	}
?>