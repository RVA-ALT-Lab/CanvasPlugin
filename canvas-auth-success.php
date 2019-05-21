<h2>Successful Canvas Auth Page</h2>


<?php
  $credential_json_string = file_get_contents(dirname(__FILE__).'/credentials.json');
  $credentials = json_decode($credential_json_string, true);

  $canvas_oauth_code = $_GET['code'];
  if (isset($canvas_oauth_code) && strlen($canvas_oauth_code) > 1) {
    // do the stuff to generate a token here
    $oauth_params = array(
      'grant_type' => 'authorization_code',
      'client_id' => $credentials['canvas_client_id'],
      'client_secret' => $credentials['canvas_client_secret'],
      'code' => $canvas_oauth_code,
      'redirect_uri' => get_site_url().'/wp-admin?page=canvas-auth-success'
    );

    $result = wp_remote_post($credentials['baseURL'] . $credentials['oAuthTokenPath'], array(
      'method' => 'POST',
      'body' => $oauth_params
    ));

    echo $result['body'];

  } else {
    echo 'Code is not set, so can\'t do OAuth';
  }
?>