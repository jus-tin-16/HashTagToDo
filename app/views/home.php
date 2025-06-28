<?php include BASE_PATH . '/app/views/layouts/header.php'; ?>
<h1>Welcome #ToDo!</h1>
<p>This is a simple web application for to do list.</p>
<?php if (!isset($_SESSION['user_id'])): ?>
    <p>Please <a href="/<?php echo basename(BASE_PATH); ?>/login">login</a> or <a href="/<?php echo basename(BASE_PATH); ?>/register">register</a> to get started.</p>
<?php else: ?>
    <p>You are logged in as <?php echo htmlspecialchars($_SESSION['username']); ?>. Go to your <a href="/<?php echo basename(BASE_PATH); ?>/dashboard">dashboard</a>.</p>
<?php endif; ?>
<?php include BASE_PATH . '/app/views/layouts/footer.php'; ?>