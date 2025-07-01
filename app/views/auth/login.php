<?php include BASE_PATH . '/app/views/layouts/header.php'; ?>
<div class="login-container">
    <h2>Login</h2>
    <?php display_flash_messages(); ?>
    <form action="/<?php echo basename(BASE_PATH); ?>/login" method="POST">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="/<?php echo basename(BASE_PATH); ?>/register">Register here</a>.</p>
</div>
<?php include BASE_PATH . '/app/views/layouts/footer.php'; ?>