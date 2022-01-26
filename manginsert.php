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
        <form id="panl" name="insert"  action="mangins.php" method="POST">
  <div class="container">
      <br>
    <h1  class="x1">اضافة أدارة</h1>
    <p   class="x1">الرجاء تعبئة البيانات</p>
    <hr>
    <label class="x1" for="ِA1"><b>رقم الادارة</b></label>
    <input class="G1" type="number" onKeyPress="if(this.value.length==5) return false;" name="A1" id="A1" placeholder="ادخال رقم الادارة" required>
      <br><br>
                          <div id="msg1"  class="txt2">
						<span >
							الرجاء ادخال رقم الادارة
						</span>
					</div>
                                <div id="msg5"  class="txt2">
						<span >
							رقم الادارة يجب ان يكون 5 ارقام
						</span>
					</div>
      <br>
    <label class="x1" for="ِB1"><b>اسم الادارة</b></label>
    <input class="x1" type="text" maxlength= "30" name="B1" id="B1" placeholder="ادخال اسم الادارة"  required>
                          <div id="msg2"  class="txt2">
						<span >
							الرجاء ادخال اسم الادارة
						</span>
					</div>

      <br>
      
    
      <button type="submit" name="register" class="registerbtn">أضافة</button>

      <hr>
    <p class="x1">© جميع حقوق الطبع والنشر محفوظة لدى أمانة الأحساء 2020 م <br></p>

    
  </div>

</form>
    <script>  
var btn = document.insert.register;
btn.addEventListener("click", validate_login);

function validate_login(e)
{
    e.preventDefault();
    
    var depaid = document.insert.A1.value;
    var depa = document.insert.B1.value;
    var m1 = document.querySelector("#msg1"); 
    var m2 = document.querySelector("#msg2");
    var m5 = document.querySelector("#msg5");
    var valid=true;

    if(depaid == "")
    {
        valid=false;
        m1.style.visibility = "visible";        
    }
    else if(depaid.length < 5)
        {
             valid=false;
        m5.style.visibility = "visible";        
        }

    else
        {
            m1.style.visibility = "hidden";
            m5.style.visibility = "hidden";
        }
    
    if(depa == "")
    {
        valid=false;
        m2.style.visibility = "visible";
    }
    else
        {
            m2.style.visibility = "hidden";
        }


    
    if(valid)
        {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function()
            {
                if(xhr.readyState==4 && xhr.status==200)
                    {
                        var out = xhr.responseText;
                        console.log(out);
                        if(out==1){
                                                 Swal.fire({
  icon: 'success',
  title: 'حسنا',
  text: 'تم اضافة البيانات بنجاح',
  showCancelButton: false,
  showConfirmButton: false 
})
                            document.getElementById("panl").reset();
                             setTimeout(function(){  document.location = "mangcon.php"; }, 1500);
                             
                        }
                        
                         else if(out==5)
                        {
                                Swal.fire({
  icon: 'error',
  title: 'خطأ',
  text: 'رقم الأدارة مستخدم',
  showCancelButton: false,
  showConfirmButton: false 
})

                       }
                        else
                        {
                                                         Swal.fire({
  icon: 'error',
  title: 'خطأ',
  text: 'لم يتم اضافة البيانات بنجاح',
  showCancelButton: false,
  showConfirmButton: false 
})   
                            
                        }
                    }
               
            }
            
            xhr.open("post", "mangins.php", true);
var formData="depaid="+document.insert.A1.value+"&depa="+document.insert.B1.value;            
            xhr.setRequestHeader('Content-type', 'application/x-WWW-form-urlencoded');
            xhr.send(formData);
            
            
        }
    
}

</script>

	</body>
    
</html>