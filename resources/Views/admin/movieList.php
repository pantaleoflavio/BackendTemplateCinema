<!-- resources/Views/admin/movieList.php -->

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
                            <tr>
                                <th scope="row">1</th>
                                <td>The Matrix</td>
                                <td>A computer hacker learns from mysterious rebels...</td>
                                <td>136 min</td>
                                <td>1999</td>
                                <td><a href="trailer.html" class="btn btn-sm btn-outline-secondary">View Trailer</a></td>
                                <td><a href="moviePhoto.html" class="btn btn-sm btn-outline-secondary">View Image</a></td>
                                <td><a href="movieCover.html" class="btn btn-sm btn-outline-secondary">View Cover</a></td>
                                <td>Lana Wachowski, Lilly Wachowski</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <!-- More movies can be listed here -->
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
