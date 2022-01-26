<?php 
session_start();

if(!isset($_SESSION['user']) or 
    $_SESSION['user']!='admin')
{
header("Location: errorpage.html");
    exit();
}

?>



<!DOCTYPE HTML>

<html>
    <html lang="ar"></html>
	<head>
		<title>أمانة الاحساء</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
<a href="https://www.alhasa.gov.sa/">
                       <img src="images/AlhasaMunic.jpg" hight="800" width="200" alt="" >
                    </a>
					<nav id="nav">
						<a href="coninfopage.html">استعلام المخالفات</a>
                        <a href="logout.php">تسجيل الخروج</a>
						<a href="index.html">الرئيسية</a>
  
					</nav>
				</div>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>


		<!-- Three -->
			<section id="three">
				<div class="inner">
					<article>
						<div class="content">
                            <div class="x1"><span  class="icon fa-users"></span></div>
                                  <header class="x1">
								<h3 >التحكم بالموظفين</h3>
							</header>
							<p class="x1"> بوابة خاصة للأطلاع على الموظفين الحاليين بالأمانة و معلوماتهم و تعديلها </p>
							<ul class="actions">
								<div class="x1"><li><a href="emocon.php" class="button alt"> الدخول على الخدمة </a></li></div>
							</ul>
						</div>
					</article>
					<article>
						<div class="content">
							<div class="x1"><span   class="icon  fa-sitemap"></span>
							</div><header class="x1">
								<h3>التحكم بالأدارت</h3>
							</header>
							<p class="x1"> بوابة خاصة للأطلاع على الأدارات الخاصة بالأمانة و معلوماتها و التعديل عليها </p>
							<ul class="actions">
								<div class="x1"><li><a href="mangcon.php" class="button alt"> الدخول على الخدمة </a></li></div>
							</ul>
						</div>
					</article>
					<article>
					<div class="content">
							<div class="x1"><span class="icon  fa-pencil-square-o"></span>
							</div>
                                <header class="x1">
								<h3 >تسجيل المخالفة</h3>
							</header>
							<p class="x1">بوابة خاصة للمراقبين لتسجيل المخالفات و الملاحظات على المنشآت او المحلات التجارية</p>
							<ul class="actions">
								<div class="x1"><li><a href="penalty.php" class="button alt"> الدخول على الخدمة </a></li></div>
							</ul>
						</div>
					</article>
				</div>
			</section>

		<!-- Footer -->
			<section id="footer" class="x1">
				<div class="inner">
					<div class="alahsa"><p>
                        © جميع حقوق الطبع والنشر محفوظة لدى أمانة الأحساء 2020 م
						</p>
					</div>
				</div>
				
			</section>


	</body>
</html>