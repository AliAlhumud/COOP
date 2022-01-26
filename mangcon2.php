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
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
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
               <h2 id="fx" class="x1" >شاشة تحكم الأدارات</h2>

<table class="x1">
  <thead id="listh">
      
         
  </thead>
            <tbody id="list">
        
        
        
        
        
        </tbody>

</table>
<div id="bot">
            
            
            
            </div>
<div id="foot">
        
        
        </div>
       
        

      

  <p class="x1">© جميع حقوق الطبع والنشر محفوظة لدى أمانة الأحساء 2020 م <br></p>
</div>
<script>
    var btn = document.querySelector("#foot");
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
                foot +="<a href='manginsert.php'>  <button type='button'>اضافة أدارة</button> </a>";
                       document.querySelector("#bot").innerHTML = foot;     
                        }
                        else{
                        
                                head += "<tr>";
                                head += "<td>" + "عنوان الأدارة"+ "</td>";
                                head += "<td>" + "رقم الأدارة"+ "</td>";
                                head += "<td>" + "اختيار"+ "</td>";
                                head += "</tr>";
                            
                            document.querySelector("#listh").innerHTML = head;
                        
                        for(var i in out)
                            {
                                list += "<tr>";
                                list += "<td>" + out[i].depa+ "</td>";
                                list += "<td>" + out[i].depaid+ "</td>";
                                list += "<td><form name='mdele' action='xmdele.php' method='post'><input type='checkbox' class='messageCheckbox' id='"+out[i].depaid+"' name='deletex' style='float: right' value='"+out[i].depaid+"'></form></td>";



                                list += "</tr>";
                            }
                        document.querySelector("#list").innerHTML = list;
                            
                            foot +="<form name='mmdele'><button id= 'buttonx' name='but_delete'>حذف</button></form>"
                            
                            
                             document.querySelector("#foot").innerHTML = foot;
                        
                        
                        }
                    }
            }
            xhr.open("GET", "getinfo.php" ,true);
            xhr.send();
    
    
    
    
    
    
btn.addEventListener("click", validate_login);
    
    function validate_login(e)
{
    e.preventDefault();

        
    
    var datary = new Array();
    
    if($("input:checkbox:checked").length >0){
        $("input:checkbox:checked").each(function(){
            datary.push($(this).attr("id"));
        
        
        
        });
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function()
            {
                if(xhr.readyState==4 && xhr.status==200)
                    {
                        var out = xhr.responseText;
                        console.log(out);
                        if(out==0){
                             Swal.fire({
  icon: 'success',
  title: 'حسنا',
  text: 'تم حذف البيانات بنجاح',
  showCancelButton: false,
  showConfirmButton: false 
})
                       
 setTimeout(function(){  location.reload(); }, 1500);
                            
                             
                        }
                        
                         else if(out!==0) 
                        {
                                Swal.fire({
  icon: 'error',
  title: 'خطأ',
  text: 'لا يمكن حذف الادارات لوجود موظفين بها',
  showCancelButton: false,
  showConfirmButton: false 
})
     
                            
                       }
                        
                        else
                            {
                                
    Swal.fire({
  icon: 'error',
  title: 'خطأ',
  text: 'لم يتم حذف البيانات بنجاح',
  showCancelButton: false,
  showConfirmButton: false 
})  
                                
                                
                            }
                    }
               
            }
            
            xhr.open("post", "xmdele.php", true);
            var formData = "checkval="+JSON.stringify(datary);
            xhr.setRequestHeader('Content-type', 'application/x-WWW-form-urlencoded');
            xhr.send(formData);
    }else{  
                                        Swal.fire({
  icon: 'error',
  title: 'خطأ',
  text: 'لم يتم اختيار',
  showCancelButton: false,
  showConfirmButton: false 
})}
    
    

    
        }
    

        
         
        </script>

        
        

	</body>
    
</html>