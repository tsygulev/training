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
     * @var int
     */
    private $aroundStep = 2;

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
        $this->limit = $limit < 1 ? 1 : $limit;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setTotalItems(int $totalItems): \PaginationInterface
    {
        $this->totalItems = $totalItems < 0 ? 0 : $totalItems;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setCurrentPage(int $currentPage): \PaginationInterface
    {
        $this->currentPage = $currentPage < 1 ? 1 : $currentPage;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    /**
     * Sets a number of pages around current page.
     *
     * @param int $aroundStep
     *
     * @return self
     */
    public function setAroundStep(int $aroundStep): \Pagination
    {
        $this->aroundStep = $aroundStep < 0 ? 1 : $aroundStep;

        return $this;
    }

    /**
     * @return array
     */
    public function getPagesList(): array
    {
        $pagesCount = intval(ceil($this->totalItems / $this->limit));

        if ($pagesCount <= 1) {
            return [];
        }

        if ($pagesCount <= $this->aroundStep * 2) {
            return range(1, $pagesCount);
        }

        if ($this->currentPage > $pagesCount) {
            $this->currentPage = $pagesCount;
        }

        $pages = [];
        $leftLimit = $this->currentPage - $this->aroundStep;
        $rightLimit = $this->currentPage + $this->aroundStep;

        if ($leftLimit < 1) {
            $leftLimit = 1;
        }

        if ($rightLimit > $pagesCount) {
            $rightLimit = $pagesCount;
        }

        if ($leftLimit !== 1) {
            $pages[] = 1;
        }

        if ($leftLimit - $this->aroundStep >= 1) {
            $pages[] = null;
        }

        $pages = array_merge($pages, range($leftLimit, $rightLimit));

        if ($rightLimit + $this->aroundStep <= $pagesCount) {
            $pages[] = null;
        }

        if ($rightLimit !== $pagesCount) {
            $pages[] = $pagesCount;
        }

        return $pages;
    }
}
