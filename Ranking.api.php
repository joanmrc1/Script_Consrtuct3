<?php
    header('Access-Control-Allow-Origin: *');
    require_once ('Ranking.php');
    require_once ('PomboSujoGames.php');

    $Ranking = new Ranking();

    if ($_POST) {
        if ($_POST['Method'] == 'Inserir') {
            $Ranking->inserir($_POST['Nome'],$_POST['Pontos']);
        }
    }

    if ($_GET) {
        if ($_GET['lista'] == 'sim') {
            $result = $Ranking->listaRanking('Pontos','Desc');

            foreach ($result as $show) {
                echo $show['Nome']." " .$show['Pontos']." |";
            }
        }
    }


