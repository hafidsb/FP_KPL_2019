<?php

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SiaSkem\Skem\Application\MembuatSkemBaruRequest;
use SiaSkem\Skem\Application\MembuatSkemBaruService;
use SiaSkem\Skem\Domain\Model\Kegiatan;
use SiaSkem\Skem\Domain\Model\Skem;
use SiaSkem\Skem\Domain\Model\SkemId;
use SiaSkem\Skem\Domain\Model\SkemRepository;

class MembuatSkemBaruTest extends TestCase
{
    /**
     * @var MockObject $skemRepositoryMock
     */
    private $skemRepositoryMock;
    /**
     * @var MembuatSkemBaruService $membuatSkemBaruService
     */
    private $membuatSkemBaruService;

    public function setUp(): void
    {
        $this->skemRepositoryMock = 
            $this->getMockBuilder(SkemRepository::class)
                ->setMethods(["all", "byId", "save"])
                ->getMock();  

        $this->membuatSkemBaruService = new MembuatSkemBaruService($this->skemRepositoryMock);
    }

    public function getDummySkem()
    {
        $kegiatan = new Kegiatan("Sepak Bola", "Olaraga");
        $id = "p6UEyCc8D8ecLijAI5zVwOTP3D0";
        $skem = new Skem(
            new SkemId($id),
            $kegiatan,
            "Finalis",
            500
        );
        return $skem;
    }

    public function getDummyRequest()
    {
        $request = new MembuatSkemBaruRequest("Sepak Bola", "Olahraga", "Finalis", 500);
        return $request;
    }

    public function testService()
    {
        $dummyRequest = $this->getDummyRequest();
        $this->skemRepositoryMock->expects($this->once())->method('save');
        $this->assertNull($this->membuatSkemBaruService->execute($dummyRequest));
    }
}