<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Http\Requests\Bucket;

use CodebarAg\LaravelMicrosoftPlanner\Data\Task;
use Illuminate\Support\Arr;
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
        return 'planner/buckets/' . $this->bucketId . '/tasks';
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        if (! $response->successful()) {
            return null;
        }

        return collect(Arr::get($response->json(), 'value'))->map(fn (array $task) => Task::fromData($task));
    }
}
