<?php
require_once '../controllers/PostController.php';
require_once '../helpers/functions.php';

$controller = new PostController();
$posts = $controller->getAllPosts();
?>

<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kérdésbázis</title>
  <link rel="stylesheet" href="../public/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous" />
</head>

<body class="bg-light">
  <?php include('../includes/navbar.php'); ?>
  <div class="container main">
    <?php foreach ($posts as $post): ?>
      <div class="card text-center mt-3 mb-3">
        <div class="card-header">
          <?= htmlspecialchars($post['username']) ?>
        </div>
        <div class="card-body">
          <h5 class="card-title"><?= htmlspecialchars($post['title']) ?></h5>
          <p class="card-text"><?= htmlspecialchars($post['description']) ?></p>
          <a href="./post.php?id=<?= urlencode($post['id']) ?>" class="btn btn-primary">Megtekintés</a>

        </div>
        <div class="card-footer text-body-secondary">
          <?= timeAgo($post['created_at']) ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
</body>

</html>