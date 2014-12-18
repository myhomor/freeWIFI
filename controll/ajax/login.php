<?
include($_SERVER['DOCUMENT_ROOT'].'/controll/include/prolog.php');?>
<?
if($_POST['type']==='login'){
	$login = $_POST['params'][0];
	$pass = $_POST['params'][1];
	$result = User::setLogin($login,$pass);
	return $result;
}
?>