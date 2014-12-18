 <?
 function pPrint($params){
	echo '<pre>'; print_r($params); echo '</pre>';
 }
 
 function regNUM($param){
	//if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
	return $param;
 }
 
 function clearXSS($param){
	
	return $param;
 }
 function ERROR($type,$status){
	if($type=='login'){
		if($status == 1) $mess = 'Неправильный логин или пароль.';
		if($status == 2) $mess = 'Данный профиль еще не активирован пользователем.';
		if($status == 3) $mess = 'Данный профиль заблокирован.';
	}
	if($type == 'register'){
		if($status == 1) $mess = 'Вы заполнили не все поля или заполнили их некректно.';
		if($status == 2) $mess = 'Извините, данный e-mail уже используется другим пользователем.';
	}
	if($type == 'system'){
		if($status == 1) $mess = 'Упс, что то пошло не так.';
		if($status == 2) $mess = 'Упс, похоже ваша ссылка не работает, либо ваш пользователь уже был активирован.';
	}
	return $mess;
 }
 
 function ERROR_PAGE($status){
	if($status == 404) $mess = 'Страница не найдена';
	
	return $mess;
 }
 
 function INFO($type,$status){
	if($type == 'register'){
		if($status == 1) $mess = 'Спасибо за регистрацию! На указанный вам E-mail прийдет письмо для активации аккуанта.';
		if($status == 2) $mess = 'Пользователь активирован!';
	}
	return $mess;
 }
function MailSubject($type){
	if($type == 'REGISTER') $mess = 'Спасибо за регистрацию';
	
	return $mess;
}


 # ‘ункци¤ дл¤ генерации случайной строки заданной длины
function generateCode($length) {
	if(!$length) $length=6;
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0,$clen)];  
    }
    return $code;
}
 ?>