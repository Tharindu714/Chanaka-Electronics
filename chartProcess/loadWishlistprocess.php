<?php
include "../connection.php";

$resultSet = Database::search("SELECT `product`.`id`,`product`.`title`, COUNT(`recent`.`id`)AS `wishlists` FROM `recent`
INNER JOIN `product` ON `recent`.`product_id` = `product`.`id`
GROUP BY `product`.`id`,`product`.`title`
ORDER BY `wishlists` DESC");

$num = $resultSet ->num_rows;

$labels = array();
$data = array();

for($i = 0; $i <$num; $i++){
    $d = $resultSet->fetch_assoc();

    $labels[] = $d["title"];
    $data [] = $d ["wishlists"];
}

$json = array();
$json["labels"] = $labels;
$json["data"] = $data;

echo json_encode($json);