<?php

namespace SiaSkem\Skem\Controllers\Web;


use Phalcon\Mvc\Controller;
use SiaSkem\Skem\Application\MelihatSemuaSkemService;
use SiaSkem\Skem\Application\MembuatSkemBaruRequest;
use SiaSkem\Skem\Application\MembuatSkemBaruService;
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

    /**
     * @var MembuatSkemBaruService $membuatSkemBaruService
     */
    private $membuatSkemBaruService;

    public function onConstruct()
    {
        $skemRepository = $this->di->getShared('mysql_skem_repository');
        $this->melihatSemuaSkemService = new MelihatSemuaSkemService($skemRepository);
        $this->mengubahPoinSkemService = new MengubahPoinSkemService($skemRepository);
        $this->membuatSkemBaruService = new MembuatSkemBaruService($skemRepository);
    }

    public function indexAction()
    {
        $skemsResponse = $this->melihatSemuaSkemService->execute();
        $skems = $skemsResponse->skems;
        $this->view->setVars([
            'skems' => $skems
        ]);
        $this->view->pick('skem/skem');
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
        $this->response->redirect('skem');
    }

    public function createAction()
    {
        if ($this->request->isPost()){
            $namaKegiatan = $this->request->getPost('nama_kegiatan');
            $jenisKegiatan = $this->request->getPost('jenis_kegiatan');
            $lingkup = $this->request->getPost('lingkup');
            $poin = $this->request->getPost('poin');
            $request = new MembuatSkemBaruRequest($namaKegiatan, $jenisKegiatan, $lingkup, $poin);
            $this->membuatSkemBaruService->execute($request);
            $this->response->redirect('skem');
        }
        $this->view->pick('skem/create');
    }
}