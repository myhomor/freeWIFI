<?include($_SERVER['DOCUMENT_ROOT'].'/header.php');?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script>
		$(document).ready(function (){
			//open map box
			on_page_start();
			$(window).resize(on_page_start);
		});
</script>
<script type="text/javascript" src="js/script.js"></script>
<aside class='right-side'>	
	<div class='wr-add-slider'>
		<div class='slid-line'>
			<div class='slid'>
				<div class='steps bg-step_1'>
					<div style='width: 92%;'>Шаг 1. Выберите место, кликнув по карте!</div>
					<div style='width: 8%;'>
						<span class='next-s' data-eq='1'>Далее</span> 
						
					</div>
				</div>
				<div id='map' ></div>
			</div>
			<div class='slid'>
				<div class='steps bg-step_2'>
				
					<div style='width: 92%;'>Шаг 2. Оставьте информацию об открытой точке wifi.</div>
					<div style='width: 8%;'>
						<span class='next-s' data-eq='2'>Далее</span> 
					</div>
				</div>
				
				<div class='content'>
					<div class='container_16'>
							<div class='grid_4' style='height:1px;'></div>
							<div class='grid_8'>
								<input class='in-text' type='text'/>
								<input class='in-text' type='text'/>
								<input class='in-text' type='text'/>
							</div>
					</div>
				</div>
			</div>
			<div class='slid'>
				<div class='steps bg-step_3'>
				
					<div style='width: 92%;'>Шаг 3. Оставьте ваш e-mail! Зарегистрируйтесь, и Ваши точки не пропадут! Они будут привязаны к вашему аккуанту.</div>
					<div style='width: 8%;'>
						<span class='next-s' data-eq='3'>Далее</span> 
					</div>
				</div>
			</div>
		</div>
	</div>
</aside><!-- /.right-side -->
<?include($_SERVER['DOCUMENT_ROOT'].'/empty-footer.php');?>	