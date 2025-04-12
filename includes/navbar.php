<?php session_start(); ?>
<nav class="navbar sticky-top bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">
            <img src="../public/images/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            Kérdésbázis
        </a>
        <div class="justify-content-end">
            <?php if (isset($_SESSION['username'])): ?>
                <span class="navbar-text text-light me-2">Üdv, <?= htmlspecialchars($_SESSION['username']) ?>!</span>
                <a class="btn btn-primary me-2" type="button" href="../views/login.php">Új bejegyzés</a>
                <a class="btn btn-danger" href="../controllers/Logout.php">Kijelentkezés</a>
            <?php else: ?>
                <a class="btn btn-secondary me-2" type="button" href="../views/login.php">Bejelentkezés</a>
                <a class="btn btn-primary me-2" type="button" href="../views/register.php">Regisztráció</a>
            <?php endif; ?>
        </div>
    </div>
</nav>