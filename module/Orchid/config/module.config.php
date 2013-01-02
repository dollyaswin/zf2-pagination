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
                    'route'    => '/find[/:type][/:page]',
                    'constraints' => array(
                        'page'     => '[0-9]+',
    					'type'     => '[a-zA-Z]+',
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
            'orchid' => __DIR__ . '/../view',
        ),
        // pagination control view script
        'template_map' => array('pagination' => __DIR__ . '/../view/orchid/pagination.phtml',
                                'querypagination' => __DIR__ . '/../view/orchid/querypagination.phtml'
        						)
    ),
);
