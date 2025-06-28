<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>#ToDo</title>
    <link rel="stylesheet" href="/<?php echo basename(BASE_PATH); ?>/public/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="/<?php echo basename(BASE_PATH); ?>/home">Home</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="/<?php echo basename(BASE_PATH); ?>/dashboard">Dashboard</a>
                <a href="/<?php echo basename(BASE_PATH); ?>/profile">Profile</a>
                <a href="/<?php echo basename(BASE_PATH); ?>/logout">Logout (<?php echo htmlspecialchars($_SESSION['username']); ?>)</a>
            <?php else: ?>
                <a href="/<?php echo basename(BASE_PATH); ?>/login">Login</a>
                <a href="/<?php echo basename(BASE_PATH); ?>/register">Register</a>
            <?php endif; ?>
        </nav>
    </header>
    <main>
        <?php display_flash_messages(); ?>
