<img src="https://banners.beyondco.de/Laravel%20Microsoft%20Planner.png?theme=light&packageManager=composer+require&packageName=codebar-ag%2Flaravel-microsoft-planner&pattern=circuitBoard&style=style_1&description=An+opinionated+way+to+interface+with+Microsoft+Planner&md=1&showWatermark=0&fontSize=175px&images=document-report">

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codebar-ag/laravel-microsoft-planner.svg?style=flat-square)](https://packagist.org/packages/codebar-ag/laravel-microsoft-planner)
[![GitHub-Tests](https://github.com/codebar-ag/laravel-microsoft-planner/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/codebar-ag/laravel-microsoft-planner/actions/workflows/run-tests.yml)
[![GitHub Code Style](https://github.com/codebar-ag/laravel-microsoft-planner/actions/workflows/fix-php-code-style-issues.yml/badge.svg?branch=main)](https://github.com/codebar-ag/laravel-microsoft-planner/actions/workflows/fix-php-code-style-issues.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/codebar-ag/laravel-microsoft-planner.svg?style=flat-square)](https://packagist.org/packages/codebar-ag/laravel-microsoft-planner)

This package was developed to interface with Microsoft Planner.

## 💡 What is Laravel Microsoft Planner?
/
Laravel Microsoft Planner is an opinionated way to interface with Microsoft Planner.


## 🛠 Requirements

### <= v1.0

- PHP: `^8.2`
- Laravel: `^10.*`

## ⚙️ Installation

You can install the package via composer:

```bash
composer require codebar-ag/laravel-microsoft-planner
```

Add the following environment variables to your `.env` file:

```bash
MICROSOFT_PLANNER_CLIENT_ID=your-client-id
MICROSOFT_PLANNER_TENANT_ID=your-tenant-id
MICROSOFT_PLANNER_CLIENT_SECRET=your-client-secret
```


## 🔧 Configuration file

You can publish the config file with:

```bash
php artisan vendor:publish --tag=microsoft-planner-config
```

This is the contents of the published config file:

```php
<?php

// config for CodebarAg/LaravelMicrosoftPlanner

return [
    'auth' => [
        'client_id' => env('MICROSOFT_PLANNER_CLIENT_ID'),
        'client_secret' => env('MICROSOFT_PLANNER_CLIENT_SECRET'),
        'tenant_id' => env('MICROSOFT_PLANNER_TENANT_ID'),
        'redirect_uri' => env('MICROSOFT_PLANNER_REDIRECT_URI'),
    ]
];
```

## 🏗 Usage

```php
use CodebarAg\LaravelMicrosoftPlanner\Http\Connectors\MicrosoftPlannerConnector;
use CodebarAg\LaravelMicrosoftPlanner\Http\Requests\Bucket\GetBucketTasksRequest;
use CodebarAg\LaravelMicrosoftPlanner\Http\Requests\Tasks\GetTaskRequest;
use CodebarAg\LaravelMicrosoftPlanner\Http\Requests\Tasks\GetTaskDetailsRequest;
use CodebarAg\LaravelMicrosoftPlanner\Http\Requests\Tasks\PatchTaskRequest;
use CodebarAg\LaravelMicrosoftPlanner\Http\Requests\Tasks\PatchTaskDetialsRequest;

$connector = new MicrosoftPlannerConnector();
$authenticator = $connector->getAccessToken();
$connector->authenticate($authenticator);


// Get all tasks from a bucket
$tasksResponse = $connector->send(new GetBucketTasksRequest(bucketId: 'bucket-id'));
$tasks = $tasksResponse->dto();


// Get a single task
$taskResponse = $connector->send(new GetTaskRequest(taskId: 'task-id'));
$task = $taskResponse->dto();

// Get a tasks details
$taskDetailsResponse = $connector->send(new GetTaskDetailsRequest(taskId: 'task-id'));
$taskDetails = $taskDetailsResponse->dto();

// Update a task
$updateTaskRequest = new PatchTaskRequest(taskId: 'task-id', etag: $task->eTag);
$updateTaskRequest->body()->add('somedetail', 'somevalue');

$updateTaskResponse = $connector->send($updateTaskRequest);

if ($updatedTask->successful()) {
    // Do something
}

// Update a tasks details
$updateTaskDetailsRequest = new PatchTaskDetialsRequest(taskId: 'task-id', etag: $taskDetails->eTag);
$updateTaskDetailsRequest->body()->add('somedetail', 'somevalue');

$updateTaskDetailsResponse = $connector->send($updateTaskDetailsRequest);

if ($updatedTaskDetails->successful()) {
    // Do something
}
```

## 🏋️ DTO showcase

```php
CodebarAg\LaravelMicrosoftPlanner\Data\Checklist {
    +id: "2f071481-095d-4363-abd9-29ef845a8b05"                     // string
    +isChecked: true,                                               // bool
    +title: "sometask"                                              // string
    +orderHint: "858",                                              // string
    +lastModifiedDateTime: "2021-08-31T13:00:00Z"                   // string
    +lastModifiedByUserId: "1234456"                                // string|null
}

CodebarAg\LaravelMicrosoftPlanner\Data\Note {
    +contentType: 'html'                                            // string
    +content: '<p>Some content</p>'                                 // string
}

CodebarAg\LaravelMicrosoftPlanner\Data\Reference {
    +alias: "test.pdf"                                              // string
    +url: "https://something.here/in-this-file/test.pdf"            // string
    +type: "pdf"                                                    // string
    +previewPriority: "858"                                         // string
    +lastModifiedDateTime: "2021-08-31T13:00:00Z"                   // string
    +lastModifiedByUserId: "1234456"                                // string
}

CodebarAg\LaravelMicrosoftPlanner\Data\TaskDetails {
    +eTag: "W/"1238934jbdf89bfdkkjbr34g98hh98vhhcc=""               // string
    +description: "Some Description"                                // string
    +previewType: "noPreview"                                       // string
    +id: "EZAPnP4uBkGAMqyd2dneWJcAOGbk"                             // string
    +notes: CodebarAg\LaravelMicrosoftPlanner\Data\Note             // Note
    +references: Illuminate\Support\Collection                      // Collection
    +checklist: Illuminate\Support\Collection                       // Collection
}

CodebarAg\LaravelMicrosoftPlanner\Data\Task {
    +eTag: "W/"JzEtVGFzsdfsdEBAQEBAQEBAQEBAQEBJcCc=""               // string
    +planId: "aL8rSpzb_0-0IGcHql4P0ZcAG3_B"                         // string
    +bucketId: "09AEzJXp0E6zY5LEE2Wsv5cAOdQd"                       // string
    +title: "Task Title"                                            // string
    +orderHint: "8585037232077788756Pe"                             // string
    +assigneePriority: ""                                           // string
    +percentComplete: 100                                           // int
    +completed: true                                                // bool
    +startDateTime: Carbon                                          // Carbon\Carbon|null
    +createdDateTime: Carbon                                        // Carbon\Carbon
    +dueDateTime: Carbon                                            // Carbon\Carbon|null
    +recurrence: null                                               // string|null
    +hasDescription: true                                           // bool
    +specifiedCompletionRequirements: "none"                        // string
    +previewType: "noPreview"                                       // string
    +completedDateTime: Carbon                                      // Carbon\Carbon|null
    +completedBy: array                                             // array
    +referenceCount: 2                                              // int
    +checklistItemCount: 3                                          // int
    +activeChecklistItemCount: 2                                    // int
    +conversationThreadId: "AAQkADk1ZG"                             // string|null
    +priority: 1                                                    // int
    +creationSource: null                                           // string|null
    +id: "EZAPnP4uBkGAMqyd2dneWJcAOGbk"                             // string
    +createdBy: array                                               // array
    +appliedCategories: array                                       // array
    +assignments: array                                             // array
```

## 🚧 Testing

Copy your own phpunit.xml-file.

```bash
cp phpunit.xml.dist phpunit.xml
```

Run the tests:

```bash
./vendor/bin/pest
```

## 📝 Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## ✏️ Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## 🧑‍💻 Security Vulnerabilities

Please review [our security policy](.github/SECURITY.md) on how to report security vulnerabilities.

## 🙏 Credits

- [Rhys Lees](https://github.com/RhysLees)
- [All Contributors](../../contributors)
- [Skeleton Repository from Spatie](https://github.com/spatie/package-skeleton-laravel)
- [Laravel Package Training from Spatie](https://spatie.be/videos/laravel-package-training)

## 🎭 License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
