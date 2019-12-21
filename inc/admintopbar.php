<div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="admin-page.php" class="logo "><img src="assets/logo.png" style="width: 50px; height: 50px;"><span><img src="assets/logotsis.png" style="width: 150px; height: 50px;"></span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
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
                                                    <li><a href="admin-info.php"><i class="md md-settings m-r-10"></i>Account Settings</a></li>
                                                <li><a href="admin-logout.php"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
                                            </ul>
                                        </li>

                                        <li class="dropdown top-menu-item-xs">
                                       <a href="#" class="dropdown-toggle notif-admin" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell"></span></a>
                                   <ul class="dropdown-menu notif-menu-admin"style="height: auto; max-height: 500px;
                                    overflow-x: hidden;">     
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

                     <script src="inc/jquery.min.js"></script>

                    <script>
            $(document).ready(function(){
             
             function load_unseen_notification(view = '')
             {
              $.ajax({
               url:"fetch-admin.php",
               method:"POST",
               data:{view:view},
               dataType:"json",
               success:function(data)
               {
                $('.notif-menu-admin').html(data.notification);
                if(data.unseen_notification > 0)
                {
                 $('.count').html(data.unseen_notification);
                }
               }
              });
             }
             
             load_unseen_notification();
             
             $(document).on('click', '.notif-admin', function(){
              $('.count').html('');
              load_unseen_notification('yes');
             });
             
             setInterval(function(){ 
              load_unseen_notification();; 
             }, 5000);
             
            });
            </script>