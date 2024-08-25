<?php

use App\Models\Hall;
use App\DAO\HallDAO; 
use PHPUnit\Framework\TestCase;

class HallDAOTest extends TestCase
{
    protected $hallDAO;
    protected $stmtMock;
    protected $pdoMock;

    public function setUp(): void
    {
        $this->pdoMock = $this->createMock(PDO::class);
        $this->stmtMock = $this->createMock(PDOStatement::class);

        $this->pdoMock->method('prepare')
            ->willReturn($this->stmtMock);

        $this->hallDAO = $this->getMockBuilder(HallDAO::class)
                                ->onlyMethods(['connect'])
                                ->getMock();
        $this->hallDAO->method('connect')
                        ->willReturn($this->pdoMock);
    }

    public function testGetAllHalls()
    {
        $expectedData = [
            (object) [
                'id'    => 1,
                'name'   => 'mars',
                'code'      => NULL,
                'seats'   => 100,
                'cover_path' => 'mars.jpg',
                'services'   => 'aria condizionata, sedili reclinabili, bagno delux',
            ],
            (object) [
                'id'    => 2,
                'name'   => 'jupiter',
                'code'      => NULL,
                'seats'   => 120,
                'cover_path' => 'jupiter.jpg',
                'services'   => 'aria condizionata, HD',
            ],
        ];

        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('fetchAll')
            ->with(PDO::FETCH_OBJ)
            ->willReturn($expectedData);
    
        $result = $this->hallDAO->getAllHalls();
    
        $this->assertIsArray($result);
        $this->assertEquals($expectedData, $result);
    }

    public function testGetHallById()
    {
        $id = 1;

        $expectedData = [
            [
                'id'    => 1,
                'name'   => 'mars',
                'code'      => NULL,
                'seats'   => 100,
                'cover_path' => 'mars.jpg',
                'services'   => 'aria condizionata, sedili reclinabili, bagno delux',
            ],
        ];

        
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('fetch')
            ->with(PDO::FETCH_ASSOC)
            ->willReturn($expectedData);

        $hall = $this->hallDAO->getHallById($id);

        $this->assertInstanceOf(Hall::class, $hall);
        $this->assertEquals($expectedData['id'], $hall->id);
        $this->assertEquals($expectedData['name'], $hall->name);
        $this->assertEquals($expectedData['code'], $hall->code);
        $this->assertEquals($expectedData['seats'], $hall->seats);
        $this->assertEquals($expectedData['coverPath'], $hall->coverPath);
        $this->assertEquals($expectedData['services'], $hall->services);
    }

    public function testAddHall()
    {
        $name = 'new hall';
        $code = NULL;
        $seats= 40;
        $coverPath = 'newHall.jpg';
        $services = 'aria condizionata, sedili reclinabili, bagno delux';
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('rowCount')
            ->willReturn(1);
    
        $result = $this->hallDAO->addHall($name, $code, $seats,$coverPath, $services);
    
        $this->assertEquals(1, $result);
    }

    public function testUpdateHall()
    {
        $id = 1;
        $name = 'updated hall';
        $code = NULL;
        $seats= 54;
        $services = 'aria condizionata, HD';
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('rowCount')
            ->willReturn(1);
    
        $result = $this->hallDAO->updateHall($id, $name, $code, $seats, $services);
        $this->assertEquals(1, $result);
    }

    public function testClearHallPicture()
    {
        $id = 1;
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('rowCount')
            ->willReturn(1);
    
        $result = $this->hallDAO->clearHallPicture($id);
    
        $this->assertEquals(1, $result);
    }

    public function testUpdateHallPicture()
    {
        $id = 1;
        $newCoverPath = 'update_cover.png';
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('rowCount')
            ->willReturn(1);
    
        $result = $this->hallDAO->updateHallPicture($id, $newCoverPath);
    
        $this->assertEquals(1, $result);
    }

    public function testDeleteHallById()
    {
        $id = 1;
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('rowCount')
            ->willReturn(1);
    
        $result = $this->hallDAO->deleteHallById($id);
    
        $this->assertEquals(1, $result);
    }

}