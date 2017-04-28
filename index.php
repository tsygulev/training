<?php

require_once './PaginationInterface.php';
require_once './Pagination.php';

$pagination = new Pagination(123, 7, 4);

$pagination->setLimit(8);
$pagination->setCurrentPage($_GET['page'] ?? 1);
$pagination->setTotalItems(89);

var_dump($pagination->render());
