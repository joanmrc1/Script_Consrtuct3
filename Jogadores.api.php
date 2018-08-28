<?php
    header('Access-Control-Allow-Origin: *');
    require_once ('Jogadores.php');
    require_once ('PomboSujoGames.php');

    $jogador = new Jogadores();

    if ($_POST['Method'] == 'Cadastro') {
        $jogador->inserir($_POST['Nick'],$_POST['Senha']);
    }


