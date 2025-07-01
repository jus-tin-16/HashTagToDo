<?php include BASE_PATH . '/app/views/layouts/header.php'; ?>
<div class="login-container profile-page-container">
    <h2>Your Profile</h2>
    <?php if (isset($_SESSION['user_Id'])): ?>
        <div class="profile-info">
            <p><strong>Name:</strong> <?php echo htmlspecialchars($_SESSION['name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
            <!-- You can add more profile details here -->
        </div>
        <div class="profile-actions">
            <a href="#" class="button">Edit Profile (Coming Soon)</a>
            <!-- Or a link to a dedicated edit profile page -->
        </div>
    <?php else: ?>
        <p>You need to be logged in to view your profile.</p>
        <div class="profile-actions">
            <a href="/<?php echo basename(BASE_PATH); ?>/login" class="button">Login</a>
            <a href="/<?php echo basename(BASE_PATH); ?>/register" class="button secondary-button">Register</a>
        </div>
    <?php endif; ?>
</div>
<?php include BASE_PATH . '/app/views/layouts/footer.php'; ?>