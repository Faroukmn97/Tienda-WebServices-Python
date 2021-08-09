<?php

class Connection extends PDO
	{
		private $hostBd = 'ec2-54-158-232-223.compute-1.amazonaws.com';
		private $nombreBd = 'd4sr60nno7nl6q';
		private $usuarioBd = 'mrzpqsylvjdvbo';
		private $passwordBd = 'c0953150608445715ce6c4b45b5c24c6f855e1cad3ebedeae03351ccfe8928ca';
		
		public function __construct()
		{
			try{
                // llamar al constructor padre porque estamos haciendo una herencia
				parent::__construct('pgsql:host=' . $this->hostBd . ';port=5432;dbname=' . $this->nombreBd, $this->usuarioBd, $this->passwordBd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				
				} catch(PDOException $e){
				echo 'Error: ' . $e->getMessage();
				exit;
			}
		}
	}

?>