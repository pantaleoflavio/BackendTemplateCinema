<?php

use App\Models\HallImages;
use App\DAO\HallImagesDAO; 
use PHPUnit\Framework\TestCase;

class HallImagesDAOTest extends TestCase
{
    protected $hallImagesDAO;
    protected $stmtMock;
    protected $pdoMock;

    public function setUp(): void
    {
        $this->pdoMock = $this->createMock(PDO::class);
        $this->stmtMock = $this->createMock(PDOStatement::class);

        $this->pdoMock->method('prepare')
            ->willReturn($this->stmtMock);

        $this->hallImagesDAO = $this->getMockBuilder(HallImagesDAO::class)
                                ->onlyMethods(['connect'])
                                ->getMock();
        $this->hallImagesDAO->method('connect')
                        ->willReturn($this->pdoMock);
    }

    public function testGetPicsBySingleHall()
    {
        $id = 1;

        $expectedData = [
            (object) [
                'id'    => 1,
                'hall_id'   => 1,
                'image_path'      => 'mars1.png',
            ],
            (object) [
                'id'    => 2,
                'hall_id'   => 1,
                'image_path'      => 'mars2.png',
            ],
        ];

        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('fetchAll')
            ->with(PDO::FETCH_OBJ)
            ->willReturn($expectedData);
    
        $result = $this->hallImagesDAO->getPicsBySingleHall($id);
    
        $this->assertIsArray($result);
        $this->assertEquals($expectedData, $result);
    }

    public function testAddSingleImage()
    {
        $id = 1;
        $imagePath = 'newHallImage.jpg';
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('rowCount')
            ->willReturn(1);
    
        $result = $this->hallImagesDAO->addSingleImage($id, $imagePath);
    
        $this->assertEquals(1, $result);
    }

    public function testUpdateSingleImage()
    {
        $id = 1;
        $imagePath = 'updatedHallImage.jpg';
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('rowCount')
            ->willReturn(1);
    
        $result = $this->hallImagesDAO->updateSingleImage($id, $imagePath);
        $this->assertEquals(1, $result);
    }

    public function testDeleteSingleImage()
    {
        $id = 1;
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('rowCount')
            ->willReturn(1);
    
        $result = $this->hallImagesDAO->deleteSingleImage($id);
    
        $this->assertEquals(1, $result);
    }

}