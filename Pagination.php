<?php

class Pagination implements PaginationInterface
{
    /**
     * @var int
     */
    private $firstPage = 1;

    /**
     * @var int
     */
    private $endPage;

    /**
     * @param int $total
     * @param int $limit
     * @param int $currentPage
     */
    public function __construct(int $total, int $limit, int $currentPage)
    {
        $this->endPage = ceil($total / $limit);
    }

    /**
     * @return array
     */
    public function render(): array
    {
        return range($this->firstPage, $this->endPage);
    }
}
