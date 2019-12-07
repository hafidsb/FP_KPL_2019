<?php

namespace SiaSkem\Skem\Controllers\Web;


use Phalcon\Mvc\Controller;
use SiaSkem\Skem\Application\MelihatSemuaSkemService;
use SiaSkem\Skem\Application\MengubahPoinSkemRequest;
use SiaSkem\Skem\Application\MengubahPoinSkemService;

class SkemController extends Controller
{
    /**
     * @var MelihatSemuaSkemService $melihatSemuaSkemService
     */
    private $melihatSemuaSkemService;

    /**
     *  @var MengubahPoinSkemService $mengubahPoinSkemService
     */ 
    private $mengubahPoinSkemService;

    public function onConstruct()
    {
        $skemRepository = $this->di->getShared('mysql_skem_repository');
        $this->melihatSemuaSkemService = new MelihatSemuaSkemService($skemRepository);
        $this->mengubahPoinSkemService = new MengubahPoinSkemService($skemRepository);
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
    
    public function updateAction($part)
    {
        if ($this->request->isPost()) {
            if($part == 'poin'){
                $id = $this->request->getPost('id');
                $poin = $this->request->getPost('poin');
                $request = new MengubahPoinSkemRequest($id, $poin);
                $this->mengubahPoinSkemService->execute($request);
                $this->response->redirect('skem');
            }
        }
        return var_dump("Hello");
    }
}