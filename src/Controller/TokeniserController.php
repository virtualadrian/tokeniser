<?php
/*
 * @author: x00x70
 * @link: https://github.com/x00x70
 *
 */
namespace UserFrosting\Sprinkle\Tokeniser\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\NotFoundException as NotFoundException;
use UserFrosting\Sprinkle\Core\Controller\SimpleController;

/**
 * Tokeniser Class
 *
 * Implements functions for Token based api access.
 */
class TokeniserController extends SimpleController
{
    /**
     * Tokeniser test route controller.
     *
     * Request type: GET
     */
    public function getTest($request, $response, $args)
    {
    	$data["message"] = "Hello World!";
    	
    	return $response
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    }

    public function getPing($request, $response, $args)
    {
    	$date = new \DateTime();
    	$data["ping"] = $date->format('Y-m-d H:i:s');
    	
    	return $response
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    }
}
