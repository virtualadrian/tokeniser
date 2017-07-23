<?php
/*
 * @author: x00x70
 * @link: https://github.com/x00x70
 *
 */

    return [
        'tokeniser' => [
            'algorithm' => ["HS256", "HS512", "HS384"],
            'attribute' => 'tokeniser',
            'ignore' => ['/api/ping'],
            'path' => ['/api'],
            'relaxed' => [],
            'secret' => getenv('UF_API_SECRET'),
            'secure' => True
        ],
        'csrf' => [
            'blacklist' => [
                '^/api/' => [
                    'POST',
                    'PUT'
                ]
            ]
        ]
    ];
