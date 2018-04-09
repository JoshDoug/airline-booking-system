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
        <div class="menu">
            <div><a href="basket.php">Basket</a></div>
            <?php if ($authenticated) : ?>
                <div><a href="user.php">Profile</a></div>
                <div><a href="logout.php">Logout</a></div>
            <?php else : ?>
                <div><a href="login.php">Login</a></div><!-- Could be removed if we're going to keep the login form -->
            <?php endif ?>
            <div><a href="register.php">Register</a></div>
        </ul>
        </div>
    </nav>

</header>