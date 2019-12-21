<div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="customer-page.php" class="logo "><img src="assets/logo.png" style="width: 50px; height: 50px;"><span><img src="assets/logotsis.png" style="width: 150px; height: 50px;"></span></a>
                        <!-- Image Logo here -->
                        <!--<a href="customer-page.php" class="logo">-->
                            <!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
                            <!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
                        <!--</a>-->
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                        <i class="icon-list"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>



                            <ul class="nav navbar-nav navbar-right pull-right">
                                    <li class="dropdown top-menu-item-xs">
                                            <?php 
                                        if (!is_null($row['image'])) {
                                         ?>
                                          <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><img src="<?php echo $upload_dir.$row['image'] ?>"  class="img-circle"><span>&nbsp;&nbsp;&nbsp;<strong class="hidden-xs"><?php  echo $row['name']; ?> </strong><i class="glyphicon glyphicon-chevron-down" style="font-size: 7px;"></i></span> </a>
                                         <?php
                                        }else {
                                         ?>
                                          <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><i class="md md-account-circle" style="font-size: 35px;"></i><span>&nbsp;&nbsp;&nbsp;<strong class="hidden-xs"><?php  echo $row['name']; ?> </strong><i class="glyphicon glyphicon-chevron-down" style="font-size: 7px;"></i></span> </a>
                                         <?php   
                                        }
                                       ?>
                                            <ul class="dropdown-menu">
                                                    <li class="hidden-lg hidden-md hidden-sm"><i class="m-r-10"></i><strong class="text-custom"><?php  echo $row['name']; ?></strong></li>
                                                    <li class="divider"></li>
                                                    <li><a href="cancel-app.php"><i class="fa fa-eye m-r-10"></i>Show Appointment</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="customer-info.php?id=<?php echo $row['cid'] ?>"><i class="md md-settings m-r-10"></i>Account Settings</a></li>
                                                <li><a href="customer-logout.php"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
                                            </ul>
                                        </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
