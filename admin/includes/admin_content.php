<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Subheading</small>
                        </h1>
                        <?php

                        // $user = new User();

                        // $user->username = "qweqwe";
                        // $user->password = "qweqwe";
                        // $user->first_name = "qweqwe";
                        // $user->last_name = "qweqwe";

                        // $user->create();

                        $user = User::find_user_by_id(4);

                        $user->username = "zxczxc";
                        $user->password = "zxczxc";
                        $user->first_name = "zxczxc";
                        $user->last_name = "zxczxc";

                        $user->update();
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