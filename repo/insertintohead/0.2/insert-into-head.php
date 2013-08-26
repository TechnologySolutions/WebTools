<?php

/*
  Plugin Name: Insert into HEAD
  Description: This plugin will insert any text you specify into the <HEAD> Helpful for custom scripts that you don't want on every page. Original idea from Fedmich Insert JS or CSS (http://fedche.com/) howver was very messy and didn't function safely.
  Author: Zac Bruce
  Author URI: http://kapacen.com
  URI: http://www.techs.co.nz
  Version: 0.2
  License: MIT (http://www.tldrlegal.com/license/mit-license)
 */

/*
  Changelog:
  0.2: Added techs url into array
  0.1: Initial version
*/
//define("INSERT_INTOHEAD", "0.1");

function insert_intohead() {
  if (is_single() or is_page()) {
    global $post;
    $post_id = $post->ID;
    $pcontent = $post->post_content;
    $use_img = 0;
    $head_insert = get_post_meta($post_id, 'headinsert', true);
    if ($head_insert) {
      $header_items[] = $head_insert;
    }

    if (!empty($header_items)) {
      array_unshift($header_items, '<!-- http://www.techs.co.nz -->');
      $header_items[] = '<!-- /http://www.techs.co.nz -->';

      $return_code = implode("\n", $header_items);
      echo $return_code . "\n";
    }
  }
}

add_action('wp_head', 'insert_intohead');