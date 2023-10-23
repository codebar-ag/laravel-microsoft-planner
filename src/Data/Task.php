<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Data;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Saloon\Http\Response;
use Spatie\LaravelData\Data;

class Task extends Data
{
    public function __construct(
        public string $planId,
        public string $bucketId,
        public string $title,
        public string $orderHint,
        public string $assigneePriority,
        public int $percentComplete,
        public null|Carbon $startDateTime,
        public Carbon $createdDateTime,
        public null|Carbon $dueDateTime,
        public null|string $recurrence,
        public bool $hasDescription,
        public string $specifiedCompletionRequirements,
        public string $previewType,
        public null|Carbon $completedDateTime,
        public null|Carbon $completedBy,
        public int $referenceCount,
        public int $checklistItemCount,
        public int $activeChecklistItemCount,
        public null|string $conversationThreadId,
        public int $priority,
        public null|string $creationSource,
        public string $id,
        public array $createdBy,
        public array $appliedCategories,
        public array $assignments,
    ) {}

    public static function fromData(array $data): self
    {
        return new static(
            planId: Arr::get($data, 'planId'),
            bucketId: Arr::get($data, 'bucketId'),
            title: Arr::get($data, 'title'),
            orderHint: Arr::get($data, 'orderHint'),
            assigneePriority: Arr::get($data, 'assigneePriority'),
            percentComplete: Arr::get($data, 'percentComplete'),
            startDateTime: Carbon::createFromTimestamp(Arr::get($data, 'startDateTime')),
            createdDateTime: Carbon::createFromTimestamp(Arr::get($data, 'createdDateTime')),
            dueDateTime: Carbon::createFromTimestamp(Arr::get($data, 'dueDateTime')),
            recurrence: Arr::get($data, 'recurrence'),
            hasDescription: Arr::get($data, 'hasDescription'),
            specifiedCompletionRequirements: Arr::get($data, 'specifiedCompletionRequirements'),
            previewType: Arr::get($data, 'previewType'),
            completedDateTime: Carbon::createFromTimestamp(Arr::get($data, 'completedDateTime')),
            completedBy: Arr::get($data, 'completedBy'),
            referenceCount: Arr::get($data, 'referenceCount'),
            checklistItemCount: Arr::get($data, 'checklistItemCount'),
            activeChecklistItemCount: Arr::get($data, 'activeChecklistItemCount'),
            conversationThreadId: Arr::get($data, 'conversationThreadId'),
            priority: Arr::get($data, 'priority'),
            creationSource: Arr::get($data, 'creationSource'),
            id: Arr::get($data, 'id'),
            createdBy: Arr::get($data, 'createdBy'),
            appliedCategories: Arr::get($data, 'appliedCategories'),
            assignments: Arr::get($data, 'assignments'),
        );
    }
}
