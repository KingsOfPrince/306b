<?php require "view/blocks/page_start.php";?>

<div class="login">
        <h1 class="log-in">Sign-in</h1>
        <form id="login">
            <label><b>Username</b></label>
            <input class="username" type="text" id="username" placeholder="Username">
            <br>
            <br>
            <label><b>Password</b></label>
            <input class="password" type="password" id="password" placeholder="Password">
            <br>
            <br>
            <button class="log-in" id="log-in">login</button>
        </form>
    </div>

    <script src="controller/authentication.js"></script>
<?php require "view/blocks/page_end.php";?>