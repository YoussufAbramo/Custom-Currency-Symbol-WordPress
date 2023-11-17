<?php

/**
 * Plugin Name: Custom Currency Symbol
 * Description: A simple plugin to change the currency symbol.
 * Version: 1.0
 * Author: Youssuf Abramo
 */



// Inside custom-currency-symbol.php, after the plugin information

// Add the menu item in the WordPress dashboard
function custom_currency_symbol_menu()
{
  add_options_page(
    'Custom Currency Symbol Settings',
    'Currency Symbol',
    'manage_options',
    'custom_currency_symbol',
    'custom_currency_symbol_page'
  );
}
add_action('admin_menu', 'custom_currency_symbol_menu');

// Display the configuration page content
function custom_currency_symbol_page()
{
?>
  <div class="wrap">
    <h2>Custom Currency Symbol Settings</h2>
    <form method="post" action="options.php">
      <?php
      settings_fields('custom_currency_symbol_settings');
      do_settings_sections('custom_currency_symbol');
      submit_button();
      ?>
    </form>
  </div>
<?php
}


// Inside custom-currency-symbol.php, after the previous code

// Register settings
function custom_currency_symbol_settings()
{
  register_setting('custom_currency_symbol_settings', 'custom_currency_symbol');
  add_settings_section(
    'custom_currency_symbol_section',
    'Custom Currency Symbol',
    'custom_currency_symbol_section_callback',
    'custom_currency_symbol'
  );
  add_settings_field(
    'custom_currency_symbol_field',
    'Enter Custom Currency Symbol:',
    'custom_currency_symbol_field_callback',
    'custom_currency_symbol',
    'custom_currency_symbol_section'
  );
}
add_action('admin_init', 'custom_currency_symbol_settings');

// Section callback
function custom_currency_symbol_section_callback()
{
  echo 'Enter your custom currency symbol below:';
}

// Field callback
function custom_currency_symbol_field_callback()
{
  $symbol = get_option('custom_currency_symbol');
  echo "<input type='text' name='custom_currency_symbol' value='$symbol' />";
}


// Inside custom-currency-symbol.php, after the previous code

// Filter the currency symbol in WooCommerce
function custom_currency_symbol_filter($currency_symbol, $currency)
{
  $custom_symbol = get_option('custom_currency_symbol');
  return !empty($custom_symbol) ? $custom_symbol : $currency_symbol;
}
add_filter('woocommerce_currency_symbol', 'custom_currency_symbol_filter', 10, 2);
