<?php

    require_once('Conexao.php');

    class PomboSujoGames extends Conexao {

        protected $tabela;

        public function __construct($tabela)
        {//Tabela do construtor onde será usado nas consultas
            parent::__construct();
            $this->tabela = $tabela;
        }

        public function inserir($Nick,$Senha)
        {//Cadastro do usuário no banco
            try {
                $senhaHash = md5($Senha);
                $this->mysqli->query("INSERT INTO ".$this->tabela."(Nick,Senha) VALUES ('$Nick','$senhaHash')");
                $this->mysqli->close();
                return 'Cadastrado com sucesso';
            } catch(mysqli_sql_exception $e) {
                die($e->getMessage());
            }
        }

        public function listaRanking($NomeColuna,$Ordem)
        {//Coluna da tabela que deseja, e a Ordem se vai ser Asc(Menor para maior) ou Desc(Maior para menor)
            try {
                $result = $this->mysqli->query("SELECT * FROM " . $this->tabela . " order by " . $NomeColuna . " " . $Ordem);
                $this->mysqli->close();
                return $result;
            } catch (mysqli_sql_exception $e) {
                die($e->getMessage());
            }
        }

        public function logar($Nick,$Senha)
        {
            try {
                $senhaHash = md5($Senha);
                $result = $this->mysqli->query("SELECT Nick FROM " . $this->tabela." WHERE Nick = '$Nick' and Senha = '$senhaHash'")->fetch_all();
                $this->mysqli->close();
                return $result;
            } catch (mysqli_sql_exception $e) {
                die($e->getMessage());
            }

        }
    }