<?php

include_once(__DIR__ . '/../../TestHelper.php');

use PHPUnit\Framework\TestCase;
use SiaSkem\Skem\Application\MelihatSemuaSkemResponse;
use SiaSkem\Skem\Application\MelihatSemuaSkemService;
use SiaSkem\Skem\Domain\Model\Kegiatan;
use SiaSkem\Skem\Domain\Model\Skem;
use SiaSkem\Skem\Domain\Model\SkemId;
use SiaSkem\Skem\Domain\Model\SkemFactory;
use SiaSkem\Skem\Domain\Model\SkemRepository;

class MelihatSemuaSkemTest extends TestCase
{
    /**
     * @var SkemRepository $skemRepositoryMock
     */
    private $skemRepositoryMock;
    private $melihatSemuaSkemService;

    public function setUp(): void
    {
        $this->skemRepositoryMock = 
            $this->getMockBuilder(SkemRepository::class)
                ->setMethods(["all", "byId", "save"])
                ->getMock();  

        $this->skemRepositoryMock->method("all")->willReturn($this->getDummySkems());   
        $this->melihatSemuaSkemService = new MelihatSemuaSkemService($this->skemRepositoryMock);
    }

    public function getDummySkems() : array
    {
        $kegiatan1 = new Kegiatan("Sepak Bola", "Olaraga");
        $id1 = "p6UEyCc8D8ecLijAI5zVwOTP3D0";
        $skem1 = new Skem(
            new SkemId($id1),
            $kegiatan1,
            "Finalis",
            "500"
        );

        $kegiatan2 = new Kegiatan("Basket", "Olahraga");
        $id2 = "1UhCjPVooeXJzwRkh36I62XJOYe";
        $skem2 = new Skem(
            new SkemId($id2),
            $kegiatan2,
            "Semi Final",
            "250"
        );

        $skems = array($skem1, $skem2);
        return $skems;
    }

    private function getDummySkemResponses()
    {
        $skems = $this->getDummySkems();
        $responses = new MelihatSemuaSkemResponse();
        foreach ($skems as $skem){
            $responses->addSkem(
                $skem->id()->id(),
                $skem->kegiatan()->nama(),
                $skem->kegiatan()->jenis(),
                $skem->lingkup(),
                $skem->poin()
            );
        }
        return $responses;
    }

    private function hasSameSkemsValue(array $array1,array $array2) : bool
    {
        $differentValues = array_udiff($array1, $array2, array($this,"compare"));
        if (count($differentValues) > 0){
            return false;
        }
        return true;
    }

    public static function compare($skem1, $skem2)
    {
        foreach($skem1 as $key => $value){
            if($skem1->$key != $skem2->$key){
                return -1;
            }
        }
        return 0;
    }

    public function testService()
    {
        $expectedResponses = $this->getDummySkemResponses();
        $expectedSkems = $expectedResponses->skems;
        $skemResponses = $this->melihatSemuaSkemService->execute();
        $skems = $skemResponses->skems;
        $this->assertIsArray($skems);
        $this->assertTrue($this->hasSameSkemsValue($expectedSkems, $skems));
    }
}