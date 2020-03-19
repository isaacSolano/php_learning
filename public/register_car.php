<html>
    <head>
        <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
        <title>Register Car</title>
    </head>
    <body class="container">
        <header class="py-5">
            <?php
                session_start();

                $user_id = $_SESSION['user_id'];
                $user_name = $_SESSION['user_name'];

                echo('
                    <section class="row text-center">
                        <h2 class="col-md-12">Hello '. $user_name .', register your car</h2>
                    </section>
                ');

                include('./header.php');
            ?>
        </header>

        <main>
            <form class="row py-3" action="register_car.php" method="POST">
                <div class="col-md-6 text-center mx-auto">
                    <div class="form-group">
                        <label for="txBrand">Enter your car's brand:</label>
                        <input class="form-control" type="text" name="txtBrand" id="txBrand">
                    </div>

                    <div class="form-group">
                        <label for="txtColor">Enter your car's color:</label>
                        <input class="form-control" type="text" name="txtColor" id="txtColor">
                    </div>

                    <div class="form-group">
                        <label for="txtId">Enter your car's plate number:</label>
                        <input class="form-control" type="text" name="txtId" id="txtId">
                    </div>

                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </form>

            <section class="row py-3">
                <div class="col-md-6 text-center mx-auto">
                    <?php
                        include('../controller/register_car_controller.php');

                        if(isset($_POST['txtBrand'], $_POST['txtColor'], $_POST['txtId'])){
                            $register_car_controller = new register_car_controller(
                                $_POST['txtBrand'],
                                $_POST['txtColor'],
                                $_POST['txtId'],
                                $user_id
                            );

                            $post = $register_car_controller->verifyInfo();

                            if($post){
                                $status = $register_car_controller->insert();

                                if(!$status->err){
                                    echo('
                                        <p class="text-success">'. $status->status .'</p>
                                    ');
                                }else{
                                    echo('
                                        <p class="text-danger">'. $status->status .'</p>
                                    ');
                                }
                            }else{
                                echo('
                                    <p class="text-danger">There is an error with the fields</p>
                                ');
                            }
                        }
                    ?>
                </div>
            </section>
        </main>
    </body>
</html>