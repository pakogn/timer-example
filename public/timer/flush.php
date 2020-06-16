<?php

require __DIR__.'/../../bootstrap/app.php';

use App\Handlers\DatabaseHandler;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    DatabaseHandler::flush();

    $_SESSION['status'] = 'Time Servers flushed successfuly.';

    header('Location: /timer');
    die;
}
