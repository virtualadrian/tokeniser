<?php

namespace UserFrosting\Sprinkle\Tokeniser\ServicesProvider;

use Tuupola\Middleware\JwtAuthentication;
use Tuupola\Middleware\JwtAuthentication\CallableDelegate;
use Tuupola\Middleware\JwtAuthentication\RequestMethodRule;
use Tuupola\Middleware\JwtAuthentication\RequestPathRule;
use UserFrosting\Sprinkle\Account\Authenticate\Exception\InvalidCredentialsException;

class ServicesProvider
{
    /**
     * Register Tokeniser services & middleware
     *
     */
    public function register($container)
    {
        /**
         * Sets up the apiTokenAuth middleware, used to secure api routes with tokens.
         */
        $container['apiTokenAuth'] = function ($c) {

            $config = $c->config;

            $apiTokenAuth = new JwtAuthentication([
                "algorithm" => $config['tokeniser']['algorithm'],
                "attribute" => $config['tokeniser']['attribute'],
                "error" => function ($request, $response, $arguments) {
                    throw new InvalidCredentialsException();
                },
                "ignore" => $config['tokeniser']['ignore'],
                "path" => $config['tokeniser']['path'],
                "relaxed" => $config['tokeniser']['relaxed'],
                "secret" => $config['tokeniser']['secret'],
                "secure" => $config['tokeniser']['secure']
            ]);

            return $apiTokenAuth;
        };
    }
}
