<?php

    require_once ('PomboSujoGames.php');

    class Ranking extends PomboSujoGames {

        public function __construct()
        {
            parent::__construct('Ranking');
        }

        public function inserir($Nome,$Pontos)
        {//Sobreposição do método na classe pai
            try {
                $this->mysqli->query("INSERT INTO ".$this->tabela."(Nome,Pontos) VALUES ('$Nome','$Pontos')");
                $this->mysqli->close();
            } catch(mysqli_sql_exception $e) {
                die($e->getMessage());
            }
        }

    }
