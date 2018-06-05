<?php

$from = new DateTime('-3 hour');
$to = new DateTime;

$interval = new DateInterval('PT1M');
$daterange = new DatePeriod($from, $interval, $to);

$dateArray = [];
$message = [];

$maxValue = rand(1,30);
foreach ($daterange as $date) {

    $message[] = ['data_value' => rand(0, $maxValue), 'data_label' => $date->format("Y-m-d H:i:s")];

}

echo json_response($message, 200, true);
exit(0);