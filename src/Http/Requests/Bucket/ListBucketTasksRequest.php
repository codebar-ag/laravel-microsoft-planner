<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Http\Requests\Bucket;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ListBucketTasksRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public readonly string $bucketId
    ) {}

    public function resolveEndpoint(): string
    {
        return 'planner/buckets/09AEzJXp0E6zY5LEE2Wsv5cAOdQd/tasks';
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return $response->json();
    }
}
