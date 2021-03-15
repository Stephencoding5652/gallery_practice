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

                        // $user->username = "newuser";
                        // $user->save();

                        // $user->username = "asdasd";
                        // $user->password = "asdasd";
                        // $user->first_name = "asdasd";
                        // $user->last_name = "asdasd";

                        // $user->create();

                        // $user = User::find_user_by_id(4);

                        // $user->username = "zxczxc";
                        // $user->password = "zxczxc";
                        // $user->first_name = "zxczxc";
                        // $user->last_name = "zxczxc";

                        // $user->update();

                        // $photos = Photo::find_all();

                        // foreach($photos as $photo){
                        //     echo $photo->title . "<br>";
                        // }

                        $photo = new Photo();

                        $photo->title = "eric";
                        $photo->description = "eric";
                        $photo->filename = "eric";
                        $photo->type = "eric";
                        $photo->size = 2;

                        $photo->save();
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