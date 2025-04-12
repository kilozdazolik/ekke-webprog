<?php include('config/app.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap demo</title>
  <link rel="stylesheet" href="./public/style.css">
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
    crossorigin="anonymous" />
</head>

<body class="bg-light">
  <?php include('./includes/navbar.php'); ?>
  <div class="container main">
    <div class="card text-center mt-3 mb-3">
      <div class="card-header">
        zöldsas29
      </div>
      <div class="card-body">
        <h5 class="card-title">Mikor fog a fradi bajnokságot nyerni?</h5>
        <p class="card-text">Nos az a helyzet, hogy nekem kéne a fradi kupa mive.....</p>
        <a href="#" class="btn btn-primary">Megtekintés</a>
      </div>
      <div class="card-footer text-body-secondary">
        2 perce
      </div>

    </div>
    <div class="card text-center">
      <div class="card-header">
        baleentfitness
      </div>
      <div class="card-body">
        <h5 class="card-title">hogyan tudnék több követőt szerezni?</h5>
        <p class="card-text">haverjaim nem hiszik el, hogy én nagy fitnesses vagyo...</p>
        <a href="#" class="btn btn-primary">Megtekintés</a>
      </div>
      <div class="card-footer text-body-secondary">
        10 perce
      </div>
    </div>
  </div>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
</body>

</html>