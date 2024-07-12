<!-- resources/Views/auth/login.php -->

<?php 
    use App\Controllers\SigninController;
    if (isset($_SESSION['userId'])){
        echo "<script>window.location.href='" . ROOT . "/index.php?page=home'</script>";
    } else {
        if (isset($_POST['signin'])) {

            $input_email = $_POST['signinEmail'];
            $input_password = $_POST['signinPassword'];

            // AUTH INCLUDES

            $signin = new SigninController($input_email, $input_password);

            try {
                //Running error handlers and user signup
                $signin->loginUser();
                // Going to back to front page
                echo "<script>alert('You are logged')</script>";
                echo "<script>window.location.href='" . ROOT . "/index.php?page=home'</script>";
            
            } catch (Exception $e) {
                // Mostra un messaggio di errore più dettagliato
                echo "<script>alert('Error: " . $e->getMessage() . "')</script>";
                // Logga l'errore per un'analisi più dettagliata
                error_log($e->getMessage());
            }

        }
    }
?>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center">Sign In</h2>
            <form action="" method="post" class="mt-4">
                <div class="form-group">
                    <label for="signUpEmail">Your email</label>
                    <input type="email" class="form-control" name="signinEmail" id="signinEmail" required>
                </div>
                <div class="form-group">
                    <label for="signUpPassword">Password</label>
                    <input type="password" class="form-control" name="signinPassword" id="signinPassword" required>
                </div>
                <button type="submit" name="signin" class="btn btn-primary btn-block my-3">Login</button>
            </form>
        </div>
    </div>
