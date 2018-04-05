<?php
if (isset($_SESSION['authenticatedUser'])) {
    $customer = getCustomerByEmail($_SESSION['authenticatedUser']);
    $authenticated = true;
}
?>
<header>
    <h1><a href="index.php">Fly Guys</a></h1>
    <!-- Change this as necessary but keep the links -->
    <nav>
        <?php if ($authenticated) : ?>
            <p><?= $customer->firstName ?></p>
        <?php endif ?>
        <ul>
            <li><a href="basket.php">Basket</a></li>
            <?php if ($authenticated) : ?>
                <li><a href="user.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php else : ?>
                <li><a href="login.php">Login</a></li><!-- Could be removed if we're going to keep the login form -->
            <?php endif ?>
            <li><a href="register.php">Register</a></li>
        </ul>
    </nav>
    <!-- Ensure links work -->
</header>