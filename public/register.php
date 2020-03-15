<html>
    <head>
        <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
        <title>Register</title>
    </head>
    <body class="container">
        <header class="py-5">
            <section class="row text-center">
                <h2 class="col-md-12">Registration form</h2>
            </section>

            <nav class="row text-center py-3">
                <a class="col-md-12" href="index.php">Click here to go back</a>
            </nav>
        </header>

        <main>
            <form class="row py-3" action="register.php" method="POST">
                <div class="col-md-6 text-center mx-auto">
                    <div class="form-group">
                        <label for="txtName">Enter username:</label>
                        <input class="form-control" type="text" name="txtName" id="txtName">
                    </div>

                    <div class="form-group">
                        <label for="nAge">Enter your age</label>
                        <input class="form-control" type="number" name="nAge" id="nAge">
                    </div>

                    <div class="form-group">
                        <label for="txtPassword">Enter password</label>
                        <input class="form-control" type="password" name="txtPassword" id="txtPassword">
                    </div>

                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </form>

            <section class="row py-3">
                <div class="col-md-6 text-center mx-auto">
                    <?php
                        // import controller and class
                        include('../classes/User.php');
                        include('../controller/register_controller.php');

                        // verify that the inputs values are valid
                        if(isset($_POST['txtName'], $_POST['nAge'], $_POST['txtPassword'])){
                            // initiate controller
                            $register_controller = new register_controller(
                                $_POST['txtName'],
                                $_POST['nAge'],
                                $_POST['txtPassword']
                            );

                            // request verification of the info
                            $register_controller->verifyInfo();

                            // check result and take dif actions
                            echo($register_controller->result());
                        }
                    ?>
                </div>
            </section>
        </main>
    </body>
</html>