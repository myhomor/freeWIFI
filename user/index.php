<?include($_SERVER['DOCUMENT_ROOT'].'/header.php');?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<div class='content'>
<?

if(!User::LogIN() AND isset($_GET['user']) AND isset($_GET['u_code'])) $result = User::ActiveProfile($_GET['user'],$_GET['u_code']);
?>
<?if(!User::LogIN() AND $_POST){
	if($_POST['TYPE'] == 'LOGIN'){
		$login = $_POST['mail'];
		$pass = $_POST['password'];
		
		$result = User::SetLogin($login,$pass);
		//return $result;
		if(!$result['ERROR']):
				User::SetHash($result['User']['ID']);?>
				<script>
					document.cookie = 'u_id=<?=$result['User']['ID']?>;path=/; expires = 60*60;';
					document.cookie = 'u_hash=<?=User::GetHash($result['User']['ID'])?>;path=/; expires = 60*60;';	
					window.location.reload();
				</script>
	<?endif;
	}
	if($_POST['TYPE'] == 'REGISTER'){
		
		$NewUser = array(
			'MAIL'	=>	$_POST['r-mail'],
			'PASS'	=>	$_POST['r-password'],
			'NAME'	=>	$_POST['r-name'],
			'GROUP'	=>	2,
		);
		$result = User::Register($NewUser);
	}
}?>
<?
//pPrint($result);
if(!User::LogIN()):
	if($_GET['action'] == 'register'):
		if(!$result['INFO_MESS']) 
		include($_SERVER['DOCUMENT_ROOT'].'/user/register.php');
		else include($_SERVER['DOCUMENT_ROOT'].'/user/login.php');
	else:
		include($_SERVER['DOCUMENT_ROOT'].'/user/login.php');
	endif;
	
elseif(User::LogIN()):
	include($_SERVER['DOCUMENT_ROOT'].'/user/profile.php');
endif;?>

</div>
<?include($_SERVER['DOCUMENT_ROOT'].'/footer.php')?>