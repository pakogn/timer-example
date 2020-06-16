<?php

require __DIR__.'/../../bootstrap/app.php';

use App\Models\TimeServer;

session_start();

$timeServer = TimeServer::first();

// If We have flashed status to the session We need to manage it.
if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
    unset($_SESSION['status']);
}

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="A simple solution for a timer.">
        <meta name="author" content="Francisco Daniel">

        <title>Timer</title>

        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="/assets/css/app.css">
    </head>
    <body class="bg-light">
        <div class="container h-100">
            <?php if (isset($status)): ?>
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <strong>Success!</strong> <?php echo $status ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif?>
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-12 text-center">
                    <p>A simple solution for a timer.</p>
                    <h1 class="timer"> data-timestmap="<?php echo $timeServer->date ?>">05:00</h1>
                    <div class="row">
                        <div class="col-md-8 offset-md-2 mb-5">
                            <button onclick="Timer.pause()" class="pause-button btn btn-primary" type="button"><i class="fa fa-pause"></i> Pause</button>
                            <button onclick="Timer.play()" class="play-button btn btn-success" type="button"><i class="fa fa-play"></i> Continue</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; <?php echo Date('Y') ?> <a href="https://daniel.garcianoriega.com" target="_blank" rel="noopener">Francisco Daniel</a></p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="https://github.com/pakogn" target="_blank" rel="noopener">GitHub</a></li>
                <li class="list-inline-item"><a href="https://www.linkedin.com/in/franciscodaniel" target="_blank" rel="noopener">LinkedIn</a></li>
            </ul>
        </footer>

        <script src="/assets/js/jquery-3.2.1.slim.min.js"></script>
        <script src="/assets/js/popper.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/moment-with-locales.js"></script>
        <script src="/assets/js/app.js"></script>
        <script type="text/javascript">
            Timer.initialize();
        </script>
    </body>
</html>
