<?php

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SiaSkem\Skem\Application\MembuatSkemBaruRequest;
use SiaSkem\Skem\Application\MembuatSkemBaruService;
use SiaSkem\Skem\Application\MengubahPoinSkemRequest;
use SiaSkem\Skem\Application\MengubahPoinSkemService;
use SiaSkem\Skem\Application\SkemNotFoundException;
use SiaSkem\Skem\Domain\Model\Kegiatan;
use SiaSkem\Skem\Domain\Model\Skem;
use SiaSkem\Skem\Domain\Model\SkemId;
use SiaSkem\Skem\Domain\Model\SkemRepository;

class MengubahPoinSkemTest extends TestCase
{
    /**
     * @var MockObject $skemRepositoryMock
     */
    private $skemRepositoryMock;
    /**
     * @var MengubahPoinSkemService $mengubahPoinSkemService
     */
    private $mengubahPoinSkemService;

    public function setUp(): void
    {
        $this->skemRepositoryMock = 
            $this->getMockBuilder(SkemRepository::class)
                ->setMethods(["all", "byId", "save", "deleteById"])
                ->getMock();  

        $this->mengubahPoinSkemService = new MengubahPoinSkemService($this->skemRepositoryMock);
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
        $request = new MengubahPoinSkemRequest("p6UEyCc8D8ecLijAI5zVwOTP3D0", 750);
        return $request;
    }

    public function testService()
    {
        $dummyRequest = $this->getDummyRequest();
        $dummySkem = $this->getDummySkem();
        $this->skemRepositoryMock->expects($this->once())->method('byId')->will($this->returnValue($dummySkem));;
        $this->skemRepositoryMock->expects($this->once())->method('save');
        $this->assertNull($this->mengubahPoinSkemService->execute($dummyRequest));  
    }

    public function testNotFoundException()
    {
        $dummyRequest = $this->getDummyRequest();
        $this->skemRepositoryMock->expects($this->once())->method('byId')->willReturn(null);
        $this->expectException(SkemNotFoundException::class);
        $this->assertNull($this->mengubahPoinSkemService->execute($dummyRequest));
    }
}