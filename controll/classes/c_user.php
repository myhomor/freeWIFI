<?
class User{
	function LogIN(){
		if($_COOKIE['u_hash'] AND $_COOKIE['u_id'] AND User::isLiveByID($_COOKIE['u_id'])){
			if($_COOKIE['u_hash'] === User::GetHash($_COOKIE['u_id'])) return true;
			else return false;
		}else{
			return false;
		}
	}

	function isAdmin(){
		if(User::LogIN()){
			$query = " 
				SELECT `group`
				FROM ".Config::$DB_PRESTFIX."user
				WHERE id = '".$_COOKIE['u_id']."'";
			$res = mysql_query($query);
			while($row = mysql_fetch_array($res)){$rt = $row;}
			
			if($rt['group'] == Config::$ADMIN_GROUP_ID) return true;
			else return false;
		}else{ return false;}
	}
	function isLiveByID($ID){
		$query = " 
				SELECT `id`
				FROM ".Config::$DB_PRESTFIX."user
				WHERE id = '".$ID."'";
		$res = mysql_query($query);
		if($row=mysql_fetch_array($res)) return true;
		else return false;
	}
	function isLiveByMail($MAIL){
		$query = " 
				SELECT `id`
				FROM ".Config::$DB_PRESTFIX."user
				WHERE mail = '".$MAIL."'";
		$res = mysql_query($query);
		if($row=mysql_fetch_array($res)) return true;
		else return false;
	}

	protected function CodingPass($params,$type){
		if($type == 'check'){
			$u_pass=md5(md5($params['PASS'])).md5($params['ID']);
			if($u_pass === $params['T_PASS']) return true;
			else return false;
		}
		if($type == 'code'){
			return $u_pass = md5(md5($params['PASS'])).md5($params['ID']);
		}
	}
	
	protected function getActiveKey($ID){
		$query = " 
			SELECT reg_key
			FROM ".Config::$DB_PRESTFIX."user
			WHERE id = '".$ID."'";
		$res = mysql_query($query);
		if($row=mysql_fetch_array($res)) return $row['reg_key'];
		else return false;
	}
	
	function GenerHash(){
		return $hash = md5(generateCode(10));
	}
	
	function SetHash($ID){
		$hash=User::GenerHash();
		$query = "UPDATE `".Config::$DB_PRESTFIX."user` SET `user_hash`='".$hash."' WHERE `id` = ".$ID;
		$res = mysql_query($query);
		return $hash;
	}
	function GetHash($ID){
		$query = " 
			SELECT user_hash
			FROM ".Config::$DB_PRESTFIX."user
			WHERE id = '".$ID."'";
		$res = mysql_query($query);
		if($row=mysql_fetch_array($res)) return $row['user_hash'];
		else return false;
	}
	
