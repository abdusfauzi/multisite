<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/*
* Plugin Name: Multisite
* Description: A multisite plugin for WordPlate.
* Author: WordPlate
* Author URI: https://wordplate.github.io
* Version: 1.0.0
* Plugin URI: https://github.com/wordplate/multisite
*/

declare(strict_types=1);

namespace WordPlate\Multisite;

/**
 * Fix network admin URL to include the '/wordpress/' base.
 *
 * @see https://core.trac.wordpress.org/ticket/23221
 *
 * @param string $url
 *
 * @return string
 */
function multisite(string $url): string
{
    if (!is_multisite()) {
        return $url;
    }

    $urls_to_fix = [
        'wp-admin',
        'wp-login.php',
        'wp-activate.php',
        'wp-signup.php',
    ];

    $directory = env('WP_DIR', 'wordpress');

    foreach ($urls_to_fix as  $maybe_fix_url) {
        $fixed_wp_url = '/'.$directory.'/'.$maybe_fix_url;

        if (false !== stripos($url, $maybe_fix_url) && false === stripos($url, $fixed_wp_url)) {
            $url = str_replace($maybe_fix_url, $fixed_wp_url, $url);
        }
    }

    return $url;
}

add_filter('network_site_url', __NAMESPACE__.'\\multisite', 99);
add_filter('site_url', __NAMESPACE__.'\\multisite', 99);
add_filter('admin_url', __NAMESPACE__.'\\multisite', 99);
add_filter('network_admin_url', __NAMESPACE__.'\\multisite', 99);
