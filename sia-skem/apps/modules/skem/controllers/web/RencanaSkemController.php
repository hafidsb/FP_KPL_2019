<?php

namespace SiaSkem\Skem\Controllers\Web;

use Phalcon\Mvc\Controller;

use SiaSkem\Skem\Application\MembuatRencanaSkemService;
use SiaSkem\Skem\Application\MembuatRencanaSkemRequest;
use SiaSkem\Skem\Application\MelihatSemuaRencanaSkemResponse;
use SiaSkem\Skem\Application\MelihatSemuaRencanaSkemService;
use SiaSkem\Skem\Application\MenghapusRencanaSkemRequest;
use SiaSkem\Skem\Application\MenghapusRencanaSkemService;
use SiaSkem\Skem\Application\MelihatSemuaSkemService;

class RencanaSkemController extends Controller
{
    /**
     * @var MembuatRencanaSkemService $membuatRencanaSkemService
     */
    private $membuatRencanaSkemService;
    /**
     * @var MelihatSemuaRencanaSkemService $melihatSemuaRencanaSkemService
     */
    private $melihatSemuaRencanaSkemService;
    /**
     * @var MenghapusRencanaSkemService $menghapusRencanaSkemService
     */
    private $menghapusRencanaSkemService;
    /**
     * @var MelihatSemuaSkemService $melihatSemuaSkemService
     */
    private $melihatSemuaSkemService;

    public function onConstruct()
    {
        $skemRepository = $this->di->getShared('mysql_skem_repository');
        $rencanaSkemRepository = $this->di->getShared('mysql_rencana_skem_repository');
        $this->membuatRencanaSkemService = new MembuatRencanaSkemService($rencanaSkemRepository);
        $this->melihatSemuaRencanaSkemService = new MelihatSemuaRencanaSkemService($rencanaSkemRepository,$skemRepository);
        $this->menghapusRencanaSkemService = new MenghapusRencanaSkemService($rencanaSkemRepository);
        $this->melihatSemuaSkemService = new MelihatSemuaSkemService($skemRepository);
    }

    public function indexAction()
    {
        $rencanaSkemsResponse = $this->melihatSemuaRencanaSkemService->execute();
        $rencanaSkems = $rencanaSkemsResponse->rencanaSkems;
        $this->view->setVars([
            'rencanas' => $rencanaSkems
        ]);
        $this->view->pick('rencana_skem/skem');

    }

    public function createAction()
    {

        if ($this->request->isPost()){
            $skem_id = $this->request->getPost('skem_id');
            $deskripsi = $this->request->getPost('deskripsi');
            $semester = $this->request->getPost('semester');

            $request = new MembuatRencanaSkemRequest(
                $skem_id,
                $deskripsi,
                $semester
            );

            $this->membuatRencanaSkemService->execute($request);
            $this->flashSession->success("Rencana Skem Berhasil Ditambahkan");
            $this->response->redirect('rencana_skem');
        }
        
        $skemsResponse = $this->melihatSemuaSkemService->execute();
        $skems = $skemsResponse->skems;
        $this->view->setVars([
            'skems' => $skems
        ]);
        $this->view->pick('rencana_skem/create');
    }

    public function deleteAction()
    {
        $id = $this->dispatcher->getParam("id");
        $request = new MenghapusRencanaSkemRequest(
            $id
        );
        $this->menghapusRencanaSkemService->execute($request);
        $this->flashSession->success('Rencana Skem Berhasil Dihapus');
        $this->response->redirect('rencana_skem');
    }
}