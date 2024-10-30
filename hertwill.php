<?php
/**
 * Plugin Name: Hertwill
 * Plugin URI: https://hertwill.com/
 * Description: Hertwill companion plugin for managing your products
 * Version: 1.0.6
 * Author: Hertwill
 * Author URI: https://hertwill.com
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 6.3
 * Requires PHP: 7.4
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!defined('HERTWILL_URL')) {
    define('HERTWILL_URL', plugin_dir_url(__FILE__));
}

if (!defined('HERTWILL_PATH')) {
    define('HERTWILL_PATH', __DIR__ . '/');
}

if (!defined('HERTWILL_ADMIN')) {
    define('HERTWILL_ADMIN', admin_url());
}

if (!defined('HERTWILL_BASENAME')) {
    define('HERTWILL_BASENAME', plugin_basename(__FILE__));
}

// Get version number for cache busting from this file's header
if (!defined('HERTWILL_CURRENT_VERSION')) {
    $plugin_data = get_file_data(__FILE__, array('Version' => 'Version'), false);
    define('HERTWILL_CURRENT_VERSION', $plugin_data['Version']);
}

// Define icon as constant, WP only accepts base64 encoded SVG as menu icon
if (!defined('HERTWILL_ICON')) {
    define('HERTWILL_ICON', 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjM2IiBoZWlnaHQ9IjIzNiIgdmlld0JveD0iMCAwIDIzNiAyMzYiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxnIGNsaXAtcGF0aD0idXJsKCNjbGlwMF8xXzI3KSI+CjxtYXNrIGlkPSJtYXNrMF8xXzI3IiBzdHlsZT0ibWFzay10eXBlOmx1bWluYW5jZSIgbWFza1VuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeD0iMCIgeT0iMCIgd2lkdGg9IjIzNiIgaGVpZ2h0PSIyMzYiPgo8cGF0aCBkPSJNMjM2IDBIMFYyMzZIMjM2VjBaIiBmaWxsPSJ3aGl0ZSIvPgo8L21hc2s+CjxnIG1hc2s9InVybCgjbWFzazBfMV8yNykiPgo8cGF0aCBkPSJNMCAwVjIzNkgxNzdDMjA5LjU4OCAyMzYgMjM2IDIwOS41ODggMjM2IDE3N1YwSDBaTTkwLjE2ODcgMTUzLjk1M0g3Mi43NjM1VjEyMy4xNjJINDIuMzA0OVYxNTMuOTUzSDI0Ljg5OThWODEuMTI0OEg0Mi4zMDQ5VjEwOS4yNTFINzIuNzYzNVY4MS4xMjQ4SDkwLjE2ODdWMTUzLjk1M1pNMTkwLjkwMiAxNTMuOTUzSDE2OC4xMDRMMTU0LjUzNCA5Ny44MDE2SDE1NC4zMzFMMTQwLjU0OSAxNTMuOTUzSDExNy43NTFMOTYuNjEyNCA4MS4xMjQ4SDExNC4yMjlMMTI5LjI1NiAxMzcuNzkzSDEyOS40NTlMMTQzLjI0MSA4MS4xMjQ4SDE2NS41MTRMMTc5LjM5NyAxMzcuNzkzSDE3OS42TDE5NC4zMTMgODEuMTI0OEgyMTIuMDMxTDE5MC44OTMgMTUzLjk1M0gxOTAuOTAyWiIgZmlsbD0iIzlEQTFBNyIvPgo8L2c+CjwvZz4KPGRlZnM+CjxjbGlwUGF0aCBpZD0iY2xpcDBfMV8yNyI+CjxyZWN0IHdpZHRoPSIyMzYiIGhlaWdodD0iMjM2IiBmaWxsPSJ3aGl0ZSIvPgo8L2NsaXBQYXRoPgo8L2RlZnM+Cjwvc3ZnPgo=');
}

include(plugin_dir_path(__FILE__) . 'options.php');
