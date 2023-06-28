<?php include './shared/head.php'; 
?>

<div id="app">
  <?php
        if(isset($_SESSION['id']) && $_SESSION['user']['role'] == 0) {
            header('location: index.php');
        } else if(isset($_SESSION['id']) && $_SESSION['user']['role'] == 1) {
            header('location: ../back-end.php/index.php');
        }
        include './shared/header.php';
        include './shared/mobile-header.php';
        ?>

  <!-- Breadcrumb Section Start -->
  <section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
      <div class="row">
        <div class="col-12">
          <div class="breadscrumb-contain">
            <h2 class="mb-2">Log In</h2>
            <nav>
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                  <a href="index.php">
                    <i class="fa-solid fa-house"></i>
                  </a>
                </li>
                <li class="breadcrumb-item active">Log In</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- log in section start -->
  <section class="log-in-section background-image-2 section-b-space">
    <div class="container-fluid-lg w-100">
      <div class="row">
        <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
          <div class="image-contain">
            <img src="../assets/images/inner-page/log-in.png" class="img-fluid"
              alt="">
          </div>
        </div>

        <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
          <div class="log-in-box">
            <div class="log-in-title">
              <h3>Welcome To CFC</h3>
              <h4>Log In Your Account</h4>
            </div>

            <div class="input-box">
              <form @submit='login' class="row g-4">
                <div class="col-12">
                  <div class="form-floating theme-form-floating log-in-form">
                    <input type="text" class="form-control" name="username"
                      placeholder="Email Address">
                    <label for="email">Username</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating theme-form-floating log-in-form">
                    <input type="password" class="form-control" name="password" id="idpassword"
                      placeholder="Password">
                      <i class="fa-regular fa-eye" id="togglePassword" style="position: absolute; right: 20px; top: 20px; cursor: pointer;"></i>
                    <label for="password">Password</label>
                  </div>
                </div>

                <div class="col-12">
                  <button class="btn btn-animation w-100 justify-content-center"
                    type="submit">Log
                    In</button><span id="message error"> {{error}} </span>
                  
                </div>
              </form>
            </div>

            <div class="sign-up-box">
              <h4>Don't have an account?</h4>
              <a href="sign-up.php">Sign Up</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- log in section end -->

  <!-- Footer Section Start -->
  <?php include './shared/footer.php'; ?>
  <!-- Footer Section End -->

  <!-- Tap to top start -->
  <div class="theme-option">

    <div class="back-to-top">
      <a id="back-to-top" href="#">
        <i data-feather="chevron-up" class="text-white"></i>
      </a>
    </div>
  </div>
  <!-- Tap to top end -->

  <!-- Bg overlay Start -->
  <div class="bg-overlay"></div>
  <!-- Bg overlay End -->
</div>

<?php include './shared/scripts.php'; ?>
<script src="../src/user.js"></script>

<script>

const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#idpassword");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

</script>

</body>

</html>