<?php

  require_once('vendor/autoload.php');
  $curl = new Curl\Curl();

  if (isset($_GET['request'])) {
    switch ($_GET['request']) {
      case 'donators':
        $curl->get('https://www.twitchalerts.com/api/donations', [
            "access_token" => "948F17D18A4A8EDCA350"
        ]); 
        $data = json_decode($curl->response, false);
        echo @json_encode($data->donations[end(array_keys($data->donations))]);
        die();
      break;

      case 'subscribers':
        $headers = [
            'Client-ID: dqdxuxx9lurdxu5qjkpn1fwv6f60q9n',
            'Authorization: OAuth fl7y3apprsmdic0aqgaoiueqht62er'
          ];
          $curl->setOpt(CURLOPT_HTTPHEADER, $headers);
          $curl->setOpt(CURLOPT_RETURNTRANSFER, TRUE);
          $curl->setOpt(CURLOPT_TIMEOUT, 3);
          $curl->get('https://api.twitch.tv/kraken/channels/atrocioucat/subscriptions/?direction=desc');
          $data = json_decode($curl->response)->subscriptions[0]->user;
          echo @json_encode($data);
        die();

      break;

    }
  }

?>

<!doctype html>
<html lang="fr" ng-app="atroHUD">
<head>
  <meta charset="UTF-8">
  <title>Atrocioucat</title>

  <!-- CSS FILES -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script src="./assets/js/application.js"></script>

</head>
<body>

  <div class="overlay">

    <div class="subscribers" ng-controller="SubscribersCtrl">
      <i class="icon">
        <img src="./assets/images/icons/icon_subscriber.png" width="35px" height="35px">
      </i>  {{subscriber.display_name}}
    </div>

    <div class="donators" ng-controller="DonatorsCTRL">
      <i class="icon">
        <img src="./assets/images/icons/icon_donator.png" width="35px" height="35px">
      </i>  {{donator.donator.name}}:  {{donator.amount_label}}
    </div>
<div class="explora">
<img src="./assets/images/Exploraville.png" width="100%" height="100%">

</div>
  </div>


</body>
</html>