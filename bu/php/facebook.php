<?php 
    require_once __DIR__ . '/facebook-sdk/autoload.php';
    
    setlocale(LC_TIME, "fr_FR");

    $appId = '127401567785998';
    $appSecret = 'aca42c1d075bff458a11d5ba2e464aabO';

    $fb = new Facebook\Facebook([
        'app_id' => '127401567785998',
        'app_secret' => 'aca42c1d075bff458a11d5ba2e464aab',
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
    $data = $response->getDecodedBody()['data'];
    foreach ($data as $event) {
      // echo var_dump($event);
      echo '<li itemscope itemtype="http://schema.org/Event">';
      echo    '<div class="lead">';
      echo      '<meta itemprop="startDate" content="' . date("Y-m-d", strtotime($event['start_time'])) . '" />';
      echo      utf8_encode(strftime("%d %b %Y", strtotime($event['start_time'])));
      echo    '</div>';
      echo    '<div class="details">';
      echo      '<h1 itemprop="name">'. $event['place']['name'] .'</h1>';
      echo      '<p>';
      echo        '<span><i class="material-icons tiny">query_builder</i> À '. date("H", strtotime($event['start_time'])) .'h</span>';
      echo        '<br/>';
      echo        '<a href="https://www.facebook.com/events/' . $event["id"] . '" target="_blank"><i class="material-icons tiny">info_outline</i> Plus de détails</a>';
      echo      '</p>';
      echo    '</div>';
      echo '</li>';
    }

    // echo json_encode($response->getDecodedBody()['data']);
?>