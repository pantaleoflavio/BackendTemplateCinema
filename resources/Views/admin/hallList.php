<!-- resources/Views/admin/hallList.php -->
<?php

    $hallList = $hallController->getAllHalls();
    
?>
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
                            <?php foreach($hallList as $hall) : ?>
                                <tr>
                                    <th scope="row"><?php echo $index; ?></th>
                                    <td><?php echo $hall->name; ?></td>
                                    <td><a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=manageHallImage" class="btn btn-sm btn-outline-secondary">View Image</a></td>
                                    <td><?php echo $hall->seats; ?></td>
                                    <td><?php echo $hall->services; ?></td>
                                    <td><a href="<?php echo ROOT; ?>/index.php?page=admin&subPage=manageHallGallery" class="btn btn-sm btn-outline-secondary">View Gallery</a></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            <?php
                                $index ++;
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>