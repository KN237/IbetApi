<?php
namespace App\OpenApi;

use ArrayObject;
use ApiPlatform\Core\OpenApi\Model;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model\PathItem;
use ApiPlatform\Core\OpenApi\Model\Operation;
use Symfony\Component\HttpFoundation\Response;
use ApiPlatform\Core\OpenApi\Model\RequestBody;
use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;

class OpenApiFactory implements OpenApiFactoryInterface
{
    private $decorated;

    public function __construct(OpenApiFactoryInterface $decorated)
    {
        $this->decorated = $decorated;
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = $this->decorated->__invoke($context); 

        $content = new ArrayObject([
            'application/json' => [
                'schema' => [
                    'type' => 'object',
                    'properties' => [
                        'username' => [
                            'type' => 'string',
                            'example' => "aaaa@aaa.com",
                        ],
                        'password' => [
                            'type' => 'string',
                            'example' => "0000",
                        ],
                    ],

                   
                ],
            ],
        ]);

        $openApi
        ->getPaths()
        ->addPath('/login', new PathItem(null, null, null,null,null, new Operation(
                'post',
                ['Auth'],
                [
                    Response::HTTP_OK => [
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    'type' => 'object',
                                    'properties' => [
                                        'username' => [
                                            'type' => 'string',
                                            'example' => "aaaa@aaa.com",
                                        ],
                                        'password' => [
                                            'type' => 'string',
                                            'example' => "0000",
                                        ],
                                    ],

                                   
                                ],
                            ],
                        ],
                    ],
                ],
                'Connect user to the DB',
                'Connect user to the DB',null,[],
               
                    
             new Model\RequestBody('Test login', $content)
            )
        ));


        $openApi
        ->getPaths()
        ->addPath('/logout', new PathItem(null, null, null, new Operation(
                'get',
                ['Auth'],[],
                'Unconnect user to the DB',
                'Uncnnect user to the DB',null,[]
            )
        ));

        return $openApi;

    }
}