<?php

namespace PHPNomad\Registry\Traits;

trait WithDelete
{
    /** @var object[] */
    protected array $registry = [];

    /**
     * @param string|int $id
     * @return void
     */
    public function delete($id): void
    {
        unset($this->registry[$id]);
    }
}