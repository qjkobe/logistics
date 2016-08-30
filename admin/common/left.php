<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a class="<?php if($menu == "index")echo "active-menu"?>" href="index.php"><i class="fa fa-dashboard"></i> 首页仪表盘</a>
            </li>
            <li>
                <a class="<?php if($menu == "staff")echo "active-menu"?>" href="staffList.php"><i class="fa fa-desktop"></i> 员工信息</a>
            </li>
            <li>
                <a class="<?php if($menu == "client")echo "active-menu"?>" href="clientList.php"><i class="fa fa-bar-chart-o"></i> 客户信息</a>
            </li>
            <li>
                <a class="<?php if($menu == "place")echo "active-menu"?>" href="placeList.php"><i class="fa fa-qrcode"></i> 地点信息</a>
            </li>

            <li>
                <a class="<?php if($menu == "orderlist")echo "active-menu"?>" href="orderlist.php"><i class="fa fa-table"></i> 订单详细</a>
            </li>
            <li>
<!--                <a href="#"><i class="fa fa-edit"></i> 个人信息修改 </a>-->
            </li>


<!--            <li>-->
<!--                <a href="#"><i class="fa fa-sitemap"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>-->
<!--                <ul class="nav nav-second-level">-->
<!--                    <li>-->
<!--                        <a href="#">Second Level Link</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">Second Level Link</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">Second Level Link<span class="fa arrow"></span></a>-->
<!--                        <ul class="nav nav-third-level">-->
<!--                            <li>-->
<!--                                <a href="#">Third Level Link</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="#">Third Level Link</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="#">Third Level Link</a>-->
<!--                            </li>-->
<!---->
<!--                        </ul>-->
<!---->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
            <li>
                <a id="logout" href="javascript:void(0);"><i class="fa fa-fw fa-file"></i>登出</a>
            </li>
        </ul>

    </div>

</nav>
<script>
    $(function(){
        $("#logout").click(function(){
            $.ajax({
                type: "POST",
                url: "function/logout.php",
                dataType: "text",
                data: {},
                success: function(data){
                    window.location.href = "../index.php";
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {

                }
            });
        })
    });

</script>