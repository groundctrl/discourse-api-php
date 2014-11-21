<?php namespace Ctrl\Discourse\Api;

use GuzzleHttp\Command\Guzzle\Description as BaseDescription;
use GuzzleHttp\Utils;

class Description extends BaseDescription
{
    /** @var array */
    protected $defaults = [
        'operations' => [
            'categories' => [
                'httpMethod' => 'GET',
                'uri' => '/categories.json',
                'responseModel' => 'jsonResponse'
            ],
            'categoryLatestTopics' => [
                'httpMethod' => 'GET',
                'uri' => '/c/{slug}/l/latest.json',
                'responseModel' => 'jsonResponse',
                'parameters' => [
                    'slug' => [
                        'type' => 'string',
                        'location' => 'uri'
                    ]
                ]
            ],
            'groups' => [
                'httpMethod' => 'GET',
                'uri' => '/admin/groups.json',
                'responseModel' => 'jsonResponse',
            ],
            'createGroup' => [
                'httpMethod' => 'POST',
                'uri' => '/admin/groups',
                'responseModel' => 'jsonResponse',
                'parameters' => [
                    'group' => [
                        'type' => 'array',
                        'location' => 'postField',
                    ]
                ]
            ],
            'users' => [
                'httpMethod' => 'GET',
                'uri' => '/admin/users.json',
                'responseModel' => 'jsonResponse',
            ],
            'groupMembers' => [
                'httpMethod' => 'GET',
                'uri' => '/groups/{slug}/members.json',
                'responseModel' => 'jsonResponse',
                'parameters' => [
                    'slug' => [
                        'type' => 'string',
                        'location' => 'uri'
                    ]
                ]
            ],

        ],
        'models' => [
            'jsonResponse' => [
                'type' => 'object',
                'additionalProperties' => [
                    'location' => 'json'
                ]
            ],
        ]
    ];

    /**
     * Description Constructor.
     *
     * @param array $config
     * @param array $options
     */
    public function __construct(array $config = [], array $options = [])
    {
        $config = array_merge_recursive($this->defaults, $config);

        parent::__construct($config, $options);
    }
}