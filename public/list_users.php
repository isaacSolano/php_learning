<html>
    <head>
        <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
        <title>List</title>
    </head>
    <body class="container">
        <header class="py-5">
            <section class="row text-center">
                <h2 class="col-md-12">List of users</h2>
            </section>

            <?php
                include('./header.php');
            ?>
        </header>

        <main>
            <section class="row">            
                <table class="col-md-12 table text-center mx-auto">
                    <thead>
                        <tr class="row">
                            <th class="col-md-4">Name</th>
                            <th class="col-md-4">Last name</th>
                            <th class="col-md-4">Action</th>
                        </tr>
                    </thead>

                    <tbody>                        
                        <?php
                            include('../controller/list_users_controller.php');
                        
                            $list_users_controller = new list_users_controller();

                            $aUsers = $list_users_controller->getUsers();
                        
                            foreach($aUsers as $user){
                                echo('
                                    <tr class="row">
                                        <td class="col-md-4">'. $user->name .'</td>
                                        <td class="col-md-4">'. $user->last_name .'</td>
                                        <td class="col-md-4">
                                            <form action="./user.php" method="GET">
                                                    <input type="hidden" name="user_id" value="'. $user->id .'">
                        
                                                    <input class="btn btn-primary" type="submit" value="More">
                                            </form>
                                        </td>
                                    </tr>
                                ');
                            }
                        ?>
                    </tbody>
                </table>
            </section>
        </main>
    </body>
</html>