<?php namespace Delphinium\Dev\Components;

use Delphinium\Core\Roots;
use Delphinium\Core\RequestObjects\SubmissionsRequest;
use Delphinium\Core\RequestObjects\ModulesRequest;
use Delphinium\Core\Enums\CommonEnums\ActionType;
use Cms\Classes\ComponentBase;

class TestRoots extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Test Roots',
            'description' => 'This component will test the Roots API'
        ];
    }
    
    public function onRun()
    {   
        $req = new ModulesRequest();
        $req->moduleId = 380199;
        $req->includeContentDetails = false;
        $req->includeContentItems = false;
        $req->contentId = null;
        $roots = new Roots();
        $res = $roots->modules($req);
        echo $res;
    }
}
