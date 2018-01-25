<?PHP
require_once __DIR__ . '/vendor/autoload.php'; // change path as needed

$access_token = "EAAFtFl39JV4BAKjUUVX9ijRnwD5rZBUrEkUf297ixWZAS1zu5kPSSWYv1ImKypDNSxQIPmNzWOo0q3U6YBvBsnKbT0ZBs1ogQVdPqpEzZB6CtuyDe4my0XSBuGMp6vFBZAq4ygAcpYAR4fBm1dnVw16zrQxAWaiiMGzeFeFVN5q4pmp2eSBZAcpypkKALywAYA0yQyZCHzQbgZDZD";

$fb = new \Facebook\Facebook([
  'app_id' => '401417810290014',
  'app_secret' => '08ab9f4b3e74440a242015acc1c0b7d7',
  'default_graph_version' => 'v2.10',
  //'default_access_token' => '{access-token}', // optional
]);

// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
//   $helper = $fb->getRedirectLoginHelper();
//   $helper = $fb->getJavaScriptHelper();
//   $helper = $fb->getCanvasHelper();
//   $helper = $fb->getPageTabHelper();

//$helper = $fb->getRedirectLoginHelper(); 

try {
  // Get the \Facebook\GraphNodes\GraphUser object for the current user.
  // If you provided a 'default_access_token', the '{access-token}' is optional.
  $response = $fb->get('/me', $access_token);
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();
echo 'Name:' . $me->getName() .', ID:' .  $me->getId();
?>
