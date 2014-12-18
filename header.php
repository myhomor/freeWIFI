<?include($_SERVER['DOCUMENT_ROOT'].'/controll/include/prolog.php');?>
<!DOCTYPE html>

<?//pPrint($_COOKIE);

//pPrint(User::ByID(1));
?>
<html>
    <head>
        <script type="text/javascript" src="/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
        
        <meta charset="UTF-8">
		
		<link href="<?//=$_SERVER['DOCUMENT_ROOT']?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?//=$_SERVER['DOCUMENT_ROOT']?>/css/reset.css" rel="stylesheet" type="text/css" />
        <link href="<?//=$_SERVER['DOCUMENT_ROOT']?>/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?//=$_SERVER['DOCUMENT_ROOT']?>/css/icon.css" rel="stylesheet" type="text/css" />
        <link href="<?//=$_SERVER['DOCUMENT_ROOT']?>/css/tools.css" rel="stylesheet" type="text/css" />
        <link href="<?//=$_SERVER['DOCUMENT_ROOT']?>/css/960_16_col.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="/js/all-js-content.js"></script>
		<script type="text/javascript" src="/js/add-pl.js"></script>
        <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script> 
		<script type="text/javascript">
			var myMap;

			// Дождёмся загрузки API и готовности DOM.
			ymaps.ready(init);

			function init () {
				var myMap = new ymaps.Map('big-map', {
				center: [55.751574, 37.573856],
				zoom: 9,
				controls: []
				
				});
				myMap.controls
					// Кнопка изменения масштаба.
					.add('zoomControl', { right: 0, top: 5 });
			}
		</script>
	</head>
    <body class="skin-blue">
       
        <header class="header">
          
            <nav class="navbar navbar-static-top" role="navigation">
    
                 <div class="head-cotn head-nav" >
                     <div class="logo-box"></div>
                 </div>

                <div class="right-box">
				
					<div class="top-ico-nav open-nav-box" data-id_openbox='1' >
						<i class='ico_50 icon-navTop'></i>
					</div>
                    <div class='no_user'>
						<ul class='u_case'>
						<?if(User::LogIN()):?>
							<!--<li>
								<div class='user-logo'></div>
							</li>-->
                         
							<li class="dropdown user user-menu open-nav-box"  data-id_openbox="2">
								Мой Профиль
							</li>
						<?else:?>
							<!--<li>Регистрация</li>-->
							<li class='bg_green color_w open-nav-box' data-id_openbox="2">Войти</li>
						<?endif;?> 
						</ul>
                    </div>
					
                </div>
				<div class="right-box">
                    <ul class='nav-map-place'>
						<li class="dropdown user user-menu" >
                            <a href="#" class="dropdown-toggle open-nav-box"  data-id_openbox="case_city">
                                <i class="ico_16 icon-location" style='margin:2px 7px 0 0;'></i>
								<span>Москва  <i class="caret"></i><span>
							</a>
                        </li>
                        <li class="dropdown add-place top-ico" >
                                <i class="ico_40 icon-add_point" style='margin-top: 3px;'></i>
                        </li>
						
                       
                    </ul> 
					<div class="top-hidd-box-city toggle_box" id='id_item_navBox_open-case_city'>
						<div class='top-hidd-item-city'>
							<p class='title'>Выберите Ваш город <span><i class="ico_16 icon-compass"></i>Определить</span></p>
							<input type='text' placeholder='введите Ваш город'/>
						</div>
						
					</div>
                </div>
               
                <div class="head-cotn search-box">
                     <input type="text" class="inp" placeholder='например, жопа тоже вертолет'/>
					 <input type='submit' class='sear_butt icon-searTop' value=''/>
					 <i class="ico_24 icon-sear_w icoTopS" ></i>
                </div>
            </nav>
			
            <div class="top-hidd-box toggle_box" id='id_item_navBox_open-1'>
				<ul>
					<li><div class='top-hidd-item'></div></li>
					<li><div class='top-hidd-item'></div></li>
					<li><div class='top-hidd-item'></div></li>
					<li><div class='top-hidd-item'></div></li>
					<li><div class='top-hidd-item'></div></li>
					<li><div class='top-hidd-item'></div></li>
					<li><div class='top-hidd-item'></div></li>
					<li><div class='top-hidd-item'></div></li>
					<li><div class='top-hidd-item'></div></li>
					<li><div class='top-hidd-item'></div></li>
					<li><div class='top-hidd-item'></div></li>
				</ul>
			</div>
			<?if(User::LogIN()):?>
			<div class="top-hidd-box-user toggle_box" id='id_item_navBox_open-2'>
				<div class='top-hidd-item-user'></div>
				<div class='top-hidd-item-user'></div>
				<div class='top-hidd-item-user'></div>
				<div class='top-hidd-item-user'></div>
				<div class='top-hidd-item-user'></div>
			</div>
			<?else:?>
			<div class="top-hidd-box toggle_box" id='id_item_navBox_open-2'>
				<div class='u_login'>
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
			<?endif;?>
			
        </header>
        <div class="wrapper row-offcanvas">