    <!-- Footer -->
    <footer class="footer text-white py-4">
        <div class="container">
        <div class="row align-items-center text-center">
            <!-- Logo Column -->
            <div class="col-12 col-md-3 mb-3">
            <a href="<?php echo ROOT; ?>/resources/Views/index.php" class="navbar-brand d-inline">
                <img src="<?php echo ROOT; ?>/assets/img/musa-vision-logo.png" alt="CINE VISION" height="100">
            </a>
            </div>
            <!-- Social Icons Column -->
            <div class="social-container col-12 col-md-3 mb-3">
            <a href="https://facebook.com" target="_blank" class="text-white me-2 pe-4">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://instagram.com" target="_blank" class="text-white">
                <i class="fab fa-instagram"></i>
            </a>
            </div>
            <!-- Contact Info Column -->
            <div class="col-12 col-md-3 mb-3 text-md-center">
            <div class="contact-info">
                <p>Telefono: 123 456 7890</p>
                <p>Email: info@cinevision.com</p>
            </div>
            </div>
            <!-- Back to Top Button Column -->
            <div class="col-12 mb-3 col-md-3 text-md-end">
            <div id="footerArrow" class="btn btn-primary rounded-circle">
                <i class="fas fa-chevron-up"></i>
            </div>
            </div>
        </div>
        </div>
    </footer>
  

    <!-- Sign In Modal -->
    <div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="signInModalLabel">Accedi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="signInEmail" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="signInEmail" required>
                        </div>
                    <div class="mb-3">
                        <label for="signInPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signInPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Sign up Modal -->
    <div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="signUpModalLabel">Sign up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="signUpEmail" class="form-label">Your email</label>
                        <input type="email" class="form-control" id="signUpEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="signUpPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signUpPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary">complete your registration</button>
                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Spinner -->
    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
    

    <!-- Swipe JS library -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="<?php echo ROOT; ?>/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script -->
    <script src="<?php echo ROOT; ?>/assets/js/script.js"></script>
    <!-- Script Single Movie -->
    <script src="<?php echo ROOT; ?>/assets/js/single-movie-script.js"></script>
    <!-- Script Book Now -->
    <script src="<?php echo ROOT; ?>/assets/js/book-now.js"></script>
</body>
</html>