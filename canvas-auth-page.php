<h2>Canvas Auth Page</h2>
<h3>Here is some stuff</h3>
<p>Here is a paragraph</p>


<?php
  include dirname(__FILE__) . '/class-canvas-auth.php';
  $canvas_authentication = new CanvasAuthentication();

  $credential_json_string = file_get_contents(dirname(__FILE__).'/credentials.json');
  $credentials = json_decode($credential_json_string, true);
  $redirect_uri = get_site_url() . '/wp-admin?page=canvas-auth-success';
  $canvas_url = sprintf($credentials['baseURL'] . $credentials['oAuthLoginPath'], $credentials['canvas_client_id'], $redirect_uri);

  $user = $canvas_authentication->get_user();
  if ($user) {
    var_dump($user);
  }

?>
<a class="button button-primary" href="<?php echo $canvas_url; ?>">OAuth with Canvas</a>