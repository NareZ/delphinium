<?php namespace Delphinium\Iris;

use Backend;
Use Event;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
	public $require = [
            'Delphinium.Greenhouse',
            'Delphinium.Dev',
            'Delphinium.Roots'
	];

    public function pluginDetails()
    {
        return [
            'name' => 'Iris Plugin',
            'description' => 'Sunburst chart for course content',
            'author' => 'Delphinium',
            'icon' => 'icon-bullseye'
        ];
    }

    
    public function registerComponents()
    {
        return [
            '\Delphinium\Iris\Components\Iris' => 'iris',
            '\Delphinium\Iris\Components\IrisLegend' => 'irislegend'
        ];
    }
    
    
    public function boot()
    {
	    
    	Event::listen('backend.menu.extendItems', function($manager){	
    	 
            $manager->addSideMenuItems('Delphinium.Greenhouse', 'greenhouse', [
                'Iris' => [
                    'label' => 'Iris',
                    'icon' => 'icon-bullseye',
                    'owner' => 'Delphinium.Greenhouse',
                    'url' => Backend::url('delphinium/iris/home'),
                    'group'       => 'Iris',
                ]
            ]);
            
        });
    }
    
}