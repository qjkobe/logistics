<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>注册</title>

    <!-- The stylesheet -->
    <link rel="stylesheet" href="css/stylereg.css" />
    <link rel="stylesheet" href="css/toastr.min.css"/>

    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/toastr.min.js"></script>
</head>
<style>
    #back{
        text-align: center;

        border: 1px solid #004C9B;
        border-radius: 3px 3px 3px 3px;
        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 1px rgba(0, 0, 0, 0.3);
        color: #D3EBFF;
        cursor: pointer;
        display: block;
        font: bold 24px Cambria,"Hoefler Text",serif;
        margin: 10px auto 0;
        padding: 10px;
        text-shadow: 0 -1px 0 #444444;
        width: 400px;

        background-color:#0496DA;

        background-image: linear-gradient(top, #0496DA 0%, #0067CD 100%);
        background-image: -o-linear-gradient(top, #0496DA 0%, #0067CD 100%);
        background-image: -moz-linear-gradient(top, #0496DA 0%, #0067CD 100%);
        background-image: -webkit-linear-gradient(top, #0496DA 0%, #0067CD 100%);
        background-image: -ms-linear-gradient(top, #0496DA 0%, #0067CD 100%);
        text-decoration:none;
    }

    #back:hover{

        background-color:#0383d3;

        background-image: linear-gradient(top, #0383d3 0%, #004c9b 100%);
        background-image: -o-linear-gradient(top, #0383d3 0%, #004c9b 100%);
        background-image: -moz-linear-gradient(top, #0383d3 0%, #004c9b 100%);
        background-image: -webkit-linear-gradient(top, #0383d3 0%, #004c9b 100%);
        background-image: -ms-linear-gradient(top, #0383d3 0%, #004c9b 100%);
    }

    #back:active{

        background-color:#026fcb;

        background-image: linear-gradient(top, #026fcb 0%, #004c9b 100%);
        background-image: -o-linear-gradient(top, #026fcb 0%, #004c9b 100%);
        background-image: -moz-linear-gradient(top, #026fcb 0%, #004c9b 100%);
        background-image: -webkit-linear-gradient(top, #026fcb 0%, #004c9b 100%);
        background-image: -ms-linear-gradient(top, #026fcb 0%, #004c9b 100%);
    }
</style>

<script>
    $(function(){
        $("#reg").click(function(){
            if($.trim($("#email").val()).length == 0){
                alertTips("error", "用户名不能为空", "error");
            }else if($.trim($("#password1").val()).length == 0){
                alertTips("error", "密码不能为空", "error");
            }else if($.trim($("#password2").val()).length == 0){
                alertTips("error", "请确认密码", "error");
            }else{
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8080/index/register",
                    data: $("#reg_form").serialize(),
                    dataType: "json",
                    success: function(data){
                        temp = eval(data);
                        if(temp.state == "error"){
                            alertTips("error", "出错了哦！你是不是做了坏事！", "error");
                        }else if(temp.state == "exist"){
                            alertTips("啊呀", "用户名已经被别人抢走了呢，重新起一个吧", "warning");
                        }else if(temp.state == "success"){
                            alertTips("success", "注册成功三秒后转跳到首页", "success");
                            setTimeout(function(){
                                window.location.href = "index.php";
                            }, 3000);
                        }
                    },
                    error: function(e){
                        alertTips("error", "服务器坏掉了呢(┬＿┬)", "error");
                    }
                });
            }
        })
    })
</script>

<body>
<div id="container">

    <div id="main">

        <h1>注册</h1>

        <form class="" method="post" id="reg_form" action="">

            <div class="row email">
                <input type="text" id="email" name="username" placeholder="用户名" />
            </div>
            <div class="row pass">
                <input type="password" id="password1" name="password" placeholder="密码" />
            </div>

            <div class="row pass">
                <input type="password" id="password2" name="password2" placeholder="密码（重复）" disabled="true" />
            </div>

            <!-- The rotating arrow -->
            <div class="arrowCap"></div>
            <div class="arrow"></div>

            <p class="meterText">Password Meter</p>

            <input type="button" id="reg" value="注册用户" />
            <a id="back"  href="index.php">返回</a>
        </form>
    </div>
</div>

<!-- JavaScript includes - jQuery, the complexify plugin and our own script.js -->

<script src="js/jquery.complexify.js"></script>
<script src="js/script.js"></script>
<script src="js/toastrfunction.js"></script>
</body>
</html>