<?include($_SERVER['DOCUMENT_ROOT'].'/header.php');?>
	<script>
		$(document).ready(function (){
			//open map box
			on_page_start();
			$(window).resize(on_page_start);
		});
	</script>
            <aside class="left-side ">                
               <!--<div class='s-settings-box'>
					<div class='box-on-sett'></div>
					<div class='box-on-sett'></div>
			   </div>-->
               <div class='s-items-wrap'>
				<?for($i=0; $i<10; ++$i){?>
				<div class="s-item"> 
                    <div class="s-item-box">
                        <div class="s-item-ico">
                            
                        </div>
                        <div class="s-item-txt">
                            <a href="#"><p>NAME wifi plase some text some text some text some text some text some text</p></a>
                        </div>
					</div>
                  
 
                    <div class="s-item-box s-footer">
                            <div class="s-footer-itm"><i class="ico_34 icon-star"></i><div><span class='bg_gold'>x5</span></div></div>
                            <div class="s-footer-itm"><i class="ico_34 icon-photo"></i><div><span class='bg_green'>2<?=$i?></span></div></div>
                            <div class="s-footer-itm"><i class="ico_34 icon-comment"></i><div><span class='bg_blue'>23<?=$i?></span></div></div>
                    </div>

                </div>
				<?}?>

               
            </div>

            </aside>
			<div>
			</div>

            <aside class="right-side">
				<div class='steps'>
				</div>
                <div id="big-map">
                       
                </div>
				<!--<div class='m-add-mapPlace'>
					<div class='m-nav-map-item'>
						<div class='m-txt-add'><p>Настройки</p></div>
						<div class='m-ico-add'><i class='m-ico-bg ico-add'></i></div>
					</div>
					<div class='m-nav-map-item'>
						<div class='m-txt-add'><p>Добавить место</p></div>
						<div class='m-ico-add'><i class='m-ico-bg ico-add'></i></div>
					</div>
				</div>-->
              
            </aside><!-- /.right-side -->
<?include($_SERVER['DOCUMENT_ROOT'].'/empty-footer.php');?>