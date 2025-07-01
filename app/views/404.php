<?php include BASE_PATH . '/app/views/layouts/header.php'; ?>
<div class="login-container error-page-container">
    <h1 class="error-code">404</h1>
    <h2>Page Not Found</h2>
    <p>Oops! The page you're looking for doesn't exist.</p>
    <p>It might have been moved or deleted.</p>
    <div class="error-actions">
        <a href="/<?php echo basename(BASE_PATH); ?>/home" class="button">Go to Homepage</a>
        <a href="javascript:history.back()" class="button secondary-button">Go Back</a>
    </div>
</div>
<?php include BASE_PATH . '/app/views/layouts/footer.php'; ?>