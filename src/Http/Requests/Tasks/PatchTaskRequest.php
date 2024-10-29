<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Http\Requests\Tasks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class PatchTaskRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        public readonly string $taskId,
        public readonly string $etag
    ) {}

    public function defaultHeaders(): array
    {
        return [
            'If-Match' => $this->etag,
        ];
    }

    public function resolveEndpoint(): string
    {
        return 'planner/tasks/'.$this->taskId;
    }
}
