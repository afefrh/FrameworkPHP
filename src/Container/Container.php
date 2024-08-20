<?php

namespace App\Container;

use App\Container\Exceptions\NotFoundException;

class Container
{
    private array $definitions = [];
    private array $resolvedEntries = [];

    public function __construct(array $definitions = [])
    {
        $this->definitions = $definitions;
    }

    public function get(string $id)
    {
        if (!$this->has($id)) {
            throw new NotFoundException("No entry for '$id'");
        }

        if (isset($this->resolvedEntries[$id])) {
            return $this->resolvedEntries[$id];
        }

        $entry = $this->definitions[$id];

        if ($entry instanceof \Closure) {
            $entry = $entry($this);
        }

        $this->resolvedEntries[$id] = $entry;

        return $entry;
    }

    public function has(string $id): bool
    {
        return isset($this->definitions[$id]) || isset($this->resolvedEntries[$id]);
    }
}
