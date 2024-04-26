<?php

namespace PHPNomad\Registry\Traits;

namespace PHPNomad\Registry\Traits;

trait WithSet
{
    /** @var object[] */
    protected array $registry = [];

    /**
     * @param string $id
     * @param callable(): object $value
     * @return void
     */
    public function set(string $id, callable $value)
    {
        $this->registry[$id] = $value;
    }
}