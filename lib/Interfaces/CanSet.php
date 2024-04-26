<?php

namespace PHPNomad\Registry\Interfaces;

interface CanSet
{
    /**
     * @param string $id
     * @param callable(): object $value
     * @return void
     */
    public function set(string $id, callable $value);
}