<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--[if lt IE 9]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>1004物流</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lte IE 8]>
    <script type="text/javascript" src="http://explorercanvas.googlecode.com/svn/trunk/excanvas.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
    <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/da-slider.css" />
    <!-- Owl Carousel Assets -->
    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css" />
    <!-- Font Awesome -->
    <link href="font/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        //显示灰色 jQuery 遮罩层
        function radio1() {
            document.getElementById("radio1").checked = "checked";
        }
        function radio2() {
            document.getElementById("radio2").checked = "checked";
        }
        function radio3() {
            document.getElementById("radio3").checked = "checked";
        }
        function showBg() {
            var bh = $("body").height();
            var bw = $("body").width();
            $("#fullbg").css({
                height:bh,
                width:bw,
                display:"block"
            });
            $("#firstname").val("");
            $("#password").val("");
            $(".alert").hide();
            $("#dialog").show();
        }
        //关闭灰色 jQuery 遮罩
        function closeBg() {
            $("#fullbg,#dialog").hide();
        }
    </script>
    <style type="text/css">
        body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:12px;
            margin:0;
        }
        #main {

        }

        #fullbg {
            background-color:gray;
            left:0;
            opacity:0.5;
            position:absolute;
            top:0;
            z-index:1000;
            filter:alpha(opacity=50);
            -moz-opacity:0.5;
            -khtml-opacity:0.5;
        }
        #dialog {
            background-color:#fff;
            border:5px solid rgba(0,0,0, 0.4);
            height:380px;
            left:50%;
            margin:-200px 0 0 -200px;
            padding:1px;
            position:fixed !important; /* 浮动对话框 */
            position:absolute;
            top:50%;
            width:400px;
            z-index:2000;
            border-radius:5px;
            display:none;
        }
        /*#close { background:url(img/close.jpg); position:absolute; right:10px; top:10px;}*/
        /*#close:hover{background: url(img/close_hover.jpg)}*/
        #dialog p {
        }

    </style>
</head>

<body>
<header class="header">
    <div class="container">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand scroll-top logo"><b>1004Logistics</b></a>
            </div>
            <!--/.navbar-header-->
            <div id="main-nav" class="collapse navbar-collapse">
                <ul class="nav navbar-nav" id="mainNav">
                    <li class="active"><a href="#home" class="scroll-link">首页</a></li>
                    <li><a href="#aboutUs" class="scroll-link">登录</a></li>
                    <li><a href="#portfolio" class="scroll-link">信息</a></li>
                    <li><a href="#contactUs" class="scroll-link">联系</a></li>
                </ul>
            </div>
            <!--/.navbar-collapse-->
        </nav>
        <!--/.navbar-->
    </div>
    <!--/.container-->
</header>
<!--/.header-->
<div id="#top"></div>
<section id="home">
    <div class="banner-container">
        <img src="images/banner-bg.jpg" alt="banner" />
        <div class="container banner-content">
            <div id="da-slider" class="da-slider">
                <div class="da-slide">
                    <h2>最好的物流公司</h2>
                    <p>Best Logistics Company!!!</p>
                    <div class="da-img"></div>
                </div>
                <div class="da-slide">
                    <h2>最快捷的运达服务</h2>
                    <p>The Fastest Transform Services!!!</p>
                    <div class="da-img"></div>
                </div>
                <div class="da-slide">
                    <h2>最安全的物流</h2>
                    <p>The Most Safe Logistics!!!</p>
                    <div class="da-img"></div>
                </div>
                <div class="da-slide">
                    <h2>万千客户的选择</h2>
                    <p>Millions Of Client's Choice</p>
                    <div class="da-img"></div>
                </div>
                <!--  <nav class="da-arrows">
                        <span class="da-arrows-prev"></span>
                        <span class="da-arrows-next"></span>
                    </nav> -->
            </div>
        </div>
    </div>
</section>
<section id="introText">
    <div class="container">
        <div class="text-center">
            <h1>1004物流</h1>
            <p>我们创建于1016年，迄今已有千年历史，我们帮杨贵妃运送过荔枝，帮乾隆运送过笔墨，朝廷变更，我们却始终如一。在如今这个信息化的时代，我们也与时俱进，使用在线平台进行管理。</p>
        </div>
    </div>

