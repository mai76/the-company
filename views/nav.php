<?php session_start(); ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="dashboard.php" class="navbar-brand">
                The Company
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="profile.php" class="nav-link text-muted"><?= $_SESSION['username'] ?></a>
                </li>
                <li class="nav-item">
                    <a href="../actions/logout.php" class="nav-link text-danger">Log out</a>
                </li>
            </ul>
        </div>
    </nav>