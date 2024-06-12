<!-- resources/Views/admin/hallList.php -->
 
            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h1 class="h2 pt-3 pb-2 mb-3 border-bottom">Hall List</h1>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Seats</th>
                                <th scope="col">Services</th>
                                <th scope="col">Hall Gallery</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Main Hall</td>
                                <td><a href="manageHallImage.html" class="btn btn-sm btn-outline-secondary">View Image</a></td>
                                <td>150</td>
                                <td>Wi-Fi, Projector</td>
                                <td><a href="manageHallGallery.html" class="btn btn-sm btn-outline-secondary">View Gallery</a></td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <!-- More halls can be listed here -->
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>