</section>
<!--About-->
<section id="aboutUs" class="secPad">
    <div class="container">
        <div class="heading text-center">
            <!-- Heading -->
            <h2>点击下方进行登录</h2>
            <p>左侧为管理员通道，中间为客户通道，右侧为员工通道</p>
        </div>
        <div class="row">
            <!-- item -->
            <div class="col-md-4 text-center tileBox">
                <div class="txtHead"> <i class="fa fa-user"></i>
                    <h3>管理员 <span class="id-color">登录</span></h3></div>
                <p><a href="javascript:showBg();radio1();" class='btn btn-primary btn-block'>登录</a></p>
            </div>
            <!-- end: -->

            <!-- item -->
            <div class="col-md-4 text-center tileBox">
                <div class="txtHead"><i class="fa fa-users"></i>
                    <h3>客户 <span class="id-color">登录</span></h3></div>
                <p><a href="javascript:showBg();radio2();" class='btn btn-primary' style='width:160px;'>登录</a><a href="reg.php" class='btn btn-primary' style='width:160px;'>注册</a></p>
            </div>
            <!-- end: -->

            <!-- item -->
            <div class="col-md-4 text-center tileBox">
                <div class="txtHead"><i class="fa fa-user"></i>
                    <h3>员工 <span class="id-color">登录</span></h3></div>
                <p><a href="javascript:showBg();radio3();" class='btn btn-primary btn-block'>登录</a></p>
            </div>
            <!-- end: -->
        </div>
    </div>
</section>
<!--Quote-->
<section id="quote" class="bg-parlex">
    <div class="parlex-back">
        <div class="container secPad text-center">
            <h2>如果有人问我们追求的是什么，我想说：更快，更安全，更好的服务</h2><h3>-我们的宗旨</h3>
        </div>
        <!--/.container-->
    </div>
</section>



<!--Portfolio-->
<section id="portfolio" class="page-section section appear clearfix secPad">
    <div class="container">

        <div class="heading text-center">
            <!-- Heading -->
            <h2>我们的办公室</h2>
            <p>如果你对我们感兴趣，欢迎加入我们</p>
        </div>

        <div class="row">
            <nav id="filter" class="col-md-12 text-center">
                <ul>
                    <li><a href="#" class="current btn-theme btn-small" data-filter="*">全部</a></li>
                    <li><a href="#" class="btn-theme btn-small" data-filter=".webdesign">工作室</a></li>
                    <li><a href="#" class="btn-theme btn-small" data-filter=".photography">成员照</a></li>
                    <li><a href="#" class="btn-theme btn-small" data-filter=".print">合影</a></li>
                </ul>
            </nav>
            <div class="col-md-12">
                <div class="row">
                    <div class="portfolio-items isotopeWrapper clearfix" id="3">

                        <article class="col-sm-4 isotopeItem webdesign">
                            <div class="portfolio-item">
                                <img src="images/portfolio/img1.jpg" alt="" />
                                <div class="portfolio-desc align-center">
                                    <div class="folio-info">
                                        <a href="images/portfolio/img1.jpg" class="fancybox">
                                            <h5>我们的水桶</h5>
                                            <i class="fa fa-arrows-alt fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="col-sm-4 isotopeItem photography">
                            <div class="portfolio-item">
                                <img src="images/portfolio/img2.jpg" alt="" />
                                <div class="portfolio-desc align-center">
                                    <div class="folio-info">
                                        <a href="images/portfolio/img2.jpg" class="fancybox">
                                            <h5>李炳阳</h5>
                                            <i class="fa fa-arrows-alt fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>


                        <article class="col-sm-4 isotopeItem photography">
                            <div class="portfolio-item">
                                <img src="images/portfolio/img3.jpg" alt="" />
                                <div class="portfolio-desc align-center">
                                    <div class="folio-info">
                                        <a href="images/portfolio/img3.jpg" class="fancybox">
                                            <h5>吴昌鹏</h5>
                                            <i class="fa fa-arrows-alt fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="col-sm-4 isotopeItem print">
                            <div class="portfolio-item">
                                <img src="images/portfolio/img4.jpg" alt="" />
                                <div class="portfolio-desc align-center">
                                    <div class="folio-info">
                                        <a href="images/portfolio/img4.jpg" class="fancybox">
                                            <h5>公司大门</h5>
                                            <i class="fa fa-arrows-alt fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="col-sm-4 isotopeItem photography">
                            <div class="portfolio-item">
                                <img src="images/portfolio/img5.jpg" alt="" />
                                <div class="portfolio-desc align-center">
                                    <div class="folio-info">
                                        <a href="images/portfolio/img5.jpg" class="fancybox">
                                            <h5>qjkobe</h5>
                                            <i class="fa fa-arrows-alt fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="col-sm-4 isotopeItem webdesign">
                            <div class="portfolio-item">
                                <img src="images/portfolio/img6.jpg" alt="" />
                                <div class="portfolio-desc align-center">
                                    <div class="folio-info">
                                        <a href="images/portfolio/img6.jpg" class="fancybox">
                                            <h5>垃圾堆</h5>
                                            <i class="fa fa-arrows-alt fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="col-sm-4 isotopeItem print">
                            <div class="portfolio-item">
                                <img src="images/portfolio/img7.jpg" alt="" />
                                <div class="portfolio-desc align-center">
                                    <div class="folio-info">
                                        <a href="images/portfolio/img7.jpg" class="fancybox">
                                            <h5>门外</h5>
                                            <i class="fa fa-arrows-alt fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="col-sm-4 isotopeItem photography">
                            <div class="portfolio-item">
                                <img src="images/portfolio/img8.jpg" alt="" />
                                <div class="portfolio-desc align-center">
                                    <div class="folio-info">
                                        <a href="images/portfolio/img8.jpg" class="fancybox">
                                            <h5>孙霖</h5>
                                            <i class="fa fa-arrows-alt fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="col-sm-4 isotopeItem print">
                            <div class="portfolio-item">
                                <img src="images/portfolio/img9.jpg" alt="" />
                                <div class="portfolio-desc align-center">
                                    <div class="folio-info">
                                        <a href="images/portfolio/img9.jpg" class="fancybox">
                                            <h5>阿里云</h5>
                                            <i class="fa fa-arrows-alt fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                </div>


            </div>
        </div>

    </div>
