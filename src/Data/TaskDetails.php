<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Data;

use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;

class TaskDetails extends Data
{
    public function __construct(
        public string $description,
        public string $previewType,
        public string $id,
        public Note $notes,
        public array $references,
        public array $completionRequirements,
        public array $checklist,
    ) {}

    public static function fromData(array $data): self
    {
        return new static(
            description: Arr::get($data, 'description'),
            previewType: Arr::get($data, 'previewType'),
            id: Arr::get($data, 'id'),
            notes: Note::fromData(Arr::get($data, 'notes')),
            references: collect(Arr::get($data, 'references', []))
                ->map(function (array $referenceItem, string $key) {
                    return Reference::fromData($key, $referenceItem);
                })->flatten()->toArray(),
            completionRequirements: Arr::get($data, 'completionRequirements'),
            checklist: collect(Arr::get($data, 'checklist', []))
                ->mapWithKeys(function (array $checklistItem, string $key) {
                    return [$key => Checklist::fromData($key, $checklistItem)];
                })->flatten()->toArray(),
            );
    }
}
