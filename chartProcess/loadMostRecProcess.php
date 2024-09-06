<?php
include "../connection.php";

$resultSet = Database::search("SELECT `feedback`.`type`, COUNT(`feedback`.`feed_id`)AS `total_review` FROM `feedback`
INNER JOIN `product` ON `feedback`.`product_id` = `product`.`id`
WHERE `feedback`.`type` IN(5,4,3,2,1) GROUP BY `feedback`.`type` ORDER BY `total_review` DESC");

$num = $resultSet ->num_rows;

$labels = array();
$data = array();

for($i = 0; $i <$num; $i++){
    $d = $resultSet->fetch_assoc();

    $labels[] = $d["type"];
    $data [] = $d ["total_review"];
}

$json = array();
$json["labels"] = $labels;
$json["data"] = $data;

echo json_encode($json);