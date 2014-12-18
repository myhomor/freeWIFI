<?include($_SERVER['DOCUMENT_ROOT'].'/header.php');?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script>
	$(document).ready(function (){
		//open map box
		//on_page_start();
		//$(window).resize(on_page_start);
	});
</script>
<script type="text/javascript" src="js/script.js"></script>
<aside class='right-side'>	
	<div class='content'>
		<div class='container_16'>
			<div class='grid_8'>
				<p class='title'>Параметры точки</p>
				<p>Добавьте название точки, и ее параметры</p>
			</div>
			<div class='grid_8'>
				<input class='in-text' type='text'/>
				<input class='in-text' type='text'/>
				<select class='in-text'>
					<option>1</option>
					<option>2</option>
					<option>3</option>
				</select>
				<input class='in-text' type='text'/>
			</div>
			
			<div class='grid_8'>
				<p class='title'>Метка на карте</p>
				<p>Просто укажите место на карте.</p>
			</div>
		</div>
		<div>
			<div id="big-map" style='height: 300px;'></div>
		</div>
		<div class='container_16'>
			<div class='grid_16'>
				<input type='submit' class='float_r bg_green color_w addPl' value='Сохранить'/>
			</div>
		</div>
	</div>
</aside><!-- /.right-side -->
<?include($_SERVER['DOCUMENT_ROOT'].'/empty-footer.php');?>	