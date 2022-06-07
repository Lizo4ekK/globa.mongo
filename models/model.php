<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

class Model {
    private $film;

    public function __construct() {
        $this->film = (new MongoDB\Client())->film_library->film;
    }

    public function getFilmVideo() {
        return $this->film->find(['carrier' => 'Видеокассета'])->toArray();
    }

    public function getActors() {
        return $this->film->distinct('actors');
    }

    public function getFilmByActor($name) {
        return $this->film->find(['actors' => ['name' => htmlspecialchars($name)]])->toArray();
    }

    public function getFilmNew() {
        return $this->film->find(['date' => ['$gte' => '2022-01-01']])->toArray();
    }
}

?>