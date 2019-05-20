<h2>Canvas Auth Page</h2>
<h3>Here is some stuff</h3>
<p>Here is a paragraph</p>


<?php
  include dirname(__FILE__) . '/credentials.php';
  $canvas_url = sprintf($url, $canvas_client_id, $redirect_uri);
  var_dump($canvas_url);

?>
<?php echo 'Here is a string'; ?>
<a href="<?php echo $canvas_url; ?>">OAuth with Canvas</a>