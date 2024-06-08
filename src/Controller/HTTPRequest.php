<?php

namespace App\Controller;

class HTTPRequest
{
    /**
     * @var array
     */
    private array $inputs;

    /**
     * @param array $inputs
     */
    public function __construct(array $inputs)
    {
        $this->inputs = $inputs;
    }

    /**
     * If no argument name is supplied, returns an array of all inputs.
     * If an argument name is passed it returns it value.
     *
     * @param string $argName - Optional
     * @return array|string
     */
    public function inputs(string $argName = ''): array|string
    {
        if (empty(trim($argName))) {
            return $this->inputs;
        }

        return isset($this->inputs[$argName]) ? trim($this->inputs[$argName]) : false;
    }

}