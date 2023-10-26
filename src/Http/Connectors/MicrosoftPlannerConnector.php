<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Http\Connectors;

use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Http\Connector;
use Saloon\Traits\OAuth2\ClientCredentialsGrant;

class MicrosoftPlannerConnector extends Connector
{
    use ClientCredentialsGrant;

    public function resolveBaseUrl(): string
    {
        return 'https://graph.microsoft.com/beta';
    }

    protected function defaultOauthConfig(): OAuthConfig
    {
        $this->setAuth();

        return OAuthConfig::make()
            ->setClientId(config('laravel-microsoft-planner.auth.client_id'))
            ->setClientSecret(config('laravel-microsoft-planner.auth.client_secret'))
            ->setTokenEndpoint('https://login.windows.net/'.config('laravel-microsoft-planner.auth.tenant_id').'/oauth2/v2.0/token')
            ->setDefaultScopes([
                'https://graph.microsoft.com/.default',
            ]);
    }

    public function setAuth(): void
    {
        if (! config('laravel-microsoft-planner.auth.client_id')) {
            throw new \Exception('No client_id provided.', 500);
        }

        if (! config('laravel-microsoft-planner.auth.client_secret')) {
            throw new \Exception('No client_secret provided.', 500);
        }

        if (! config('laravel-microsoft-planner.auth.tenant_id')) {
            throw new \Exception('No tenant_id provided.', 500);
        }
    }
}
