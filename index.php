<?php
    // if (isset($_SESSION['SESSION_EMAIL'])) {
    //     header("Location: home.php");
    //     die();
    // }

    include 'inc/header.php';

    $msg = "";

    if (isset($_GET['verification'])) {
        $verificationCode = $_GET['verification'];

        if (isEmailVerified($conn, $verificationCode)) {
            if (updateVerificationCode($conn, $verificationCode)) {
                $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
            }
        } else {
            header("Location: index.php");
        }
    }

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $user = loginUser($conn, $email, $password);

        if ($user) {
            if (empty($user['code'])) {
                $_SESSION['SESSION_EMAIL'] = $email;
                if($user['usernr']) {
                    $res_user = select_userById($conn, $user['usernr']);
                    $uuser = mysqli_fetch_assoc($res_user);
                    $_SESSION['fullname'] = $uuser['fullname'];
                    if(isUsernrExistsInMembers($conn, $user['usernr']) && $user["active"] == 1) {
                        header("Location: home.php");
                    } else {
                        header('Location: register-member.php');
                    }
                } else {
                    $msg = "<div class='alert alert-warning'>Something went wrong.</div>";
                }
            } else {
                $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
        }
    }
?>

<section class="container h-100">
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="d-flex gap-5">
            <div class="w-50 d-flex justify-content-center align-items-center bg-primary">
                <img src="assets/images/logo.png" alt="" class="w-75">
            </div>
            <div class="w-50 pt-3 pb-3">
                <h2>Login Now</h2>
                <p class="mt-3 mb-3">Plese fill these fields.. </p>
                <?php echo $msg; ?>
                <form action="" method="post">
                    <input type="email" class="form-control mt-3" name="email" placeholder="Enter Your Email" required>
                    <input type="password" class="form-control mt-3" name="password" placeholder="Enter Your Password" required>
                    <p class="mt-3 text-end">
                        <a href="forgot-password.php">
                            Forgot Password?
                        </a>
                    </p>
                    <button name="submit" class="btn btn-primary mt-3 w-100" type="submit">Login</button>
                </form>
                <p class="mt-3 text-center">Create Account!&nbsp;&nbsp;&nbsp;<a href="register.php">Register</a>.</p>
            </div>
        </div>
    </div>
</section>

<?php include 'inc/footer.php' ?>