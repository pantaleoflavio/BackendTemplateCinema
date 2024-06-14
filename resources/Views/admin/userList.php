<!-- resources/Views/admin/userList.php -->

<?php

    $userList = $userController->getAllUsers();
    // Index for the table
    $index = 1;
?>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Users List</h1>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">Picture</th>
                            <th scope="col">role</th>
                            <th scope="col">Subscription</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($userList as $user) : ?>
                            <tr>
                                <th scope="row"><?php echo $index; ?></th>
                                <td><?php echo $user->fullname; ?></td>
                                <td><?php echo $user->email; ?></td>
                                <td><?php echo $user->username; ?></td>
                                <td><img class="rounded-circle img-fluid" style="width: 100px; height: 100px;" src="<?php echo ROOT; ?>/assets/img/users/<?php echo $user->image_path; ?>" alt="User Image"></td>
                                <td><?php echo $user->role; ?></td>
                                <td><?php echo $user->created_at; ?></td>
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


