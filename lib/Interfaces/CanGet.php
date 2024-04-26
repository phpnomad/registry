<?php

namespace PHPNomad\Registry\Interfaces;

interface CanGet
{
    /**
     * @param string $id
     * @return ?object
     */
    public function get(string $id): ?object;

    /**
     * Gets all items.
     *
     * @return array
     */
    public function getAll(): array;

    /**
     * Gets all keys
     *
     * @return string[]
     */
    public function getKeys(): array;
}