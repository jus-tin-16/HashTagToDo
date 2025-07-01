<?php include BASE_PATH . '/app/views/layouts/header.php'; ?>
<div class="home-container">
    <h1>Welcome to #ToDo!</h1>
    <p>Your simple and efficient web application to manage all your tasks.</p>

    <?php if (!isset($_SESSION['user_Id'])): ?>
        <p>Ready to get organized?</p>
        <div class="home-actions">
            <a href="/<?php echo basename(BASE_PATH); ?>/login" class="button">Login</a>
            <a href="/<?php echo basename(BASE_PATH); ?>/register" class="button secondary-button">Register</a>
        </div>
    <?php else: ?>
        <p>You are currently logged in as <?php echo htmlspecialchars($_SESSION['name']); ?>.</p>
        <p>Ready to manage your tasks?</p>
        <div class="home-actions">
             <a href="/<?php echo basename(BASE_PATH); ?>/dashboard" class="button">Go to your Dashboard</a>
        </div>
    <?php endif; ?>
</div>
<?php include BASE_PATH . '/app/views/layouts/footer.php'; ?>