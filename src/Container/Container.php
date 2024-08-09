<?php
namespace App\Container;

class Container
{
    private array $bindings = [];
    private array $instances = [];

    public function __construct(array $definitions = [])
    {
        foreach ($definitions as $key => $definition) {
            $this->bind($key, $definition);
        }
    }

    public function bind(string $key, callable $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    public function get(string $key)
    {
        if (isset($this->instances[$key])) {
            return $this->instances[$key];
        }

        if (!isset($this->bindings[$key])) {
            throw new \Exception("No found: $key");
        }

        $resolver = $this->bindings[$key];
        $this->instances[$key] = $resolver($this);

        return $this->instances[$key];
    }
}
