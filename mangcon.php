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
	<head>
		<title>أمانة الاحساء</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
	</head>
	<body>
		<!-- Header -->
			<header id="header">
				<div class="inner">
<a href="https://www.alhasa.gov.sa/">
                       <img src="images/AlhasaMunic.jpg" hight="800" width="200" alt="" >
                    </a>
					<nav id="nav">
                        <a href="logout.php">تسجيل الخروج</a>
						<a href="coninfopage.html">استعلام المخالفات</a>
						<a href="conpage.php">شاشة التحكم</a>
						<a href="index.html">الرئيسية</a>
  
					</nav>
				</div>
			</header>
        <br>
        <div class="container">
               <h2 class="x1">شاشة تحكم الأدارات</h2>
<table class="x1">
  <thead id="listh">

         
  </thead>

              <tbody id="list">
        
        
        
        
        
        </tbody>

</table>
<div id="foot">
        
        
        
        </div>

        

  <p class="x1">© جميع حقوق الطبع والنشر محفوظة لدى أمانة الأحساء 2020 م <br></p>
        </div>
<script>
            
        
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function()
            {
                if(xhr.readyState == 4 && xhr.status == 200)
                    {
                       var out = JSON.parse(xhr.responseText);
                        var list = "";
                        var head = "";
                        var foot = "";
                        if (out == 0)
                        {
                                 Swal.fire({
  icon: 'error',
  title: 'خطأ',
  text: 'لا يوجد بيانات لعرضها قم بأضافة البيانات',
  showCancelButton: false,
  showConfirmButton: false 
                                     
})
                foot +="<a href='manginsert.php'>  <button type='button'>اضافة ادارة</button> </a>";
                       document.querySelector("#foot").innerHTML = foot;     
                        }
                        else{

                                head += "<tr>";
                                head += "<td>" + "حذف الادارة"+"</td>";
                                head += "<td>" + "تحديث بيانات الادارة"+ "</td>";
                                head += "<td>" + "عنوان الأدارة"+ "</td>";
                                head += "<td>" + "رقم الأدارة"+ "</td>";
                                head += "</tr>";
                            
                            document.querySelector("#listh").innerHTML = head;

                        for(var i in out)
                            {
                                list += "<tr>";
                                list += "<td><form name='mupdate' action='mdele.php' method='GET'><button name='dele2' value='"+out[i].depaid+"'>حذف</button></form></td>";
                                list += "<td><form name='mdelete' action='mupd.php' method='GET'><button name='update1' value='"+out[i].depaid+"'>تحديث</button></form></td>";
                                list += "<td>" + out[i].depa+ "</td>";
                                list += "<td>" + out[i].depaid+ "</td>";


                                list += "</tr>";
                            }
                        document.querySelector("#list").innerHTML = list;
                        
                            foot +="<a href='mangcon2.php'><button type='button'>حذف الأدارات</button> </a>";
                            foot +="<a href='manginsert.php'>  <button type='button'>اضافة ادارة</button> </a>";

                            
                            
                             document.querySelector("#foot").innerHTML = foot;
                        
                    }
            }
            }
            xhr.open("GET", "getinfo.php" ,true);
            xhr.send();
        </script>

        
        

	</body>
    
</html>