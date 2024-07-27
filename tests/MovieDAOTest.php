<?php

use App\Models\Movie;
use App\DAO\MovieDAO; 
use PHPUnit\Framework\TestCase;

class MovieDAOTest extends TestCase
{
    protected $movieDAO;
    protected $stmtMock;
    protected $pdoMock;

    public function setUp(): void
    {
        $this->pdoMock = $this->createMock(PDO::class);
        $this->stmtMock = $this->createMock(PDOStatement::class);

        $this->pdoMock->method('prepare')
            ->willReturn($this->stmtMock);

        $this->movieDAO = $this->getMockBuilder(MovieDAO::class)
                                ->onlyMethods(['connect'])
                                ->getMock();
        $this->movieDAO->method('connect')
                        ->willReturn($this->pdoMock);
    }

    public function testGetAllMovies()
    {
        $expectedData = [
            (object) [
                'id'    => 1,
                'name'   => 'Frozen',
                'description'      => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque, facere!',
                'duration'   => 123,
                'release_date' => '2024-04-10 11:05:09',
                'trailer'   => 'sample_mp4.mp4',
                'image_path' => 'frozen.png',
                'cover_path'       => 'frozen-cover.png',
                'director'       => 'John Doe',
            ],
            (object) [
                'id'    => 2,
                'name'   => 'Tolo Tolo',
                'description'      => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque, facere!',
                'duration'   => 123,
                'release_date' => '2024-04-10 11:05:09',
                'trailer'   => 'sample_mp4.mp4',
                'image_path' => 'tolotolo.png',
                'cover_path'       => 'tolotolo-cover.png',
                'director'       => 'John Doe',
            ],

        ];

        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('fetchAll')
            ->with(PDO::FETCH_OBJ)
            ->willReturn($expectedData);
    
        $userList = $this->movieDAO->getAllMovies();
    
        $this->assertIsArray($userList);
        $this->assertEquals($expectedData, $userList);
    }

    public function testGetMovieById()
    {
        $movieId = 1;

        $movieData = [
            [
                'id' => 1,
                'title' => 'Frozen',
                'description' => 'When the newly crowned Queen Elsa',
                'duration' => 123,
                'releaseDate' => '2024-01-25',
                'trailer' => 'sample_mp4.mp4',
                'imagePath' => 'frozen.png',
                'coverPath' => 'frozen-cover.png',
                'director' => 'John Doe'
            ],
        ];

        
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('fetch')
            ->with(PDO::FETCH_ASSOC)
            ->willReturn($movieData);

        $movie = $this->movieDAO->getMovieById($movieId);

        $this->assertInstanceOf(Movie::class, $movie);
        $this->assertEquals($movieData['id'], $movie->id);
        $this->assertEquals($movieData['title'], $movie->title);
        $this->assertEquals($movieData['description'], $movie->description);
        $this->assertEquals($movieData['duration'], $movie->duration);
        $this->assertEquals($movieData['releaseDate'], $movie->releaseDate);
        $this->assertEquals($movieData['trailer'], $movie->trailer);
        $this->assertEquals($movieData['imagePath'], $movie->imagePath);
        $this->assertEquals($movieData['coverPath'], $movie->coverPath);
        $this->assertEquals($movieData['director'], $movie->director);

    }

    public function testUpdateMovieTrailer()
    {
        $movieId = 1;
        $newTrailerPath = 'update_sample_mp4.mp4';
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('rowCount')
            ->willReturn(1);
    
        // Chiamata al metodo da testare
        $result = $this->movieDAO->updateMovieTrailer($movieId, $newTrailerPath);
    
        // Verifica del risultato
        $this->assertEquals(1, $result);
    }

    public function testClearMovieTrailer()
    {
        $movieId = 1;
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('rowCount')
            ->willReturn(1);
    
        // Chiamata al metodo da testare
        $result = $this->movieDAO->clearMovieTrailer($movieId);
    
        // Verifica del risultato
        $this->assertEquals(1, $result);
    }
    
    public function testUpdateMoviePicture()
    {
        $movieId = 1;
        $newImagePath = 'update_image.jpg';
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('rowCount')
            ->willReturn(1);
    
        // Chiamata al metodo da testare
        $result = $this->movieDAO->updateMoviePicture($movieId, $newImagePath);
    
        // Verifica del risultato
        $this->assertEquals(1, $result);
    }

    public function testClearMoviePicture()
    {
        $movieId = 1;
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('rowCount')
            ->willReturn(1);
    
        // Chiamata al metodo da testare
        $result = $this->movieDAO->clearMoviePicture($movieId);
    
        // Verifica del risultato
        $this->assertEquals(1, $result);
    }

    public function testUpdateMovieCover()
    {
        $movieId = 1;
        $newCoverPath = 'update_cover.png';
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('rowCount')
            ->willReturn(1);
    
        // Chiamata al metodo da testare
        $result = $this->movieDAO->updateMovieCover($movieId, $newCoverPath);
    
        // Verifica del risultato
        $this->assertEquals(1, $result);
    }

    public function testClearMovieCover()
    {
        $movieId = 1;
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('rowCount')
            ->willReturn(1);
    
        // Chiamata al metodo da testare
        $result = $this->movieDAO->clearMovieCover($movieId);
    
        // Verifica del risultato
        $this->assertEquals(1, $result);
    }

    public function testDeleteMovieById()
    {
        $movieId = 1;
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('rowCount')
            ->willReturn(1);
    
        // Chiamata al metodo da testare
        $result = $this->movieDAO->deleteMovieById($movieId);
    
        // Verifica del risultato
        $this->assertEquals(1, $result);
    }

    public function testAddMovie()
    {
        $name = 'frozen';
        $description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque ullam voluptatem minima, quidem ab doloremque.';
        $duration = 111;
        $release_date = '2024-01-25';
        $trailerPath = 'sample.mp4';
        $imagePath = 'image.png';
        $coverPath = 'cover.png';
        $director = 'John Doe';
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('rowCount')
            ->willReturn(1);
    
        // Chiamata al metodo da testare
        $result = $this->movieDAO->addMovie($name, $description, $duration, $release_date, $trailerPath, $imagePath, $coverPath, $director);
    
        // Verifica del risultato
        $this->assertEquals(1, $result);
    }

    public function testUpdateMovie()
    {
        $id = 1;
        $name = 'frozen';
        $description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque ullam voluptatem minima, quidem ab doloremque.';
        $duration = 111;
        $release_date = '2024-01-25';
        $director = 'John Doe';
    
        $this->stmtMock->method('execute')
            ->willReturn(true);
        $this->stmtMock->method('rowCount')
            ->willReturn(1);
    
        // Chiamata al metodo da testare
        $result = $this->movieDAO->updateMovie($id, $name, $description, $duration, $release_date, $director);
    
        // Verifica del risultato
        $this->assertEquals(1, $result);
    }



}