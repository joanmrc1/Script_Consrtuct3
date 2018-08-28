<?php
//Criando por Joan Marcos #joanmrc96-GIT
     abstract class Conexao {

        private $host = 'db4free.net';
        private $username = 'pombosujogames';
        private $password = '@pombosujo#';
        private $dataBase = 'freefire';
        protected $mysqli;

        public function __construct()
        {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            try{
                $this->mysqli = new mysqli($this->host,$this->username,$this->password,$this->dataBase);
            } catch(mysqli_sql_exception $e) {
                die($e -> getMessage());
            }
        }

        public function getMysqli()
        {
            return $this->mysqli;
        }

    }