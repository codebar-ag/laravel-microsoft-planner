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
        return OAuthConfig::make()
            ->setClientId(config('microsoft-planner.auth.client_id'))
            ->setClientSecret(config('microsoft-planner.auth.client_secret'))
            ->setTokenEndpoint('https://login.windows.net/'.config('microsoft-planner.auth.tenant_id').'/oauth2/v2.0/token')
            ->setDefaultScopes([
                'https://graph.microsoft.com/.default',
            ]);
    }
}
