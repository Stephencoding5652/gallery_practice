<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Subheading</small>
                        </h1>
                        <?php

                        // $users = User::find_all_users();

                        // foreach($users as $user){
                        //     echo $user->username . "<br>";
                        // }
                        // $found_user = User::find_user_by_id(1);
                        // $user = User::instantation($found_user);

                        // $user->id = $found_user['user_id'];
                        // $user->username = $found_user['username'];
                        // $user->password = $found_user['password'];
                        // $user->first_name = $found_user['first_name'];
                        // $user->last_name = $found_user['last_name'];
                        // echo $user->id;

                        $found_user = User::find_user_by_id(1);
                        echo $found_user->username;

                        ?>

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->