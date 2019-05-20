<h2>Canvas Auth Page</h2>



<?php

  require_once './credentials.php';
  $canvas_url = sprintf("https://virginiacommonwealth.test.instructure.com/login/oauth2/auth?client_id=%s&response_type=code&redirect_uri=https://rampages.us", $canvas_client_id);
?>

<a href=<?php echo $canvas_url; ?>>OAuth with Canvas</a>