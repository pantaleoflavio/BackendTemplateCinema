<!-- resources/Views/user-settings.php -->

<?php

if (!isset($_SESSION['userId'])) {
    echo "<script>window.location.href='" . ROOT . "/index.php?page=home'</script>";
} else {
    $userId = $_SESSION['userId'];
    $user = $userController->getSingleUser($userId);

    if (isset($_POST['userUpdate'])) {

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $username = $_POST['username'];

        if (!empty($_FILES['image']['name'])) {
            $user_pic = $_FILES['image']['name'];
            $user_image_temp = $_FILES['image']['tmp_name'];
            move_uploaded_file($user_image_temp,  __DIR__ . "/../../assets/img/users/$user_pic");
        } else {
            $user_pic = $user->user_pic;
        }
        
        $userUpdate = $userController->updateUser($userId, $fullname, $email, $username, $user_pic);

        echo "<script>window.location.href='" . ROOT . "/index.php?page=user-settings'</script>";
    }

}



?>

<div class="container my-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-6">
                <h5 class="mb-3">ACCOUNT DETAILS</h5>
                <!-- Account Detail of the Page -->
                <form method="POST" class="bill-detail" enctype="multipart/form-data">
                    <fieldset>
                        <div class="py-3">
                            <input name="fullname" class="form-control" placeholder="Full Name" type="text" value="<?php echo $user->fullname; ?>">
                        </div>
                        
                        <div class="py-3">
                            <input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo $user->email; ?>">
                        </div>
                        <div class="py-3">
                            <input name="username" class="form-control" placeholder="Username" type="text" value="<?php echo $user->username; ?>">
                        </div>
                        <div class="py-3">
                            <div>
                                <label for="immagine">Select a new image:</label>
                            </div>
                            <img width="150" src="../../assets/img/users/<?php echo $user->user_pic; ?>" alt="" id="image" name="image" class="img-size-sm">
                            <input class="py-3" type="file" id="image" name="image" value="<?php echo $user->user_pic; ?>">
                        </div>
                        <div class="py-3 text-right">
                            <button type="submit" name="userUpdate" class="btn btn-primary">UPDATE</button>
                        <div class="clearfix">
                        </div>
                    </fieldset>
                </form>
                <!-- Account Detail of the Page end -->
            </div>
        </div>
    </div>
</div>
