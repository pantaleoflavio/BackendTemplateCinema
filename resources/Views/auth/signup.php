<!-- Header and Nav Bar-->
<?php include_once "../includes/header.php" ?>

<?php
  // AUTH INCLUDES
  include __DIR__ . '/../app/Models/signup.classes.php';
  include __DIR__ . '/../app/Controllers/signup-controller.classes.php';

  
    if (isset($_POST['signup'])) {
      

        echo 'sign up';
        // saving input parameters in variables
        $user_fullname = $_POST['signUpName'];
        $user_email = $_POST['signUpEmail'];
        $username = $_POST['signUpUsername'];
        $user_image = 'user.jpg';
        $user_password = $_POST['signUpPassword'];
        $confirm_password = $_POST['confirmPassword'];


        //Instantiate SignupContr Class
        $signup = new SignupController($user_fullname, $user_email, $username, $user_image, $user_password, $confirm_password);

        try {
            $signup->signupUser();
            echo "<script>alert('Register successfully')</script>";
            echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/BackendTemplateCinema/auth/signin.php'</script>";

        } catch (Exception $e) {
            // Mostra un messaggio di errore più dettagliato
            echo "<script>alert('Error: " . $e->getMessage() . "')</script>";
            // Logga l'errore per un'analisi più dettagliata
            error_log($e->getMessage());
        }



    }


?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center">Sign Up</h2>
            <form action="signup.php" method="post" class="mt-4">
                <div class="form-group">
                    <label for="signUpName">Your full name</label>
                    <input type="text" class="form-control" name="signUpName" id="signUpName" required>
                </div>
                <div class="form-group">
                    <label for="signUpEmail">Your email</label>
                    <input type="email" class="form-control" name="signUpEmail" id="signUpEmail" required>
                </div>
                <div class="form-group">
                    <label for="signUpUsername">Your username</label>
                    <input type="text" class="form-control" name="signUpUsername" id="signUpUsername" required>
                </div>
                <div class="form-group">
                    <label for="signUpPassword">Password</label>
                    <input type="password" class="form-control" name="signUpPassword" id="signUpPassword" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>
                </div>
                <button type="submit" name="signup" class="btn btn-primary btn-block my-3">Complete your registration</button>
            </form>
        </div>
    </div>
</main>

<!-- Footer -->
<?php include_once "../includes/footer.php" ?>