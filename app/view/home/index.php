<?php
require __DIR__ . '/../head.php';
require __DIR__ . '/../nav.php';
?>

<body>
    <div class="container home">

        <!-- Header of home page -->
        <h1 class="mt-5">Welcome to Bram's hardware store</h1>
        <p>Here you can buy all your hardware products you desire.</p>

        <?php if (!isset($_SESSION['logged_User'])) { ?>
            <div class="border w-75 mt-5 p-2">
                <!-- registration form for customers -->
                <h2>To enjoy the ultimate experience, register yourself down below:</h2>
                <form class="w-25" action="user/insert" method="POST">
                    <div class="form-group">
                        <label for="inputName">Full name:</label>
                        <input type="text" class="form-control" name="inputName" placeholder="Enter name..." required>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail">Email address:</label>
                        <input type="email" class="form-control" name="inputEmail" placeholder="Enter email..." required>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Address:</label>
                        <input type="text" class="form-control" name="inputAddress" placeholder="Enter Address..." required>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword">Password:</label>
                        <input type="password" class="form-control" name="inputPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>

        <?php } ?>
    </div>
</body>