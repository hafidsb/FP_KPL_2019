<?php

namespace SiaSkem\Skem\Controllers\Web;

use Phalcon\Mvc\Controller;
use SiaSkem\Skem\Application\FailedLoginException;
use SiaSkem\Skem\Application\MasukSebagaiBiroKemahasiswaanRequest;
use SiaSkem\Skem\Application\MasukSebagaiBiroKemahasiswaanService;

class UserController extends Controller
{
    private $masukSebagaiBiroKemahasiswaanService;

    public function onConstruct()
    {
        $userRepository = $this->di->getShared('mysql_user_repository');
        $this->masukSebagaiBiroKemahasiswaanService = new  MasukSebagaiBiroKemahasiswaanService($userRepository);
    }

    public function loginBiroKemahasiswaanAction()
    {
        if ($this->request->isPost()) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $loginRequest = new MasukSebagaiBiroKemahasiswaanRequest($username, $password);
            try {
                $login = $this->masukSebagaiBiroKemahasiswaanService->execute($loginRequest);
                $this->session->set("username", $login->username);
                $this->session->set("role", $login->role);
                $this->flashSession->success("Berhasil Login, Selamat Datang {$login->username}");
                $this->response->redirect('');
            } catch (FailedLoginException $exception) {
                $this->flashSession->error($exception->getMessage());
                $this->view->pick('user/loginBiro');
            }
        }
        $this->view->pick('user/loginBiro');
    }

    public function logoutAction()
    {
        $this->session->remove("username");
        $this->session->remove("role");
        $this->response->redirect('');
    }
}