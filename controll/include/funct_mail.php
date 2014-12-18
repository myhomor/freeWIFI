<?
function RegisterMail($params){
	$mail = "
	<html>
	<head></head>
	<body>
		<table width='600' align='center' style='font-family:arial; font-family: arial;color: #777;line-height: 22px;'>
			<tr>
				<td colspan='3' style='font-size: 20px;background: rgb(121, 195, 97);padding: 10px;color: #fff;'>Спасибо за регистрацию, ".$params['NAME']."!</td>
			</tr>
			<tr>
				<td style='padding:10px;'>
					".$params['NAME'].", спасибо за регистрацию!
					Ваш профиль успешно создан на <sitename>, но требует активации.
					Для активации Вашего профиля необходимо перейте по предоставленной ниже ссылке.
					
				</td>
			</tr>
			<tr>
				<td style='padding:10px;'>Ваша ссылка для активации профиля: <a href='".$params['LINK']."'>".$params['LINK']."</a></td>
			</tr>
			<tr>
				<td style='padding:10px;'>По всем вопросам просим обращаться к нам по адресу ".Config::$SUPPORT_MAIL."</td>
			</tr>
			<tr>
				<td style='padding:10px;'>
					<table width='50%'>
						<tr>
							<td style='padding:10px;'>Логин:</td>
							<td style='padding:10px;'>".$params['LOGIN']."</td>
						</tr>
						
						<tr>
							<td style='padding: 0 10px;'>Пароль:</td>
							<td style='padding: 0 10px;'>".$params['PASSWORD']."</td>
						</tr>
					</table>
				</td>
			</tr>
			
			<tr>
				<td colspan='3' style='font-size: 20px;padding: 5px 10px;color: rgb(97, 128, 195);border-bottom: 2px solid;'>
					Часто задаваемые вопросы
				</td>
			</tr>
			<tr>
				<TD style='padding:10px;color: #444;'>
				Как мне привязать к моему профилю ранее добавленные точки?
				</TD>
			</tr>
			<tr>
				<td style='padding: 0 15px 10px 15px;font-size: 14px;'>
				Что бы привязать профиль к уже добавленным Вами точкам, необходимо создавать аккуант на тот e-mail, на который была созданна точка.
				</td>
			</tr>
			
			<tr>
				<TD style='padding:10px;color: #444;'>
				Как мне привязать к моему профилю ранее добавленные точки?
				</TD>
			</tr>
			<tr>
				<td style='padding: 0 15px 10px 15px;font-size: 14px;'>
				Что бы привязать профиль к уже добавленным Вами точкам, необходимо создавать аккуант на тот e-mail, на который была созданна точка.
				</td>
			</tr>
			<tr>
				<td>
					<table width='100%' style='border-top: 1px solid #dfdfdf;font-size: 13px;color: #444;'>
						<tr>
							<td width='50%' style='padding:10px;'>
								FreeWiFI.ru
							</td>
							<td width='50%' valign='right' style='padding:10px;'>
								".Config::$SUPPORT_MAIL."
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
 </html>";
 return $mail;
}
?>