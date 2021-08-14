<?php
$documentroot = dirname(__FILE__);
require_once "config.php";
// Registering Globals
define("dbhost", $GLOBALS["db_host"]);
define("dbuser", $GLOBALS["db_user"]);
define("dbpass", $GLOBALS["db_pass"]);
define("dbname", $GLOBALS["db_name"]);
// 
class Db {
	public $hostname =  dbhost;
	public $usuario = dbuser;
	public $senha = dbpass;
	public $database = dbname;
	
	
	public $idcon;
	public $rs;
	public $matriz_associativa;
	
	public function Db(){
		$this->m_connect();	
	}
	
	public function m_connect() {
                        if(function_exists ('mysql_pconnect')) {
                            $this->idcon = mysql_pconnect($this->hostname, $this->usuario, $this->senha) or die(mysql_error());
                            mysql_select_db($this->database, $this->idcon);
                        } else {
                            $this->idcon = mysqli_connect($this->hostname, $this->usuario, $this->senha) or die(mysqli_error());
                            mysqli_select_db($this->idcon, $this->database );
                        }
			// Set timezone
			$qr = "set time_zone = 'America/Sao_Paulo'";
			$this->m_query($qr);
	}
	
	public function m_query($qr) {
			if(!$this->idcon) {
				$this->m_connect();
			}
                        if(function_exists ('mysql_pconnect')) {
                            $rs=mysql_query($qr, $this->idcon);
                        } else {
                             $rs=mysqli_query($this->idcon, $qr);
                        }
			$this->rs = $rs;
			return $rs;
			
	}
	
	public function m_fetch_array($rs) {
            if(function_exists ('mysql_pconnect')) {
		return mysql_fetch_array($rs);
            } else {
                return mysqli_fetch_array($rs, MYSQLI_ASSOC);
            }
	}

	public function m_fetch_assoc($rs) {
		if(function_exists ('mysql_pconnect')) {
			return mysql_fetch_assoc($rs);
		} else {
			return mysqli_fetch_assoc($rs);
		}
}

	public function m_result($rs, $campo) {
             if(function_exists ('mysql_pconnect')) {
		return mysql_result($rs, 0, $campo);
             } else {
				 if($rs) {
					$rs->data_seek(0);
					//$valor = $result->fetch_row();
					$valor =$rs->fetch_assoc()[$campo];
					return $valor;
				 } else {
					return false;
				 }
             }
	}

	public function SetPassword($password) {
			$this->senha = $password;
	}

	public function m_num_rows($rs) {
            if(function_exists ('mysql_pconnect')) {
		return mysql_num_rows($rs);
            } else {
                return mysqli_num_rows($rs);
            }
	}

	public function m_affected_rows() {
             if(function_exists ('mysql_pconnect')) {
		return mysql_affected_rows($this->idcon);
             } else {
                return mysqli_affected_rows($this->idcon); 
             }
	}

	public function m_close() {
             if(function_exists ('mysql_pconnect')) {
		return mysql_close($this->idcon);	
             } else {
                return mysqli_close($this->idcon);	
             }
	}
	
	public function m_error() {
            if(function_exists ('mysql_pconnect')) {
		return mysql_error();	
            } else {
                return mysqli_error($this->idcon);	
            }
	}
        
        public function escape($string) {
            if(function_exists ('mysql_pconnect')) {
                return mysql_real_escape_string($string, $this->idcon);
            } else {
                return mysqli_real_escape_string($this->idcon, $string);
            }
		}

		// ============== Funcoes muito especificas... remover um dia
		public function prepare($qr) {
            if(function_exists ('mysql_pconnect')) {
                return false;
            } else {
                return mysqli_prepare($this->idcon, $qr);
            }
		}
		
		public function execute_stmt_query($stmt, $campo, $valor, $inteiro) {
			if(function_exists ('mysql_pconnect')) {
				$campo = mysql_real_escape_string($campo);
				if($inteiro) {
					$valor = intval($valor);
				} else {
					$valor = mysql_real_escape_string($valor);
				}
				$qr = "update condominio set $campo = '$valor'";
				//echo $qr;
				$this->m_query($qr);
                return false;
            } else {
				//echo "Executando a parada";
				mysqli_stmt_bind_param($stmt, "ss", $campo, $valor);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_close($stmt);
				return true;
            }
		}
	
}
