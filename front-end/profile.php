<?php 
include './shared/head.php'; 
?>

<div id="app">
  <?php 
  include './shared/header.php';
  include './shared/mobile-header.php';
  ?>




<div class="container">
        <div class="col-md-6">
            <h3 class="text-dark" style="font-size:35px;">PROFILE</h3>
            <form>
                <h3 class="form-control mb-4 text-dark" style="font-size:20px; background:skyblue;" > Username:
                    <?=  isset($_SESSION['id']) ?  $_SESSION['user']['username']  : '' ?></h3>
                <h3 class="form-control mb-4 text-dark" style="font-size:20px; background:skyblue;"> FULLNAME:
                    <?=  isset($_SESSION['id']) ?  $_SESSION['user']['fullname']  : '' ?></h3>
                <h3 class="form-control mb-4 text-dark" style="font-size:20px; background:skyblue;"> ADDRESS:
                    <?=  isset($_SESSION['id']) ?  $_SESSION['user']['address']  : '' ?></h3>
                <h3 class="form-control mb-4 text-dark" style="font-size:20px; background:skyblue;"> MOBILE:
                    <?=  isset($_SESSION['id']) ?  $_SESSION['user']['mobile']  : '' ?></h3>
                <h3 class="form-control mb-4 text-darak" style="font-size:20px;background:skyblue;"> EMAIL:
                    <?=  isset($_SESSION['id']) ?  $_SESSION['user']['email']  : '' ?></h3>
                <a class="btn btn-success float-end mt-3 p-4 pt-4" data-bs-toggle="modal"
                    data-bs-target="#openmodal" style="background:blue; color:white;">Edit</a>
                <a class="btn btn-warning float-end mt-3 me-2 p-4 pt-4" data-bs-toggle="modal"
                    data-bs-target="#changePasswordModal" style="background:green; color:white;">Change Password</a>
            </form>
        </div>

    </div>
</div>

</div>

<!-- Edit Modal -->
<div class="modal fade" id="openmodal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit User Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="profile-app">
                <form @submit.prevent="editDetails($event)">
                    <div class="mb-4">
                        <label for="username" class="form-label" style="font-size: 20px;">Username</label>
                        <input type="text" class="form-control" id="username" name="username" v-model="username">
                    </div>
                    <div class="mb-4">
                        <label for="fullname" class="form-label" style="font-size: 20px;">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" v-model="fullname">
                    </div>
                    <div class="mb-4">
                        <label for="address" class="form-label" style="font-size: 20px;">Address</label>
                        <input type="text" class="form-control" id="address" name="address" v-model="address">
                    </div>
                    <div class="mb-4">
                        <label for="mobile" class="form-label" style="font-size: 20px;">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" v-model="mobile">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label" style="font-size: 20px;">Email</label>
                        <input type="text" class="form-control" id="email" name="email" v-model="email">
                    </div>
                    <button type="submit" class="btn btn-primary" style="font-size:20px; background:green;" >Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


        <!-- Change Password Modal ----->
        <div class="modal fade" id="changePasswordModal" tabindex="-1"
            aria-labelledby="changePasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="changePassword($event)">
                        <div class="mb-3">
                            <label for="current-password" class="form-label" style="font-size: 20px; font-family: emoji;">Current Password</label>
                            <div class="password-toggle-container">
                                <input type="password" id="current-password" class="form-control" style="font-size: 20px; font-family: emoji;" v-model="currentPassword" required>
                                <i class="password-toggle fa fa-lock bg-light" id="toggleCurrentPassword"></i>
                            </div>
                            </div>

                            <div class="mb-3">
                            <label for="new-password" class="form-label" style="font-size: 20px; font-family: emoji;">New Password</label>
                            <div class="password-toggle-container">
                                <input type="password" id="new-password" class="form-control" style="font-size: 20px; font-family: emoji;" v-model="newPassword" required>
                                <i class="password-toggle fa fa-lock bg-light" id="toggleNewPassword"></i>
                            </div>
                            </div>

                            <div class="mb-3">
                            <label for="confirm-password" class="form-label" style="font-size: 20px; font-family: emoji;">Confirm Password</label>
                            <div class="password-toggle-container">
                                <input type="password" id="confirm-password" class="form-control" style="font-size: 20px; font-family: emoji;" v-model="confirmPassword" required>
                                <i class="password-toggle fa fa-lock bg-light" id="toggleConfirmPassword"></i>
                            </div>
                            </div>
                        <div class="text-center">
                                <button type="submit" class="btn btn-primary"
                                    style="font-size:20px; font-family:emoji; background:skyblue;">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>





<?php include './shared/scripts.php'; ?>

<script src="../src/product.js"></script>


<script>
                                const toggleCurrentPassword = document.querySelector("#toggleCurrentPassword");
                                const toggleNewPassword = document.querySelector("#toggleNewPassword");
                                const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");
                                const currentPassword = document.querySelector("#current-password");
                                const newPassword = document.querySelector("#new-password");
                                const confirmPassword = document.querySelector("#confirm-password");

                                toggleCurrentPassword.addEventListener("click", function () {
                                    const type = currentPassword.getAttribute("type") === "password" ? "text" : "password";
                                    currentPassword.setAttribute("type", type);
                                    this.classList.toggle("fa-lock");
                                    this.classList.toggle("fa-unlock");
                                });

                                toggleNewPassword.addEventListener("click", function () {
                                    const type = newPassword.getAttribute("type") === "password" ? "text" : "password";
                                    newPassword.setAttribute("type", type);
                                    this.classList.toggle("fa-lock");
                                    this.classList.toggle("fa-unlock");
                                });

                                toggleConfirmPassword.addEventListener("click", function () {
                                    const type = confirmPassword.getAttribute("type") === "password" ? "text" : "password";
                                    confirmPassword.setAttribute("type", type);
                                    this.classList.toggle("fa-lock");
                                    this.classList.toggle("fa-unlock");
                                });
</script>
    </div>




</body>

</html>