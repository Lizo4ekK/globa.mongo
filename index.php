<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/model.php';
$model = new Model();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Library</title>
</head>
<body>
    <div>
        <button id="what-watch">Что посмотреть на видеокассетах?</button>
        <ul id="list-what-watch"></ul>
    </div>
    <div>
        <label for="actor">Актёр: </label>
        <select id="actor">
            <option value="" selected disabled>Не выбрано</option>
            <? foreach ($model->getActors() as $actor) { ?>
            <option value="<?= $actor['name'] ?>"><?= $actor['name'] ?></option>
            <? } ?>
        </select>
        <ul id="list-actor"></ul>
    </div>
    <div>
        <button id="new">Новинки!</button>
        <ul id="list-new"></ul>
    </div>

    <script src="script.js" defer></script>
</body>
</html>