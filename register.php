<?php
include('config/app.php');
include('codes/auth.php');
?>

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
    <div class="container">
        <h1 class="mt-5 d-flex flex-column align-items-center">Regisztráció</h1>
        <form class="mt-4 d-flex flex-column align-items-center" method="POST" action="">
            <div class="form-group w-50 mb-3">
                <label for="username">Felhasználónév</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="felhasználónév" required>
            </div>
            <div class="form-group w-50 mb-3">
                <label for="email">Email cím</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="joskapista@email.hu" required>
            </div>
            <div class="form-group w-50 mb-3">
                <label for="password">Jelszó</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="*******" required>
            </div>
            <div class="form-group w-50 mb-3">
                <label for="passwordConfirm">Jelszó megerősítése</label>
                <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" placeholder="*******" required>
            </div>
            <button type="submit" name="register_btn" class="btn btn-primary">Regisztráció</button>
        </form>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>