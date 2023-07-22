<?php

class DiscountMenu
{

    public function __construct()
    {
        add_action('admin_menu', [$this, 'add_menu']);
    }

    public function add_menu()
    {
        add_menu_page(
            'Global Discount',
            __('Global Discount', 'wc-global-discount'),
            'manage_options',
            'global_discount',
            [$this, 'global_discount_callback'],
            'dashicons-database-import',
            '2'
        );
    }

    public function global_discount_callback()
    {
        $message = '';
        $discount_percentage = intval($_POST['discount']);
        if ($discount_percentage > 100) {
            $message = 'Discount percentage is invalid';
        }elseif($discount_percentage !== 0){
            update_option('discount_percentage', $discount_percentage);
        }
?>
        <h1>Setting</h1>
        <?php if($message){?>
            <div style='background: red;text-align: center;padding: 16px;color: #fff;margin-bottom: 10px;font-size: 17px;'><?= $message ?> </div>
            <?php
        }
            ?>
        <form method="POST" class='discount-form'>
            <label>: Enter Discount Percentage</label>
            <input type="number" value="<?= get_option('discount_percentage') ?>" maxlength="100" name='discount'>
            <input type='submit' value='Apply'>
        </form>
<?php
}
}
new DiscountMenu();
