<nav class="navbar navbar-default top-navbar" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">后台管理</a>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <li>
                    <a href="#">
                        <div>
                            <strong>金大仙</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                        </div>
                        <div>以后会做成提醒类型的消息</div>
                    </a>
                </li>

                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>Read All Messages</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-messages -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fa fa-tasks fa-fw"></i>
                <span class="badge badge-default" id="order-ing" style="display: none">0</span>
                <i id="down" class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-tasks" id="orders">

            </ul>
            <!-- /.dropdown-tasks -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-comment fa-fw"></i> New Comment
                            <span class="pull-right text-muted small">4 min</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-envelope fa-fw"></i> Message Sent
                            <span class="pull-right text-muted small">4 min</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-tasks fa-fw"></i> New Task
                            <span class="pull-right text-muted small">4 min</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                            <span class="pull-right text-muted small">4 min</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-alerts -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
</nav>
<script>
    $(function(){
        $.ajax({
            type: "POST",
            url: "http://localhost:8080/admin/getOrdering",
            data: {
                username: "<?php echo $_SESSION['adminname']?>"
            },
            dataType: "json",
            success: function(data){
                temp = eval(data);
                orderlist = temp.orders;
                if(orderlist.length != 0){
                    $("#down").hide();
                    $("#order-ing").show();
                    $("#order-ing").html(orderlist.length);
                    var strhtml = "";
                    for(var i = 0; i < orderlist.length; i++){
                        strhtml = strhtml + "<li>";
                        strhtml = strhtml + "<a href='orderlist.php'>";
                        strhtml = strhtml + "<div><p><strong>订单-" + orderlist[i].destination + "</strong>";
                        strhtml = strhtml + '<span class="pull-right text-muted">60% Complete</span></p>';
                        strhtml = strhtml + '<div class="progress progress-striped active">';
                        strhtml = strhtml + '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">';
                        strhtml = strhtml + '<span class="sr-only">60% Complete (success)</span>';

                        strhtml = strhtml + "</div></div></div></a>"
                        strhtml = strhtml + "</li>";
                    }
                    strhtml = strhtml + '<li class="divider"></li>';
                    strhtml = strhtml + '<li><a class="text-center" href="orderlist.php"><strong>所有订单</strong><i class="fa fa-angle-right"></i></a></li>';
                    $("#orders").html(strhtml);
                }
            }
        });
    });

</script>