<?php
/**
 * Plugin Name:     CanvasPlugin
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     CanvasPlugin
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         CanvasPlugin
 */

// Your code starts here.


function create_canvas_page($post_id) {

  $canvas_url = 'https://yourdomain.instructure.com';
  $canvas_api_token = 'YourAPIKEYHERE';

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

add_action('save_post', 'create_canvas_page');



