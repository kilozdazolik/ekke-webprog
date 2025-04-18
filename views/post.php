<?php
require_once '../config/database.php';
require_once '../models/Post.php';
require_once '../models/Comment.php';
require_once '../controllers/CommentController.php';
require_once '../helpers/functions.php';
require_once '../config/init.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$postId = (int) $_GET['id'];
$userId = $_SESSION['user_id'] ?? null;

$database = new Database();
$dbConnection = $database->connect();

$postModel = new Post($dbConnection);
$post = $postModel->getPostById($postId);

if (!$post) {
    header('Location: index.php');
    exit;
}

$commentController = new CommentController($dbConnection);

$order = isset($_GET['sort']) && $_GET['sort'] === 'oldest' ? 'ASC' : 'DESC';
$comments = $commentController->getComments($postId, $order);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
    if ($userId) {
        $content = trim($_POST['comment']);
        $commentController->addComment($postId, $userId, $content);
        header("Location: post.php?id=" . $postId);
        exit;
    } else {
        echo "Be kell jelentkezned a kommenteléshez.";
    }
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= htmlspecialchars($post['title']) ?> - Válaszok</title>
    <link rel="stylesheet" href="../public/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <?php include('../includes/navbar.php'); ?>
    <div class="container main">
        <div class="card text-center mt-3 mb-3">
            <div class="card-header"><?= htmlspecialchars($post['username']) ?></div>
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($post['title']) ?></h5>
                <p class="card-text"><?= nl2br(htmlspecialchars($post['description'])) ?></p>
            </div>
            <div class="card-footer text-body-secondary"><?= timeAgo($post['created_at']) ?></div>
        </div>

        <?php if ($userId): ?>
            <p>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Válasz írása
                </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <form class="p-3" method="POST" action="">
                        <div class="mb-3">
                            <label for="comment" class="form-label">Válasz</label>
                            <textarea class="form-control" id="comment" name="comment" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Küldés</button>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning mt-3">
                Be kell jelentkezned a válasz íráshoz. <a href="login.php" class="alert-link">Bejelentkezés</a>
            </div>
        <?php endif; ?>

        <h3>Válaszok</h3>
        <?php if (empty($comments)): ?>
            <p>Még nincs válasz.</p>
        <?php else: ?>
            <form method="GET" action="post.php">
                <input type="hidden" name="id" value="<?= $postId ?>">
                <select name="sort" onchange="this.form.submit()">
                    <option value="newest" <?= $order == 'DESC' ? 'selected' : '' ?>>Legújabb</option>
                    <option value="oldest" <?= $order == 'ASC' ? 'selected' : '' ?>>Legrégebbi</option>
                </select>
            </form>
            <?php foreach ($comments as $comment): ?>
                <div class="card mt-3 mb-3">
                    <div class="card-header"><?= htmlspecialchars($comment['username']) ?></div>
                    <div class="card-body">
                        <p class="card-text"><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                    </div>
                    <div class="card-footer text-muted"><?= timeAgo($comment['created_at']) ?></div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>