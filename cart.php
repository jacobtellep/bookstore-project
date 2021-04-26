<!-- cart -->
<div class="cart-overlay">

    <div class="cart">
        <span class="close-cart">
            <i class="fas fa-window-close"></i>
        </span>
        <span style="position: absolute; top:0; right:0; margin-top: 25px; margin-right: 25px;"><button style="width: 165px; font-size: x-small; text-align:center;" class="clear-cart banner-btn">clear</button></span>
        <h2 style=" margin-top: 45px;">your cart</h2>
        <hr style="color: darkgray;">

        <!-- cart is rendered conditionally on if the user has added any items to his cart here -->
        <div class="cart-content">

        </div>
        <div class="cart-footer">
            <h3>your total: $<span class="cart-total">0</span></h3>
            <hr style="color: darkgray;">
            <span style="position: absolute; right:0; margin-top: 25px; margin-right: 25px;">
                <form method="POST" action="checkout.php" enctype="multipart/form-data">
                    <script>
                        // checkout variable holds the cart thats stored in local storage
                        let checkout = localStorage.getItem('cart')
                    </script>
                    <input style="visibility:hidden" id="checkout-info" name="checkout-info">
                    <button id="checkout-btn" name="checkout-btn" style="text-decoration: none; font-size: x-small; text-align:center;" class="clear-cart banner-btn">checkout</button>
                </form>

            </span>
        </div>
    </div>
</div>
<!-- end of cart -->