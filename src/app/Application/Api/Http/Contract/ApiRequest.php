<?php

namespace App\Api\Http\Contract;

class ApiRequest
{
    private string $path;
    private array $query;
    private array $bodyRequest;

    public function __construct(
        string $path,
        array $query,
        array $bodyRequest = null
    ) {
        $this->path = $path;
        $this->query = $query;
        $this->bodyRequest = $bodyRequest;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getQuery(): array
    {
        return $this->query;
    }

    public function getBodyRequest(): array
    {
        return $this->bodyRequest;
    }
}
