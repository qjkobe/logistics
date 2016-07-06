<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>注册</title>

    <!-- The stylesheet -->
    <link rel="stylesheet" href="css/stylereg.css" />

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
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

<body>
<div id="container">

    <div id="main">

        <h1>注册</h1>

        <form class="" method="post" action="client/register.php">

            <div class="row email">
                <input type="text" id="email" name="email" placeholder="用户名" />
            </div>
            <?php
            session_start();
            if($_SESSION['errormsg']=="用户名重复"||$_SESSION['errormsg']=="数据库错误，请联系管理员"){
                echo '<div class="alert alert-danger">';
                echo "<strong>错误！</strong>".$_SESSION['errormsg'];
                echo "</div>";
                $_SESSION['errormsg'] = "";
            }
            ?>
            <div class="row pass">
                <input type="password" id="password1" name="password1" placeholder="密码" />
            </div>

            <div class="row pass">
                <input type="password" id="password2" name="password2" placeholder="密码（重复）" disabled="true" />
            </div>

            <!-- The rotating arrow -->
            <div class="arrowCap"></div>
            <div class="arrow"></div>

            <p class="meterText">Password Meter</p>

            <input type="submit" value="注册用户" />
            <a id="back"  href="index.php">返回</a>
        </form>
    </div>
</div>

<!-- JavaScript includes - jQuery, the complexify plugin and our own script.js -->
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery.complexify.js"></script>
<script src="js/script.js"></script>

</body>
</html>