<?php
/**
 * @author: x00x70
 * @link: https://github.com/x00x70/s3Retriever
 *
 * 
 * Under default config, it should be possible to access /api/ping without a token.
 * Accessing /api/test will require a token and return "Hello World!"
 */

$app->get('/api/test', 'UserFrosting\Sprinkle\Tokeniser\Controller\TokeniserController:getTest');
$app->any('/api/ping', 'UserFrosting\Sprinkle\Tokeniser\Controller\TokeniserController:getPing');
