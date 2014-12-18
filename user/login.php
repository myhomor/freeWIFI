	
	<div class='container_16'>
		<div class='grid_16'>
			<h3 class='center'>Войти</h3>
			
			<div class='u_login'>
				<?if($result['ERROR']):?>
				<div class='error'>
					<?=$result['ERROR']?>
				</div>
				<?endif?>
				<?if($result['INFO_MESS']):?>
				<div class='infom'>
					<?=$result['INFO_MESS']?>
				</div>
				<?endif?>
				<form method='POST' action='<?//=$_SERVER['DOCUMENT_ROOT']?>/user/'>
					<input type='text' name='mail' id='u_login' />
					<input type='password' name='password' id='u_password'/>
					<input type='hidden' name='TYPE' value='LOGIN'/>
					<div style='width:100%;'>
						<input type='submit' class='float_l bg_blue color_w' value='Регистрация'/>
						<input type='submit' class='float_r bg_green color_w login' value='Войти'/>
					</div>
				</form>
			</div>
		</div>
	</div>