	
<?
if(!empty($_GET['view']) AND trim(regNUM($_GET['view']))!= ''){
if(!$RESULT = User::ByID($_GET['view'])):
	$ERROR = ERROR_PAGE(404);
endif;
  //pPrint($RESULT);
}else{
 $RESULT = User::ByID($_COOKIE['u_id']);
 //pPrint($RESULT);
 }?>
<?
if($ERROR):
	echo $ERROR;
else:
?>
<div class='container_16'>
	<div>
		<?if(User::isAdmin()):
			echo '<div>BANN!</div>';
		endif;?>
		<div class='grid_5'>
			<div> avater</div>
		</div>
		
		<div class='grid_11'>
			<div class='wr-u-info'>
				<div class='title'>Профиль</div>
				
				<table width="100%">
					<tr>
						<td width="50%" class='name'>
							Имя
						</td>
						<td>
							<?=$RESULT['PROFILE']['NAME']?>
						</td>
					</tr>
					<tr>
						<td width="50%" class='name'>
							Дата регистрации
						</td>
						<td>
							<?=$RESULT['USER']['DATA_REG']?>
						</td>
					</tr>
					<tr>
						<td width="50%" class='name'>
							Добавил мест
						</td>
						<td>
							<?if($RESULT['PROFILE']['POINT']): echo count(trim($RESULT['PROFILE']['POINT'])); else: echo 0; endif;?>
						</td>
					</tr>
				
				</table>
			</div>
		</div>
		<?if($RESULT['PROFILE']['POINT']):?>
		<div class='grid_16'>
			<div class='wr-u-info'>
				<div class='title'>add point wifi</div>
				
			</div>
		</div>
		<?endif;?>
	</div>
</div>

<?endif;?>