	function SetLogin($login,$pass){
		if(trim($login) AND $pass){
			$query = " 
				SELECT *
				FROM ".Config::$DB_PRESTFIX."user
				WHERE mail = '".clearXSS($login)."'";
			$res = mysql_query($query);
			if($row=mysql_fetch_array($res)){
				if($row['active'] AND $row['block']){
					if(!User::CodingPass(array('PASS' => $pass, 'T_PASS' => $row['password'],'ID' => $row['id']),'check')) $error = ERROR('login',1);
				}else{ 
					if(!$row['active']) $error = ERROR('login',2);
					if($row['block']) $error = ERROR('login',3);
				}
			}else{
				$error = ERROR('login',1);
			}
		}else{
			$error = ERROR('login',1);
		}
		$result = array(
			'ERROR' => $error,
			'User' => array(
				"ID" => $row['id'],
				'GROUP' => $row['group'],
				'ACTIVE' => $row['active'],
				
			),
		);
		return $result;
	}
	##TODO: point_info переводить в массив
	function ByID($ID){
		if(User::isLiveByID($ID)){
			$query = " 
				SELECT *
				FROM `".Config::$DB_PRESTFIX."user` 
					INNER JOIN
					 `".Config::$DB_PRESTFIX."userprofile`
					ON  ".Config::$DB_PRESTFIX."user.id = ".Config::$DB_PRESTFIX."userprofile.id
					WHERE ".Config::$DB_PRESTFIX."user.id = ".$ID;
					
			$res = mysql_query($query);
			while($row = mysql_fetch_array($res)){$rt = $row;}
			
			$result = array(
				"USER"	=>	array(
					"ID" => $ID,
					"GROUP" => $rt['group'],	
					"MAIL" => $rt['mail'],	
					"DATA_REG" => $rt['data_reg'],
					"ACTIVE" => $rt['active'],
					),
				"PROFILE"	=>	array(
					"NAME"	=>	$rt['name'],
					"POINT"	=>	$rt['point_info'],
				),
			);
			return $result;
		}else{return false;}
	}
	#TODO: Доделать привязку к местам, добавленным емайлом
	function Register($params){
		$MAIL 	=	clearXSS($params['MAIL']);
		$PASS 	= 	clearXSS($params['PASS']);
		$GROUP 	= 	clearXSS($params['GROUP']);
		if($params['NAME']) $NAME = clearXSS($params['NAME']);
	
		if($MAIL AND $PASS /* AND isEmail($params['MAIL']) */){
			if(!User::isLiveByMail($MAIL)){
				$queryID = "
					SELECT id
					FROM ".Config::$DB_PRESTFIX."user
					ORDER BY  `".Config::$DB_PRESTFIX."user`.`id` DESC 
					LIMIT 1";
				$resID = mysql_query($queryID);
				$rowID = mysql_fetch_array($resID);
				$ID = $rowID['id'];
				$ID++;
				
				$query = "
					INSERT INTO `".Config::$DB_PRESTFIX."user`(`id`, `group`, `mail`, `password`, `data_reg`, `active`, `block`, `user_hash`, `reg_key`) 
					VALUES (".$ID.",".$GROUP.",'".$MAIL."','".User::CodingPass(array($PASS,$ID),'code')."','','0','0','','".User::GenerHash()."')";
					if($res = mysql_query($query)) $sts[0] = 'Y'; else $sts[0] = 'N';
					
				
				if($NAME) $nameP = $NAME; 
				else $nameP = $MAIL;
				$query = "
					INSERT INTO `".Config::$DB_PRESTFIX."userprofile`(`id`, `name`, `point_info`) 
					VALUES (".$ID.",'".$nameP."','')";
				if($res = mysql_query($query)) $sts[1] = 'Y'; else $sts[1] = 'N';
				$LINK ='/user/?user='.$ID.'&u_code='.User::getActiveKey($ID);
				$MailPrarams = array(
					"USER" 	=> 	array(
						"NAME"	=>	$nameP,
						"LINK"	=>	$LINK,
						"LOGIN"	=>	$MAIL,
						"PASSWORD"	=>	$PASS,
						),
					"MAIL"	=>	array(
						"MAIL_TO"	=>	$MAIL,
						"MAIL_FROM"	=>	Config::$MAIL_FROM,
						"TYPE"	=>	'REGISTER',
						"SUBJECT" => MailSubject('REGISTER'),
						),
				);
				if(Mail::Slend($MailPrarams)) $m_stat = 'Y'; else $m_stat = 'N'; 
			}else{
				$error = ERROR('register',2);
			}
		}else{
			$error = ERROR('register',1);
		}
		if($sts[0] == 'N' AND $sts[1] == 'N') $error = ERROR('system',1);
		if(!$error) $mess = INFO('register',1);
		$RESULT = array(
			"ERROR" 	=> 	$error,
			"INFO_MESS"	=>	$mess,
			"M_STATUS"	=>	$m_stat,
		);
		return $RESULT;
	}
	
	function ActiveProfile($ID,$CODE){
		if($ID AND $CODE){
			if(User::isLiveByID($ID)){
				if(User::getActiveKey($ID) === $CODE){
				
					$query = "
						UPDATE `".Config::$DB_PRESTFIX."user` 
						SET `active`=1,`reg_key`='' 
						WHERE `id`=".$ID;
					if($res = mysql_query($query)) $mess = INFO('register',2);
					else $error = ERROR('system',1);
					
				}else{
					$error = ERROR('system',2);
				}
			}else{
				$error = ERROR('system',2);
			}
		}else{
			$error = ERROR('system',2);
		}
		$RESULT = array(
			"ERROR" 	=> 	$error,
			"INFO_MESS"	=>	$mess,
		);
		return $RESULT;
	}
} 


?> 