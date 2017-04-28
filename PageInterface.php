<?php

interface PageInterface
{
    /**
     * @return bool Returns TRUE - if its dots, otherwise - FALSE
     */
    public function isDots(): bool;

    /**
     * @return bool Returns TRUE - if its current page, otherwise - FALSE
     */
    public function isActive(): bool;

    /**
     * @return int The page number
     */
    public function getNumber(): int;
}
