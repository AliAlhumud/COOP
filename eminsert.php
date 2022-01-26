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
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
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
        <form id="panl" name="insert"  action="empins.php" method="POST">
  <div class="container">
      <br>
    <h1  class="x1">اضافة موظف</h1>
    <p   class="x1">الرجاء تعبئة البيانات</p>
    <hr>
    <label class="x1" for="ِA1"><b>رقم الادارة</b></label>
      <select id="droplisth" dir="rtl">
          
          
          
          
          
    </select>
      <br>
                          <div id="msg1"  class="txt2">
						<span >
							الرجاء ادخال الادارة
						</span>
					</div>
                                <div id="msg7"  class="txt2">
						<span >
							رقم الادارة يجب ان يكون 5 ارقام
						</span>
      </div>
    <label class="x1" for="ِB1"><b>اسم الادارة</b></label>
      <select id="droplistx" dir="rtl">
          
          
          
          
          
    </select>
                          <div id="msg2"  class="txt2">
						<span >
							الرجاء ادخال اسم الادارة
						</span>
					</div>
          <label class="x1" for="ِC1"><b>رقم الموظف</b></label>
    <input class="G1" type="number"  name="C1" id="C1" onKeyPress="if(this.value.length==5) return false;" placeholder="ادخال رقم الموظف"  required>
      <br><br>
                          <div id="msg3"  class="txt2">
						<span >
							الرجاء ادخال رقم الموظف
						</span>
					</div>
                         <div id="msg8"  class="txt2">
						<span >
							رقم الموظف يجب ان يكون 5 ارقام
						</span>
      </div>
    <label class="x1" for="ِD1"><b>اسم الموظف</b></label>
    <input class="x1" type="text" maxlength= "30" name="D1" id="D1" placeholder="ادخال اسم الموظف"  required>
                          <div id="msg4"  class="txt2">
						<span >
							الرجاء ادخال اسم الموظف
						</span>
					</div>

      <br>
      
    
      <button type="submit" name="register" class="registerbtn">اضافة</button>

      <hr>
    <p class="x1">© جميع حقوق الطبع والنشر محفوظة لدى أمانة الأحساء 2020 م <br></p>

    
  </div>

</form>
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
                        var x = 0;
                        
                        
                        if (out == 0)
                        {
                                 Swal.fire({
  icon: 'error',
  title: 'خطأ',
  text: 'لا يوجد ادارات قم با اضافة ادارات لأضافة موظفين',
  showCancelButton: false,
  showConfirmButton: false 
                                     
})
    
                        }
                        else{


list += "<option value='"+x+"'>اختيار</option>";
head += "<option value='"+x+"'>اختيار</option>";
                        for(var i in out)
                            {

list += "<option value='"+out[i].depaid+"'>" + out[i].depaid + "</option>";
head += "<option value='"+out[i].depaid+"'>" + out[i].depa + "</option>";          

                            }
                            
                        document.getElementById("droplisth").innerHTML = list;
                        document.getElementById("droplistx").innerHTML = head;
                        


                        
                    }
            }
            }
            xhr.open("GET", "getinfo.php" ,true);
            xhr.send();
        
        
        $(function(){
    $('#droplisth').on('change', function(){
        var val = $(this).val();
        var sub = $('#droplistx');
        $('option', sub).filter(function(){
            if (
                 $(this).attr('value') === val 
              || $(this).attr('value') === 'SHOW'
            ) {
                $(this).show().select(0);
            } else {
                $(this).hide();
            }
        });
    });
    $('#droplisth').trigger('change');
});
        
        
var btn = document.insert.register;
btn.addEventListener("click", validate_login);

function validate_login(e)
{
    e.preventDefault();
    
    var depaid = $('#droplisth option:selected').text();
    var depa = $('#droplistx option:selected').text();
    var eid = document.insert.C1.value;
    var ename = document.insert.D1.value;
    var m1 = document.querySelector("#msg1"); 
    var m2 = document.querySelector("#msg2");
    var m3 = document.querySelector("#msg3");
    var m4 = document.querySelector("#msg4");
    var m7 = document.querySelector("#msg7");
    var m8 = document.querySelector("#msg8");
    var valid=true;

    if(depaid == "")
    {
        valid=false;
        m1.style.visibility = "visible";        
    }
    else if(depaid.length < 5)
        {
                    valid=false;
                    m7.style.visibility = "visible";
        }
    
    else
        {
            m1.style.visibility = "hidden";
            m7.style.visibility = "hidden";
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
    if(eid == "")
    {
        valid=false;
        m3.style.visibility = "visible";        
    }
    else if(eid.length < 5)
        {
                    valid=false;
        m8.style.visibility = "visible";
        }

    else
        {
            m3.style.visibility = "hidden";
            m8.style.visibility = "hidden";
        }
    
    if(ename == "")
    {
        valid=false;
        m4.style.visibility = "visible";
    }
    else
        {
            m4.style.visibility = "hidden";
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
                             setTimeout(function(){  document.location = "emocon.php"; }, 1500);
                           
                             
                        }
                        
                         else if(out==5)
                        {
                                Swal.fire({
  icon: 'error',
  title: 'خطأ',
  text: 'رقم الموظف مستخدم',
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
            
            xhr.open("post", "empins.php", true);
var formData="depaid="+$('#droplisth option:selected').text()+"&depa="+$('#droplistx option:selected').text()+"&eid="+document.insert.C1.value+"&ename="+document.insert.D1.value;            
            xhr.setRequestHeader('Content-type', 'application/x-WWW-form-urlencoded');
            xhr.send(formData);
            
            
        }
    
}

</script>

	</body>
    
</html>