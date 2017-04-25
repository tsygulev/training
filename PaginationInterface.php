<?php

interface PaginationInterface
{
    /**
     * @return array List of pagination pages.
     */
    public function render();
}
