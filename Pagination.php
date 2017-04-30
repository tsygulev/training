<?php

class Pagination implements PaginationInterface
{
    /**
     * @var int
     */
    private $limit;

    /**
     * @var int
     */
    private $totalItems;

    /**
     * @var int
     */
    private $currentPage;

    /**
     * @param int $totalItems
     * @param int $limit
     * @param int $currentPage
     */
    public function __construct(int $totalItems = 0, int $limit = 10, int $currentPage = 1)
    {
        $this->setTotalItems($totalItems);
        $this->setLimit($limit);
        $this->setCurrentPage($currentPage);
    }

    /**
     * {@inheritdoc}
     */
    public function setLimit(int $limit): \PaginationInterface
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setTotalItems(int $totalItems): \PaginationInterface
    {
        $this->totalItems = $totalItems;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setCurrentPage(int $currentPage): \PaginationInterface
    {
        $this->currentPage = $currentPage;

        return $this;
    }

    /**
     * @return array
     */
    public function getPagesList(): array
    {
        return range(1, ceil($this->totalItems / $this->limit));
    }
}
