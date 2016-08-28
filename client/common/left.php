<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a class="<?php if($menu == "index") echo "active-menu"?>" href="index.php"><i class="fa fa-dashboard"></i> 首页仪表盘</a>
            </li>
            <li>
                <a class="<?php if($menu == "goods") echo "active-menu"?>" href="goodslist.php"><i class="fa fa-desktop"></i> 我的物品</a>
            </li>
            <li>
                <a class="<?php if($menu == "orderlist") echo "active-menu"?>" href="orderlist.php"><i class="fa fa-bar-chart-o"></i> 我的订单</a>
            </li>
            <li>
                <a class="<?php if($menu == "orderdetails") echo "active-menu"?>" href="#"><i class="fa fa-qrcode"></i> 订单详细</a>
            </li>

            <li>
                <a class="<?php if($menu == "addgoods") echo "active-menu"?>" href="index.php"><i class="fa fa-table"></i> 物品提交</a>
            </li>
            <li>
                <a class="<?php if($menu == "info") echo "active-menu"?>" href="#"><i class="fa fa-edit"></i> 个人信息修改 </a>
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
                <a id="logout" href="javascript:;"><i class="fa fa-fw fa-file"></i> 登出</a>
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