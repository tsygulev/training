<?php

interface PaginationInterface
{
    /**
     * Sets a limit of items per page.
     *
     * @param int $limit
     *
     * @return self
     */
    public function setLimit(int $limit): self;

    /**
     * Sets a count of total items.
     *
     * @param int $totalItems
     *
     * @return self
     */
    public function setTotalItems(int $totalItems): self;

    /**
     * Sets a current page number.
     *
     * @param int $currentPage
     *
     * @return self
     */
    public function setCurrentPage(int $currentPage): self;

    /**
     * @return array List of pagination pages
     */
    public function getPagesList(): array;
}
