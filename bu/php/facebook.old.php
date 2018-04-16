<?php 
    require_once __DIR__ . '/facebook-sdk/autoload.php';
    
    $appId = '127401567785998';
    $appSecret = 'aca42c1d075bff458a11d5ba2e464aabO';

    $fb = new Facebook\Facebook([
        'app_id' => '127401567785998',
        'app_secret' => 'e39eb741ac812301245b365a3c5ee895',
        'default_graph_version' => 'v2.8',
    ]);

    $accessToken = '127401567785998|e39eb741ac812301245b365a3c5ee895';

try {
  $response = $fb->get('/groupecinkao/events', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

    echo json_encode($response->getDecodedBody()['data']);
?>