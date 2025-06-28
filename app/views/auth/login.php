PHP
<?php include BASE_PATH . '/app/views/layouts/header.php'; ?>
<h2>Login</h2>
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
<?php include BASE_PATH . '/app/views/layouts/footer.php'; ?>