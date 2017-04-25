<?php

class Pagination implements PaginationInterface
{
    public function render(): array
    {
        return [1, 2, 3, 4, 5, 6, 7];
    }
}
