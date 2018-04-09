<?php
if (isset($_SESSION['authenticatedUser'])) {
    $customer = getCustomerByEmail($_SESSION['authenticatedUser']);
    $authenticated = true;
} else {
    $authenticated = false;
}
?>
<header>
    <h1><a href="index.php">Fly Guys</a></h1>
    <nav>
        <?php if ($authenticated) : ?>
            <p><?= $customer->firstName ?></p>
        <?php endif ?>
        <a href="basket.php">Basket</a>
        <?php if ($authenticated) : ?>
            <a href="user.php">Profile</a>
            <a href="logout.php">Logout</a>
        <?php else : ?>
            <a href="login.php">Login</a>
        <?php endif ?>
        <a href="register.php">Register</a>
    </nav>
</header>