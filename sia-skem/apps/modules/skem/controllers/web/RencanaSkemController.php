<?php

namespace SiaSkem\Skem\Controllers\Web;

use Phalcon\Mvc\Controller;

use SiaSkem\Skem\Application\MembuatRencanaSkemService;
use SiaSkem\Skem\Application\MembuatSkemBaruRequest;
use SiaSkem\Skem\Application\MelihatSemuaRencanaSkemResponse;
use SiaSkem\Skem\Application\MelihatSemuaRencanaSkemService;
use SiaSkem\Skem\Application\MenghapusRencanaSkemRequest;
use SiaSkem\Skem\Application\MenghapusRencanaSkemService;

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

    public function onConstruct()
    {
        $skemRepository = $this->di->getShared('mysql_skem_repository');
        $rencanaSkemRepository = $this->di->getShared('mysql_rencana_skem_repository');
        $this->membuatRencanaSkemService = new MembuatRencanaSkemService($rencanaSkemRepository);
        $this->melihatSemuaRencanaSkemService = new MelihatSemuaRencanaSkemService($rencanaSkemRepository,$skemRepository);
        $this->menghapusRencanaSkemService = new MenghapusRencanaSkemService($rencanaSkemRepository);
    }

    public function indexAction()
    {
        $rencanaSkemsResponse = $this->melihatSemuaRencanaSkemService->execute();
        
    }
}