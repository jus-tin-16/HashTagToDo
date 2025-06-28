<?php include BASE_PATH . '/app/views/layouts/header.php'; ?>
<!--  Dashboard page -->
<h2>Welcome to Your Dashboard, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h2>
<p>This is your personalized area.</p>
<p>Here you can add content related to your portfolio twist.</p>
<ul>
    <li><a href="/<?php echo basename(BASE_PATH); ?>/profile">View/Edit Profile</a></li>
</ul>
<?php include BASE_PATH . '/app/views/layouts/footer.php'; ?>
