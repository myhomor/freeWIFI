 <div class='container_16'>
		<div class='grid_16'>
			<h3 class='center'>Регистрация</h3>
			
			<div class='u_login'>
				<?if($result['ERROR'] AND $_POST):?>
				<div class='error'>
					<?=$result['ERROR']?>
				</div>
				<?endif?>
				<form method='POST' action='<?//=$_SERVER['DOCUMENT_ROOT']?>/user/?action=register'>
					<input type='text' name='r-mail' value='mail'/>
					<input type='text' name='r-name' value='name'/>
					<input name='TYPE' value='REGISTER' style='display:none;'/>
					<input type='password' name='r-password'  value='w'/>
					<div style='width:100%;' class='center'>
						<input type='submit' class='bg_green color_w' value='Зарегистрироваться'/>
					</div>
				</form>
			</div>
		</div>
	</div>