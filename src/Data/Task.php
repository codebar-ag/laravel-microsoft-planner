<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Data;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;

class Task extends Data
{
    public function __construct(
        public string $eTag,
        public string $planId,
        public string $bucketId,
        public string $title,
        public string $orderHint,
        public string $assigneePriority,
        public int $percentComplete,
        public bool $completed,
        public ?Carbon $startDateTime,
        public Carbon $createdDateTime,
        public ?Carbon $dueDateTime,
        public ?string $recurrence,
        public bool $hasDescription,
        public string $specifiedCompletionRequirements,
        public string $previewType,
        public ?Carbon $completedDateTime,
        public mixed $completedBy,
        public int $referenceCount,
        public int $checklistItemCount,
        public int $activeChecklistItemCount,
        public ?string $conversationThreadId,
        public int $priority,
        public ?string $creationSource,
        public string $id,
        public array $createdBy,
        public array $appliedCategories,
        public array $assignments,
    ) {}

    public static function fromData(array $data): self
    {
        return new static(
            eTag: Arr::get($data, '@odata.etag'),
            planId: Arr::get($data, 'planId'),
            bucketId: Arr::get($data, 'bucketId'),
            title: Arr::get($data, 'title'),
            orderHint: Arr::get($data, 'orderHint'),
            assigneePriority: Arr::get($data, 'assigneePriority'),
            percentComplete: Arr::get($data, 'percentComplete'),
            completed: Arr::get($data, 'percentComplete') == 100,
            startDateTime: Carbon::create(Arr::get($data, 'startDateTime')),
            createdDateTime: Carbon::create(Arr::get($data, 'createdDateTime')),
            dueDateTime: Carbon::create(Arr::get($data, 'dueDateTime')),
            recurrence: Arr::get($data, 'recurrence'),
            hasDescription: Arr::get($data, 'hasDescription'),
            specifiedCompletionRequirements: Arr::get($data, 'specifiedCompletionRequirements'),
            previewType: Arr::get($data, 'previewType'),
            completedDateTime: Carbon::create(Arr::get($data, 'completedDateTime')),
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
