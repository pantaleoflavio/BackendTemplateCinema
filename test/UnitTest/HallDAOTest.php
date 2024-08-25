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
}