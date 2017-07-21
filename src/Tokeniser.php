<?php
/**
 * @author: x0070
 * @link: https://github.com/x00x70
 *
 * Tokeniser Sprinkle for API token based authentication
 *
 */

namespace UserFrosting\Sprinkle\Tokeniser;

use RocketTheme\Toolbox\Event\Event;
use UserFrosting\System\Sprinkle\Sprinkle;

/**
 * Bootstrapper class for the 'Tokeniser' sprinkle.
 *
 */
class Tokeniser extends Sprinkle
{
	/**
     * Defines which events in the UF lifecycle our Sprinkle should hook into.
     */
    public static function getSubscribedEvents()
    {
        return [
            'onAddGlobalMiddleware' => ['onAddGlobalMiddleware', 0]
        ];
    }

    /**
     * Add apiTokenAuth () middleware.
     */
    public function onAddGlobalMiddleware(Event $event)
    {
        // apiTokenAuth is a service that returns an instance of the JwtAuthentication middleware class.
        $app = $event->getApp();
        $app->add($this->ci->apiTokenAuth);
    }

}
