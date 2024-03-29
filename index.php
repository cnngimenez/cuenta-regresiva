<?php
$video_url = './videos/typing.mp4';
$msj = '';
$title = '';
$fin = '0,0,0,0,0';
$repeat='';

if (isset($_REQUEST['video'])){
    $video_url = $_REQUEST['video'];
}
if (isset($_REQUEST['msj'])){
    $msj = $_REQUEST['msj'];
    $title = $msj;
}
if (isset($_REQUEST['fin'])){
    $fin = $_REQUEST['fin'];
}
if (isset($_REQUEST['repeat'])) {
    $repeat = $_REQUEST['repeat'];
}

$fecha_fin = DateTime::createFromFormat('Y,m,d,H,i', $fin);
if (!$fecha_fin){
    $fecha_fin = new DateTime();
}

function next_date($curdate, $repeat){
    $int = DateInterval::createFromDateString($repeat);
    return $curdate->add($int);
}

$today = new DateTime();
if ($repeat != '' and  $fecha_fin < $today) {
    $fecha_fin = next_date($today, $repeat);
}

$fecha_js = $fecha_fin->format('Y') . ',' .
            $fecha_fin->format('m') . ' - 1,' .
            $fecha_fin->format('d,H,i');
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta content='text/html; charset=UTF-8' http-equiv='content-type'>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta content="Christian Gimenez, Pablo Kogan" name="author">
    <meta name="description" content="Cuenta regresiva. <?=$msj?>...">
    <meta content='' name='keywords'>
    
    <meta content='summary_large_image' name='twitter:card'>
    <meta content='Cuenta regresiva. <?=$msj?>...' name='twitter:title'>
    <meta content='Cuenta regresiva. <?=$msj?>...' name='twitter:description'>
    
    <meta content='' property='og:url'>
    <meta content='Cuenta regresiva. <?=$msj?>...' property='og:title'>
    <meta content='Cuenta regresiva. <?=$msj?>...' property='og:description'>
    <meta content='website' property='og:type'>
    
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="js/functions.js"></script>
    <title><?= $title ?></title>
    <link href="./css/index.css" rel="stylesheet">
  </head>
  <body>

    <video autoplay muted loop id="myVideo">
      <source src="<?= $video_url ?>" />
    </video>

    <div class="content">
      <div class="container" data-lead-id="section01-container">
        <div class="countdown-wrap" data-lead-id="countdown-wrap">
          <h3 class="count-headline"
              data-lead-id="countdown-headline">
            <?= $msj ?>
          </h3>
          <div class="tooltip">
            <ul class="countdown" data-lead-id="countdown">
              <li>
                <div class="flap">
                  <span id="days" class="days">03</span>
                </div>
                <p class="timeRefDays" data-lead-id="days">DIAS</p>
              </li>
              <li>
                <div class="flap">
                  <span id="hours" class="hours">15</span>
                </div>
                <p class="timeRefHours" data-lead-id="hours">HORAS</p>
              </li>
              <li>
                <div class="flap">
                  <span id="minutes" class="minutes">53</span>
                </div>
                <p class="timeRefMinutes" data-lead-id="minutes">MINUTOS</p>
              </li>
              <li>
                <div class="flap">
                  <span id="seconds" class="seconds">25</span>
                </div>
                <p class="timeRefSeconds" data-lead-id="seconds">SEGUNDOS</p>
              </li>
            </ul>
            <span class="tooltip-text"><?= $fecha_fin->format('r'); ?></span>
          </div>
          <div class="footer">
            <a href="https://github.com/cnngimenez/cuenta-regresiva">
              <img src="./imgs/pinned-octocat.svg" width="25px"
                   alt="Más info/Repo">
            </a>
            <a class="" href="create.html">Crear tu cuenta regresiva</a>
          </div>
        </div>

      </div>


    </div>

    <script>
     // Get the video
     var webinar=new Date(<?= $fecha_js ?>);
     
     var video = document.getElementById("myVideo");

     // Get the button
     var btn = document.getElementById("myBtn");

     // Pause and play the video, and change the button text
     function myFunction() {
         if (video.paused) {
             video.play();
             btn.innerHTML = "Pause";
         } else {
             video.pause();
             btn.innerHTML = "Play";
         }
     }

    </script>

  </body>
</html>
