<nav class="navbar" id="top">
    <div class="navbar-left" style=" width: fit-content;">
        <a href="index.php#top" style="text-decoration: none; font-weight: bold; color: black; padding-right: 10px; padding-left: 25px;">HOME</a>
        <a href="index.php#books" style="text-decoration: none; font-weight: bold; color: black; padding-right: 10px;">SHOP</a>
        <a href="about.php" style="text-decoration: none; font-weight: bold; color: black; padding-right: 10px;">ABOUT</a>
        <a href="contact.php" style="text-decoration: none; font-weight: bold; color: black; padding-right: 10px;">CONTACT</a>
        <a href="<?php include("conditional-route.php") ?>" style="text-decoration: none; font-weight: bold; color: black; padding-right: 400px;"><?php include('conditional-btn-name.php') ?></a>

    </div>
    <div class="navbar-center">
        <a href="index.php"><img src="./images/jakes-bookstore.svg" alt="logo"></a>
        <div class="cart-btn">
            <span class="nav-icon">
                <i class="fas fa-cart-plus"></i>
            </span>
            <div class="cart-items">0</div>
        </div>
    </div>
</nav>