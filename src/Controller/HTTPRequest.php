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
     * Retrieves request input by name.
     *
     * @param string $argName
     * @return string|false
     */
    public function getInputByName(string $argName): string|false
    {
        return isset($this->inputs[$argName]) ? trim($this->inputs[$argName]) : false;
    }

    /**
     * Retrieves all request inputs.
     * 
     * @return array
     */
    public function getAllInputs(): array
    {
        return $this->inputs;
    }

}