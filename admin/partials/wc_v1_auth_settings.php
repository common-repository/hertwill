<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="hwsync">
    <div class="hwsync__description">
        <div class="hwsync__content">
            <h2 class="hwsync__description-title">Connect your Hertwill account to use the Hertwill + WooCommerce integration.</h2>
            <p class="hwsync__description-text">Hertwill offers excellent products via dropshipping model all you have to do is bring a customer to a store and convert and we will do the rest. Log in to authorize an account connection.</p>
            <p  class="hwsync__description-text">New to Hertwill and want to learn more? Check out our <a class="hwsync__description-link" href="https://hertwill.com/how-it-works" target="_blank">How to Integrate with WooCommerce guide.</a></p>
        </div>
        <div class="hwsync__logo">
            <img src="<?php echo esc_url(HERTWILL_URL); ?>admin/img/hw-sync.svg" width="252" height="190" alt="Hertwill integration">
        </div>
    </div>
    <div class="hwsync__btngroup">
        <a id="hwh_oauth_connect" class="hwsync__btn" href="https://hertwill.com/my-account/hertwill/?type=woocommerce">Connect Store</a>
    </div>
</div>