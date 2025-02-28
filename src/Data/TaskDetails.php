<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Data;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;

class TaskDetails extends Data
{
    public function __construct(
        public string $eTag,
        public string $description,
        public string $previewType,
        public string $id,
        public ?Note $notes,
        public Collection $references,
        public Collection $checklist,
    ) {}

    public static function fromData(array $data): self
    {
        $checklist = collect(Arr::get($data, 'checklist', []))
            ->map(function (array $checklistItem, string $key) {
                return Checklist::fromData($key, $checklistItem);
            })->flatten()->sortByDesc('orderHint');

        $references = collect(Arr::get($data, 'references', []))
            ->map(function (array $referenceItem, string $key) {
                return Reference::fromData($key, $referenceItem);
            })->flatten()->reverse();

        return new static(
            eTag: Arr::get($data, '@odata.etag'),
            description: Arr::get($data, 'description'),
            previewType: Arr::get($data, 'previewType'),
            id: Arr::get($data, 'id'),
            notes: Arr::has($data, 'notes') ? Note::fromData(Arr::get($data, 'notes')) : null,
            references: $references,
            checklist: $checklist
        );
    }
}
