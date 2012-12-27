<?php
namespace Orchid;

return array(
    'controllers' => array(
        'invokables' => array(
            'Orchid\Controller\Country'  => 'Orchid\Controller\CountryController',
         ),
    ),
    'router' => array(
        'routes' => array(
            'locations' => array(
    			'type' => 'Segment', 
     			'options' => array(
                    'route'    => '/find/locations[/:page]',
                    'constraints' => array(
                        'page'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Orchid\Controller\Country',
                        'action' => 'find',
                    	'page' => 1
                    ),
    			)
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'api' => __DIR__ . '/../view',
        ),
    ),
);