</section>

<!--Contact -->
<section id="contactUs" class="page-section secPad">
    <div class="container">

        <div class="row">
            <div class="heading text-center">
                <!-- Heading -->
                <h2>让我们保持联系</h2>
                <p>感谢你选择我们，欢迎你加入我们。在下方联系我们</p>
            </div>
        </div>

        <div class="row mrgn30">
            <div class="col-sm-12 col-md-8">
                <!--NOTE: Update your email Id in "contact_me.php" file in order to receive emails from your contact form-->
                <form name="sentMessage" id="contactForm"  novalidate>
                    <h3>联系</h3>
                    <div class="control-group">
                        <div class="controls">
                            <input type="text" class="form-control"
                                   placeholder="姓名" id="name" required
                                   data-validation-required-message="Please enter your name" />
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="email" class="form-control" placeholder="邮箱"
                                   id="email" required
                                   data-validation-required-message="Please enter your email" />
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
		<textarea rows="10" cols="100" class="form-control"
                  placeholder="正文" id="message" required
                  data-validation-required-message="Please enter your message" minlength="5"
                  data-validation-minlength-message="Min 5 characters"
                  maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"> </div> <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary pull-right">Send</button><br />
                </form>
            </div>
            <div class="col-sm-12 col-md-2">
                <h4>地址:</h4>
                <address>
                    1004<br>
                    上大路98号<br>
                    银河系太阳系地球中国上海 <br>
                </address>
                <h4>联系电话:</h4>
                <address>
                    110-119-120<br>
                </address>
            </div>
        </div>
    </div>
    <!--/.container-->
</section>
<div id="main">
    <div id="fullbg" onclick="closeBg();"></div>
    <div id="dialog" class="panel">
        <p class="close"><a id="close" href="front!index.action" onclick="closeBg();"></a></p>
        <h2 class="text-center panel-heading">登录</h2>
        <form class="form-horizontal" role="form" method="post" id="login_form" action="">
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label" >用户</label>
                <div class="col-sm-9">
                    <input name="username" type="text" class="form-control" id="firstname"
                           placeholder="用户名" required>
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label" >密码</label>
                <div class="col-sm-9">
                    <input name="password" type="password" class="form-control" id="password"
                           placeholder="密码" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <label class="checkbox-inline">
                        <input type="radio" name="type" id="radio1"
                               value="0" checked> 管理员
                    </label>
                    <label class="checkbox-inline">
                        <input type="radio" name="type" id="radio2"
                               value="2"> 客户
                    </label>
                    <label class="checkbox-inline">
                        <input type="radio" name="type" id="radio3"
                               value="1"> 员工
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-9">
                    <button type="button" id="login" class="btn btn-primary btn-block">登录</button>
                </div>
            </div>
            <div class="alert alert-danger" style="display: none;">
                <strong>错误!</strong> 用户名或密码错误
            </div>
        </form>
    </div>
</div>

<script>
    $(function(){
        $("#login").click(function(){
            $.ajax({
                type: "POST",
                url: "http://localhost:8080/index/login",
                data: $("#login_form").serialize(),
                dataType: "json",
                success: function(data){
                    temp = eval(data);
                    if(temp.username == null){
                        $(".alert").show();
                    }else{
                        window.location.href = temp.type + "/index.php?username=" + temp.username;
                    }
                }
            })
        })
    })
</script>

<footer>
    <div class="container">
        <div class="social text-center">
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-flickr"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>
        </div>

        <div class="clear"></div>
        <!--CLEAR FLOATS-->
    </div>
</footer>
<!--/.page-section-->
<section class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                Copyright &copy; 2016.Qjkobe All rights reserved.<a target="_blank" href="http://blog.qjkobe.com">QJKOBE</a>
            </div>
        </div>
        <!-- / .row -->
    </div>
</section>
<a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a>

<script src="js/modernizr-latest.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.isotope.min.js" type="text/javascript"></script>
<script src="js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="js/jquery.nav.js" type="text/javascript"></script>
<script src="js/jquery.cslider.js" type="text/javascript"></script>

<script src="js/custom.js" type="text/javascript"></script>
<script src="js/owl-carousel/owl.carousel.js"></script>
</body>
</html>
