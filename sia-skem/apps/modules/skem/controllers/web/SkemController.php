<?php

namespace SiaSkem\Skem\Controllers\Web;


use Phalcon\Mvc\Controller;
use SiaSkem\Skem\Application\MelihatSemuaSkemService;

class SkemController extends Controller
{
    /**
     * @var MelihatSemuaSkemService $melihatSemuaSkemService
     */
    private $melihatSemuaSkemService;

    public function onConstruct()
    {
        $skemRepository = $this->di->getShared('mysql_skem_repository');
        $this->melihatSemuaSkemService = new MelihatSemuaSkemService($skemRepository);
    }

    public function indexAction()
    {
        $skemsResponse = $this->melihatSemuaSkemService->execute();
        $skems = $skemsResponse->skems;
        $this->view->setVars([
            'skems' => $skems
        ]);
        $this->view->pick('skem');
    }
    
}