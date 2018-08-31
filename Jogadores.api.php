<?php
    header('Access-Control-Allow-Origin: *');
    require_once ('Jogadores.php');
    require_once ('PomboSujoGames.php');

    $jogador = new Jogadores();

    if ($_POST) {
        if ($_POST['Method'] == 'Cadastro') {
            $jogador->inserir($_POST['Nick'],$_POST['Senha']);
        }

        if ($_POST['Method'] == 'Logar') {
            $login = $jogador->logar($_POST['Nick'],$_POST['Senha']);
            ((count($login) > 0) ? die('1') : die('0'));
        }
    }



