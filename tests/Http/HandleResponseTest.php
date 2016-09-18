<?php
namespace Dsc\MercadoLivre\Http;

use Dsc\MercadoLivre\Codec\SerializerInterface;
use Dsc\MercadoLivre\Codec\TargetSerializerInterface;
use Psr\Http\Message\StreamInterface;

class HandleResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var StreamInterface
     */
    private $stream;

    /**
     * @var TargetSerializerInterface
     */
    private $target;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    protected function setUp()
    {
        $this->stream = $this->createMock(StreamInterface::class);
        $this->target = $this->createMock(TargetSerializerInterface::class);
        $this->serializer = $this->createMock(SerializerInterface::class);
    }

    /**
     * @test
     */
    public function constructorShouldConfigureAttributes()
    {
        $service = $this->getMockForAbstractClass(
            MeliHandleResponse::class,
            [$this->stream, $this->target, $this->serializer]
        );
        $this->assertAttributeSame($this->stream, 'stream', $service);
        $this->assertAttributeSame($this->target, 'target', $service);
        $this->assertAttributeSame($this->serializer, 'serializer', $service);
        $this->assertInstanceOf(MeliHandleResponseInterface::class, $service);
    }
}