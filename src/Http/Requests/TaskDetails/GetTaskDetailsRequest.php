<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Http\Requests\TaskDetails;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetTaskDetailsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return 'planner/tasks/EZAPnP4uBkGAMqyd2dneWJcAOGbk/details';
    }
}
