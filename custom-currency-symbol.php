<?php

/**
 * Plugin Name: Custom Currency Symbol
 * Description: A simple plugin to change the currency symbol.
 * Version: 1.0
 * Author: Youssuf Abramo
 */

// Add the menu item in the WordPress dashboard
function custom_currency_symbol_menu()
{
  // ... (code for adding the menu item)
}
add_action('admin_menu', 'custom_currency_symbol_menu');

// Display the configuration page content
function custom_currency_symbol_page()
{
  // ... (code for displaying the configuration page)
}

// Register settings and add configuration fields
function custom_currency_symbol_settings()
{
  // ... (code for registering settings and adding fields)
}
add_action('admin_init', 'custom_currency_symbol_settings');

///////////////////////////////////

// Filter the currency symbol in WooCommerce
function custom_currency_symbol_filter($currency_symbol, $currency)
{
  // ... (code for filtering the currency symbol)
}
add_filter('woocommerce_currency_symbol', 'custom_currency_symbol_filter', 10, 2);

///////////////////////////////////////

// Activation hook
function custom_currency_symbol_activate()
{
  // ... (code to run on activation)
}
register_activation_hook(__FILE__, 'custom_currency_symbol_activate');
