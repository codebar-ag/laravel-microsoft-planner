<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Http\Requests\TaskDetails;

use CodebarAg\LaravelMicrosoftPlanner\Data\TaskDetails;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetTaskDetailsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public readonly string $taskId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return 'planner/tasks/'.$this->taskId.'/details';
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        if (! $response->successful()) {
            return null;
        }

        return TaskDetails::fromData($response->json());
    }
}
