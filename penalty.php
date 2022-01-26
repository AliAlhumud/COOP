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
        <form id="panl" name="insert"  action="insert.php" method="POST">
  <div class="container">
      <br>
    <h1  class="x1">اضافة مخالفة</h1>
    <p   class="x1">الرجاء تعبئة البيانات</p>
    <hr>

             <label class="x1" for="ِD1"><b>الموظف مسجل المخالفة</b></label>
     
      <select id="droplisth" dir="rtl">
          
          
          
          
          
    </select>
                                <div id="msg5"  class="txt2">
						<span >
							الرجاء ادخال اسم الموظف
						</span>
					</div>
    <label class="x1" for="ِA1"><b>الادارة</b></label>
      <select id="droplistx" dir="rtl">
          
          
          
          
          
    </select>
                          <div id="msg1"  class="txt2">
						<span >
							الرجاء ادخال الادارة
						</span>
					</div>
    <label class="x1" for="B1"><b>اسم المخالف</b></label>
    <input class="x1" type="text" name="B1" id="B1" maxlength= "30" placeholder="ادخال اسم المخالف المسجل بأسمه المخالفة"  required>
                          <div id="msg2"  class="txt2">
						<span >
							الرجاء ادخال اسم المخالف
						</span>
					</div>
    <label class="x1" for="ِC1"><b>رقم هوية المخالف</b></label>
    <input class="G1" type="number" onKeyPress="if(this.value.length==10) return false;" name="C1" id="C1" placeholder="ادخال رقم هوية المخالف"  ><br><br>
                                <div id="msg3"  class="txt2">
						<span >
							الرجاء ادخال رقم هوية المخالف
						</span>
					</div>
      
                                      <div id="msg11"  class="txt2">
						<span >
							رقم الهوية يحب ان يكون 10 ارقام
						</span>
					</div>
          <label class="x1" for="ِJ1"><b>رقم المخالفة</b></label>
    <input class="G1" type="number" onKeyPress="if(this.value.length==10) return false;" name="J1" id="J1" placeholder="ادخال رقم هوية المخالف" required><br><br>
                                <div id="msg4"  class="txt2">
						<span >
							الرجاء ادخال رقم المخالفة
						</span>
					</div>
                                      <div id="msg12"  class="txt2">
						<span >
							رقم المخالفة يحب ان يكون 10 ارقام
						</span>
					</div>

      <label class="x1" for="ِE1"><b>عنوان المخالفة</b></label>
    <input class="x1" type="text" maxlength= "30" name="E1" id="E1" placeholder="ادخال عنوان المخالفة " required>
                                <div id="msg6"  class="txt2">
						<span >
							الرجاء ادخال عنوان االمخالفة
						</span>
					</div>
    <label class="x1" for="ِF1"><b>وصف المخالفة</b></label>
    <input class="x1" type="text" maxlength= "30" name="F1" id="F1" placeholder=" ادخال وصف المخالفة المسجلة " required>
                          <div id="msg7"  class="txt2">
						<span >
							الرجاء ادخال وصف المخالفة
						</span>
					</div>
      
      <label class="x1" class="x1"for="ِG1"><b>تاريخ المخالفة</b></label>
    <input type="date"  name="G1" id="G1" class="G1" required>
                                <div id="msg8"  class="txt2">
                                    <br><br>
						<span >
							الرجاء ادخال تاريخ المخالفة
						</span>
					</div>
      <br>
      
    
      <button type="submit" name="register"class="registerbtn">تسجيل</button>

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
  text: 'لا يوجد بيانات لعرضها قم بأضافة البيانات قم بأضافة ادارة و موظف',
  showCancelButton: false,
  showConfirmButton: false 
                                     
})
    
                        }
                        else{


list += "<option value='"+x+"'>اختيار</option>";
head += "<option value='"+x+"'>اختيار</option>";
                        for(var i in out)
                            {

list += "<option value='"+out[i].eid+"'>" + out[i].ename + "</option>";
head += "<option value='"+out[i].eid+"'>" + out[i].depa + "</option>";          

                            }
                            
                        document.getElementById("droplisth").innerHTML = list;
                        document.getElementById("droplistx").innerHTML = head;
                        


                        
                    }
            }
            }
            xhr.open("GET", "exinfo.php" ,true);
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
    
    var depa = $('#droplistx option:selected').text();
    var name = document.insert.B1.value;
    var idpp = document.insert.C1.value;
    var pid = document.insert.J1.value;
    var ename = $('#droplisth option:selected').text();
    console.log(ename);
    console.log(depa);
    var padd = document.insert.E1.value;
    var disp = document.insert.F1.value;
    var date = document.insert.G1.value;
    var m1 = document.querySelector("#msg1"); 
    var m2 = document.querySelector("#msg2");
    var m3 = document.querySelector("#msg3");
    var m4 = document.querySelector("#msg4");
    var m5 = document.querySelector("#msg5"); 
    var m6 = document.querySelector("#msg6");
    var m7 = document.querySelector("#msg7");
    var m8 = document.querySelector("#msg8");
    var m11 = document.querySelector("#msg11");
    var m12 = document.querySelector("#msg12");
    var valid=true;

    if(depa == "")
    {
        valid=false;
        m1.style.visibility = "visible";        
    }
    else 
        {
            m1.style.visibility = "hidden";
        }
    
    
    
    if(name == "")
    {
        valid=false;
        m2.style.visibility = "visible";
    }
    else
        {
            m2.style.visibility = "hidden";
        }
    
        if(idpp == "")
    {
        valid=false;
        m3.style.visibility = "visible";        
    }
    else if(idpp.length <10)
        {
        valid=false;
        m11.style.visibility = "visible";   
        }
    else
        {
            m3.style.visibility = "visible";
            m11.style.visibility = "hidden";
        }
    
    
    if(pid == "")
    {
        valid=false;
        m4.style.visibility = "visible";
    }
    else if(pid.length <10)
    {
        valid=false;
        m12.style.visibility = "visible";        
    }
    else
        {
            m12.style.visibility = "hidden";
            m4.style.visibility = "hidden";
        }

    
    
        if(ename == "")
    {
        valid=false;
        m5.style.visibility = "visible";
    }
    else
        {
            m5.style.visibility = "hidden";
        }
    
        if(padd == "")
    {
        valid=false;
        m6.style.visibility = "visible";        
    }
    else
        {
            m6.style.visibility = "hidden";
        }
    
    if(disp == "")
    {
        valid=false;
        m7.style.visibility = "visible";
    }
    else
        {
            m7.style.visibility = "hidden";
        }
        if(date == "")
    {
        valid=false;
        m8.style.visibility = "visible";        
    }
    else
        {
            m8.style.visibility = "hidden";
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
  text: 'تم ادخال البيانات بنجاح',
  showCancelButton: false,
  showConfirmButton: false 
})
                            document.getElementById("panl").reset();
                             setTimeout(function(){  document.location = "conpage.php"; }, 1500);
                             
                        }
                        
                         else if(out==5)
                        {
                                Swal.fire({
  icon: 'error',
  title: 'خطأ',
  text: 'رقم المخالفة مستخدم',
  showCancelButton: false,
  showConfirmButton: false 
})
                       }
                        else
                            {
                                                                Swal.fire({
  icon: 'error',
  title: 'خطأ',
  text: 'لم يتم ادخال البيانات بنجاح',
  showCancelButton: false,
  showConfirmButton: false 
})
                            }
                    }
               
            }
            
            xhr.open("post", "insert.php", true);
var formData="depa="+$('#droplistx option:selected').text()+"&name="+document.insert.B1.value+"&idpp="+document.insert.C1.value+"&pid="+document.insert.J1.value+"&ename="+$('#droplisth option:selected').text()+"&padd="+document.insert.E1.value+"&disp="+document.insert.F1.value+"&date="+document.insert.G1.value;           
            xhr.setRequestHeader('Content-type', 'application/x-WWW-form-urlencoded');
            xhr.send(formData);
            
            
        }
    
}

</script>

	</body>
    
</html>