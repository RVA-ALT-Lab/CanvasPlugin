<?php
class CanvasAuthentication {
  private $user;
  private $token;

  public function __construct() {

  }

  public function get_user() {
    return $this->get_user_from_options();
  }

  public function set_user($user, $access_token, $refresh_token) {
    $this->save_user_to_options($user, $access_token, $refresh_token);
  }

  private function get_user_from_options() {
    $user_id = get_current_user_id();
    $user_data = get_option('canvas_auth_'.$user_id);
    return $user_data;
  }
  private function save_user_to_options($user, $access_token, $refresh_token) {
    $user_id = get_current_user_id();
    $user_data = array(
      'name' => $user,
      'access_token' => $access_token,
      'refresh_token' => $refresh_token
    );
    update_option('canvas_auth_'.$user_id, $user_data);
  }
}