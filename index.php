<?php

require_once './PaginationInterface.php';
require_once './Pagination.php';

$pagination = new Pagination(123, 7, 4);

$pagination->setCurrentPage($_GET['page'] ?? 1);
$pagination->setTotalItems(89);

echo '<pre>';
var_dump($pagination->getPagesList());
echo '</pre>';
