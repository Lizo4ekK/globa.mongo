<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/model.php';
$model = new Model();
$_POST = json_decode(file_get_contents('php://input'), true);
$res = '';

switch($_POST['event']) {
    case 'whatWatch':
        foreach ($model->getFilmVideo() as $film) {
            $res .= echoFilm($film);
        }
        break;
    case 'actor':
        foreach ($model->getFilmByActor($_POST['name']) as $film) {
            $res .= echoFilm($film);
        }
        break;
    case 'new':
        foreach ($model->getFilmNew() as $film) {
            $res .= echoFilm($film);
        }
        break;
}

function echoFilm($film) {
    $res = '<li>Название: ' . $film['name'] . 
    ';<br> Дата выхода: ' . date('d.m.Y', strtotime($film['date'])) .
    ';<br> Страна: ' . $film['country'] .
    ';<br> Режисёр: ' . $film['director'] .
    ';<br> Носитель: ' . $film['carrier'] .
    ';<br> Актёры: ';
    foreach ($film['actors'] as $actor) {
        $res .= $actor['name'] . '; ';
    }
    $res .= '<br> Жанр: ';
    foreach ($film['genres'] as $genre) {
        $res .= $genre['title'] . '; ';
    }
    $res .= '</li><br>';
    return $res;
}

echo json_encode($res);
    
?>