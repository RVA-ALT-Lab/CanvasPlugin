<h2>Canvas Auth Page</h2>
<h3>Here is some stuff</h3>
<p>Here is a paragraph</p>


<?php
  $credential_json_string = file_get_contents(dirname(__FILE__).'/credentials.json');
  $credentials = json_decode($credential_json_string, true);
  $redirect_uri = get_site_url() . '/wp-admin?page=canvas-auth';
  $canvas_url = sprintf($credentials['url'], $credentials['canvas_client_id'], $redirect_uri);
  var_dump($credentials);

?>
<?php echo 'Here is another test'; ?>
<a href="<?php echo $canvas_url; ?>">OAuth with Canvas</a>