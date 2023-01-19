<?php include_once('header.php'); ?>
<section class="login-panel">
    <div class="container">
        <div class="col-sm-6">
            <div class="page-header">
                <h4>Login info</h4>
            </div>
            <form action="control/login.php" method="POST">
                <div class="form-group">
                    <label for="">User Name</label>
                    <input type="text" class="form-control" name="username" placeholder="User Name">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-success">Login</button>
                <?php if(isset($_SESSION['login'])) { echo $_SESSION['login']; session_unset($_SESSION['login']); } ?>
            </form>
        </div>
        <div class="col-sm-6">
            <div class="page-header">
                <h4>Create an account</h4>
            </div>
            <form action="control/signin.php" method="POST">
                <div class="form-group">
                    <label for="">User Name</label>
                    <input type="text" class="form-control" name="username" placeholder="User Name">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <button type="submit" class="btn btn-success">Sign up</button>
                <?php if(isset($_SESSION['signup'])) { echo $_SESSION['signup']; session_unset($_SESSION['signup']); } ?>
            </form>
        </div>
    </div>
</section>
<footer class="footer">
    <span>Powered by syntex</span>
</footer>

<!-- script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/js.js"></script>
<!-- end of script -->

</body>
</html>