<?php include BASE_PATH . '/app/views/layouts/header.php'; ?>
<div class="login-container">
    <h2>Register</h2>
    <?php display_flash_messages(); ?>
    <form action="/<?php echo basename(BASE_PATH); ?>/register" method="POST">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="/<?php echo basename(BASE_PATH); ?>/login">Login here</a>.</p>
</div>
<?php include BASE_PATH . '/app/views/layouts/footer.php'; ?>