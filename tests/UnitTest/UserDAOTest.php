<?php

use App\Models\User;
use App\DAO\UserDAO; 
use PHPUnit\Framework\TestCase;

class UserDAOTest extends TestCase
{
    protected $userDAO;
    protected $stmtMock;
    protected $pdoMock;

    public function setUp(): void
    {
        $this->pdoMock = $this->createMock(PDO::class);
        $this->stmtMock = $this->createMock(PDOStatement::class);

        $this->pdoMock->method('prepare')
            ->willReturn($this->stmtMock);

        $this->userDAO = $this->getMockBuilder(UserDAO::class)
                                ->onlyMethods(['connect'])
                                ->getMock();
        $this->userDAO->method('connect')
                        ->willReturn($this->pdoMock);
    }

    public function testGetSingleUser()
    {
        $userId = 1;

        $userData = [
            [
                'id_user' => 1,
                'fullname' => 'John Doe',
                'email' => 'john@doe.com',
                'username' => 'johndoe',
                'image_path' => 'john.jpg',
                'role' => 'user'
            ],
        ];

        
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('fetch')
            ->with(PDO::FETCH_ASSOC)
            ->willReturn($userData);

        $user = $this->userDAO->getSingleUser($userId);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($userData['id'], $user->id);
        $this->assertEquals($userData['fullname'], $user->fullname);
        $this->assertEquals($userData['email'], $user->email);
        $this->assertEquals($userData['username'], $user->username);
        $this->assertEquals($userData['image_path'], $user->user_pic);
        $this->assertEquals($userData['role'], $user->role);
    }

    public function testUpdateUser()
    {
        $userId = 1;
        $fullname = 'John Doe update';
        $email = 'john@update.com';
        $username = 'johndoeupdate';
        $user_image = 'johnupdate.jpg';
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
    
        $result = $this->userDAO->updateUser($userId, $fullname, $email, $username, $user_image);
    
        $this->assertTrue($result);
    }

    public function testGetAllUsers()
    {
        $expectedData = [
            (object) [
                'id_user'    => 1,
                'fullname'   => 'John Doe',
                'email'      => 'john@doe.com',
                'username'   => 'johndoe',
                'image_path' => 'john.jpg',
                'password'   => '$2y$10$mfhvQ3nh.TdyVX00000000dEbbt5Jr0JA/ZZH.000000aZixWrjmy',
                'created_at' => '2024-04-10 11:05:09',
                'role'       => 'user',
            ],
            (object) [
                'id_user'    => 2,
                'fullname'   => 'Mary Jane',
                'email'      => 'mary@jane.com',
                'username'   => 'maryjane',
                'image_path' => 'jane.jpg',
                'password'   => '$2y$10$mfhvQ3nh.TdyVX00000000dEbbt5Jr0JA/ZZH.000000aZixWrjmy',
                'created_at' => '2024-04-10 11:06:09',
                'role'       => 'user',
            ],
        ];
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('fetchAll')
            ->with(PDO::FETCH_OBJ)
            ->willReturn($expectedData);
    
        $userList = $this->userDAO->getAllUsers();
    
        $this->assertIsArray($userList);
        $this->assertEquals($expectedData, $userList);
    }

    public function testSetRole()
    {
        $userId = 1;
        $role = 'admin';
        
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('rowCount')
            ->willReturn(1);

        $result = $this->userDAO->setRole($userId, $role);

        $this->assertGreaterThan(0, $this->stmtMock->rowCount());
    }
}