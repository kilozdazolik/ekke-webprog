<?php
require_once '../controllers/UserController.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login-btn'])) {
    $controller = new UserController();
    $errors = $controller->login($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="../public/style.css">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
        crossorigin="anonymous" />
</head>

<body class="bg-light">
    <?php include('../includes/navbar.php'); ?>
    <div class="container">
        <h1 class="mt-5 d-flex flex-column align-items-center">Bejelentkezés</h1>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger w-50 mx-auto">
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form class="mt-4 d-flex flex-column align-items-center" method="POST" action="">
            <div class="form-group w-50 mb-3">
                <label for="username">Felhasználónév</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="felhasználónév">
            </div>
            <div class="form-group w-50 mb-3">
                <label for="password">Jelszó</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="*******">
            </div>
            <button type="submit" name="login-btn" class="btn btn-primary">Belépés</button>
        </form>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>