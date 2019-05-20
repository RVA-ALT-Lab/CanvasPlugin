<?php
/**
 * Plugin Name:     Canvas Plugin
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     This is a bare bones integration between Canvas and WordPress
 * Author:          Jeff Everhart
 * Author URI:      https://jeffreyeverhart.com
 * Text Domain:     CanvasPlugin
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         CanvasPlugin
 */

// Your code starts here.


function create_canvas_page($post_id) {

  $canvas_url = 'https://virginiacommonwealth.instructure.com';
  $canvas_api_token = '13092~yCVTnGJm1LloY6F7HaVEdMNGEtohRW0te4Ye8YWJ90ppgI2DWVKUuQ9gJnJT7bS4';

  $pages_url = '/api/v1/courses/13/pages';


  $wiki_page = array(
     'wiki_page' => array(
        'title' => '',
        'body' => '',
        'published' => false
     )
    );
  try {
    $post = get_post($post_id);
    if ($post->post_status == 'publish') {
      $post_title = get_the_title($post_id);
      $post_body = get_the_content($post_id);

      $wiki_page['wiki_page']['title'] = $post_title;
      $wiki_page['wiki_page']['body'] = $post->post_content;

      $url = $canvas_url . $pages_url . '?access_token='. $canvas_api_token;
      $args = array(
        'method' => 'POST',
        'body' => $wiki_page
      );
      $response = wp_remote_post($url, $args);
      var_dump($response);
    }
  } catch (Exception $exc) {
    var_dump($exc);
  }
}

// add_action('save_post', 'create_canvas_page');

function create_canvas_auth_page() {
  add_menu_page(
    'Canvas Auth',
    'Canvas Auth',
    'manage_options',
    'canvas-auth',
    'render_canvas_page',
    'dashicons-chart-pie'
  );
}


add_action('admin_menu', 'create_canvas_auth_page');

function render_canvas_page () {
  include dirname(__FILE__) . '/canvas-auth-page.php';
}