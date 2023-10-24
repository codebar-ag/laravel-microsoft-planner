<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Http\Requests\Tasks;

use CodebarAg\LaravelMicrosoftPlanner\Data\Task;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetTaskRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public readonly string $taskId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return 'planner/tasks/'.$this->taskId;
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        if (! $response->successful()) {
            return null;
        }

        return Task::fromData($response->json());
    }
}
