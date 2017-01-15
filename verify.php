<?php
$access_token = 'Bb80WnPZ0Gtp6Mu+P7IrcvgE5Hgfhim2bgG5EFZYhc3fSxaAs03zuCCrKH/2reCt+Ykplb3CsSuWIrG6lrtg8d5DUf8CL5G5H39qOuPI44//f9ypA57DnNbryDuRwhKS5tp2du/bQcze1dVmo/kf4wdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;