<!-- resources/Views/admin/movieList.php -->

<?php

    $movieList = $movieController->getAllMovies();

    if (isset($_POST['deleteMovie']) && isset($_POST['movieId'])) {
        $result = $movieController->deleteMovieById($_POST['movieId']);
        
        if ($result) {
            echo "<script>alert('Movie deleted successfully');</script>";
            echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/index.php?page=admin&subPage=movieList'</script>";
        } else {
            echo "<script>alert('Failed to delete movie');</script>";
        }
    }


?>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Movie List</h1>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Release Date</th>
                                <th scope="col">Trailer</th>
                                <th scope="col">Image</th>
                                <th scope="col">Cover</th>
                                <th scope="col">Director</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($movieList as $movie) : ?>
                                <tr>
                                    <th scope="row"><?php echo $index; ?></th>
                                    <td><?php echo $movie->name; ?></td>
                                    <td><?php echo $movie->description; ?></td>
                                    <td><?php echo $movie->duration; ?> min</td>
                                    <td><?php echo $movie->release_date; ?></td>
                                    <td><a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=trailer&movieId=<?php echo $movie->id; ?>" class="btn btn-sm btn-outline-secondary">View Trailer</a></td>
                                    <td><a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=movieImage&movieId=<?php echo $movie->id; ?>" class="btn btn-sm btn-outline-secondary">View Image</a></td>
                                    <td><a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=movieCover&movieId=<?php echo $movie->id; ?>" class="btn btn-sm btn-outline-secondary">View Cover</a></td>
                                    <td><?php echo $movie->director; ?></td>
                                    <td>
                                        <a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=editMovie&movieId=<?php echo $movie->id; ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <form method="post" action="<?php echo ROOT; ?>/index.php?page=admin&subPage=movieList" onsubmit="return confirm('Are you sure you want to delete this movie?');">
                                            <input type="hidden" name="movieId" value="<?php echo $movie->id; ?>">
                                            <button type="submit" name="deleteMovie" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                            <?php
                                $index ++;
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="mb-3">
                    <a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=addMovie" class="btn btn-success">Add New Movie</a>
                </div>
            </main>
        </div>
    </div>
