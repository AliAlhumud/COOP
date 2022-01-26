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
                    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.css">
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
              <h2 class="x1">شاشة تحكم الموظفين</h2>
    <input id="reloadValue" type="hidden" name="reloadValue" value="" />
    <table class="x1">
  <thead id="listh" class="x1">

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
                    foot +="<a href='eminsert.php'>  <button type='button'>اضافة موظف</button> </a>";
                    document.querySelector("#foot").innerHTML = foot;
                            
                                 Swal.fire({
  icon: 'error',
  title: 'خطأ',
  text: 'لا يوجد بيانات لعرضها قم بأضافة البيانات',
  showCancelButton: false,
  showConfirmButton: false 
})
                            
                        }
                        else{

                        
                        
                                head += "<tr>";
                                head += "<td>" + "حذف الموظف"+ "</td>";
                                head += "<td>" + "تحديث بينات الموظف"+"</td>";
                                head += "<td>" + "عنوان الأدارة التابعة"+ "</td>";
                                head += "<td>" + "رقم الأدارة التابعة"+"</td>";
                                head += "<td>" + "الأسم"+ "</td>";
                                head += "<td>" + "رقم الموظف"+ "</td>";
                                head += "</tr>";
                            
                            document.querySelector("#listh").innerHTML = head;
                        
                        for(var i in out)
                            {
                                list += "<tr>";
                                list += "<td><form name='delete' action='delete.php' method='GET'><button name='dele2' value='"+out[i].eid+"'>حذف</button></form></td>";
                                list += "<td><form name='update' action='update.php' method='GET'><button name='update1' value='"+out[i].eid+"'>تحديث</button></form></td>";
                                list += "<td>" + out[i].depa+ "</td>";
                                list += "<td>" + out[i].depaid+ "</td>";
                                list += "<td>" + out[i].ename+ "</td>";
                                list += "<td>" + out[i].eid+ "</td>";


                                list += "</tr>";
                            }
                        document.querySelector("#list").innerHTML = list;
                        
                            foot +="<a href='emocon2.php'><button type='button'>حذف موظفين</button> </a>";
                            foot +="<a href='eminsert.php'>  <button type='button'>اضافة موظف</button> </a>";

                            
                            
                             document.querySelector("#foot").innerHTML = foot;
                        
                        
                    }    
                }
            }
            xhr.open("GET", "exinfo.php" ,true);
            xhr.send();
          </script>
         
        
        
	</body>
    
</html>