<?php

namespace Idy\Skem\Controllers\Web;

use Phalcon\Mvc\Controller;

class SkemController extends Controller
{
    public function indexAction()
    {
        $this->view->pick('skem');
    }
    
}