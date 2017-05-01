<?php
require_once './PaginationInterface.php';
require_once './Pagination.php';

$pagination = new Pagination(123, 7, (int) $_GET['page'] ?? 1);
?>
<!DOCTYPE HTML>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title>Pagination</title>
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h1>Pagination</h1>

            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php foreach ($pagination->getPagesList() as $page): ?>
                        <?php if (is_numeric($page)): ?>
                            <li class="<?php echo $page === $pagination->getCurrentPage() ? 'active' : '' ?>">
                                <a href="/?page=<?php echo $page ?>"><?php echo $page ?></a>
                            </li>
                        <?php else: ?>
                            <li class="disabled">
                                <span>...</span>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </body>
</html>
