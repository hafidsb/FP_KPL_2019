<?php

namespace SiaSkem\Skem\Application;

use SiaSkem\Skem\Application\MasukSebagaiBiroKemahasiswaanRequest;
use SiaSkem\Skem\Domain\Model\UserRepository;

class MasukSebagaiBiroKemahasiswaanService{
    
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(MasukSebagaiBiroKemahasiswaanRequest $request) :  MasukSebagaiBiroKemahasiswaanResponse
    {
        $hashedPassword = hash("sha256", $request->password);
        $isSuccessLogin = $this->userRepository->login($request->username, $hashedPassword);
        if (!$isSuccessLogin) {
            throw new FailedLoginException("Login tidak berhasil"); 
        }
        $user = $this->userRepository->getByName($request->username);
        if ($user->role() != 'BiroKemahasiswaan') {
            throw new FailedLoginException("User Tidak Memiliki Hak akses Biro Kemahasiswaan");
        }
        $response = new MasukSebagaiBiroKemahasiswaanResponse($user->name(), $user->role());
        return $response;
    }
}