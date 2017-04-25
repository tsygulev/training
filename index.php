<?php

require_once './PaginationInterface.php';
require_once './Pagination.php';

$pagination = new Pagination(123, 7, $_GET['page'] ?? 1);

var_dump($pagination->render()); // [1, 2, 3, 4, 5, ....]
