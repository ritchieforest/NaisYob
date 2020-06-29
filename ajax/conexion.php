
		<?php
			// Conexion en PDO

				try {
					$pdo = new PDO("mysql:dbname=db_naisyob;host=192.168.101.101",'soportetecnico','hief2020',array(PDO::ATTR_PERSISTENT => true,
																		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$msg='conexion_ok';  
				} catch (PDOException $e) {
					$msg='conexion_cancel: '.$e->getMessage();
					//echo "Error al conectar a la base de datos. ".$e->getMessage();	
				}
				//
		?>