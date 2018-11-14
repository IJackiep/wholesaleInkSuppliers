<div class="welcomeDiv">
    <i>Admin Login</i>
</div>
<hr>
<div class="formContainer">
    <div class="formBox">
        <div class="adminForm">
        <form action="admin.php?page=adminLogin" method="post">
            <p>Username: &nbsp &nbsp <input name="username" class="username"/> </p>
            <p>Password: &nbsp &nbsp <input type="password" name="password" class="password"/> </p>
            <?php
                if(isset($_GET['error'])){
                    echo "<span class=\"error\">Incorrect username or password</span>";
                }
            ?>

            <p><input type="submit" name="login" style="float: right;"/></p>
        </form>
            </div>
    </div>
</div>
