<?php

namespace PHPNomad\Registry\Traits;

use PHPNomad\Utils\Helpers\Arr;

trait WithGet
{
    /** @var array<string, object|null|callable> */
    protected array $registry = [];
    private array $initialized = [];

    /**
     * @param string|int $id
     * @return ?object
     */
    public function get($id): ?object
    {
        $item = Arr::get($this->registry, $id);

        if (is_null($item)) {
            return null;
        }

        // This logic ensures that registry items that resolve to
        if (is_callable($item) && !isset($this->initialized[$id])) {
            $this->registry[$id] = $item();
            $this->initialized[$id] = true;
        }

        return $this->registry[$id];
    }

    /** @inheritDoc */
    public function getAll(): array
    {
        $result = [];
        foreach ($this->registry as $key => $value) {
            $result[$key] = $this->get($key);
        }

        return $result;
    }

    /**
     * @return string[]
     */
    public function getKeys(): array
    {
        return array_keys($this->registry);
    }
}