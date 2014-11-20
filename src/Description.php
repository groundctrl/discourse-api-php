<?php namespace Ctrl\Discourse\Api;

use GuzzleHttp\Command\Guzzle\Description as BaseDescription;

class Description extends BaseDescription
{
    /** @var array */
    protected $defaults = [
        'operations' => [
            'groups' => [
                'httpMethod' => 'GET',
                'uri' => '/admin/groups.json',
                'responseModel' => 'listResponse',
            ],
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
            ]
        ],
        'models' => [
            'jsonResponse' => [
                'type' => 'object',
                'additionalProperties' => [
                    'location' => 'json'
                ]
            ],
            'listResponse' => [
                'type' => 'array',
                'items' => [
                    '$ref' => 'jsonResponse'
                ]
            ]
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
