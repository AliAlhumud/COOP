<head>
    
		<title>أمانة الاحساء</title>

    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.css">
<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    
      </head>


<?php
include 'connection.php';

if(isset($_GET['dele2'])){
$eid = $_GET['dele2'];
$query="SELECT * FROM table03 WHERE eid='$eid'";
$resultx=mysqli_query($con, $query);
$info=mysqli_fetch_assoc($resultx);

}
                    
	?>

<?php 

$result=-1;
if(isset($_POST['dele3']))
{
    $eid=$_POST['eid'];
    $query= "DELETE FROM table03 WHERE eid='$eid'";
    
            $result=mysqli_query($con,$query);
    
}


    ?>


<div>
    

<?php if($result==1)  { ?>

    <script>
        
 Swal.fire({
  icon: 'success',
  title: 'حسنا',
  text: 'تم حذف البيانات بنجاح',
  showCancelButton: false,
  showConfirmButton: false 
})
  setTimeout(function(){ document.location = 'emocon.php'; }, 1500);
    
    
    </script>
   <?php } elseif($result==0)  { ?>

    <script>
        
             Swal.fire({
  icon: 'error',
  title: 'خطأ',
  text: 'لم يتم حذف البيانات بنجاح',
  showCancelButton: false,
  showConfirmButton: false 
})

         setTimeout(function(){ document.location = 'emocon.php'; }, 1500);
     </script>
    
   <?php } ?>

      
<form id="contact" name="add" method="POST" action="delete.php" enctype="multipart/form-data">
        <div width="50">

            		<!-- Header -->
			<header id="header">
				<div class="inner">
<a href="https://www.alhasa.gov.sa/">
                       <img src="images/AlhasaMunic.jpg" hight="800" width="200" alt="" >
                    </a>
					<nav id="nav">
						<a href="coninfopage.html">استعلام المخالفات</a>
                        <a href="conpage.html">شاشة التحكم</a>
						<a href="index.html">الرئيسية</a>
  
					</nav>
				</div>
			</header>
            <br>
                    <table border="2" align="center" width="500" height="400">
                        
                                                 <h1 class="x1">تحديث بيانات الموظف</h1>

                        
                        <tr>
                                                        <td>
                                <input class="x1" type="text" name="eid" readonly="readonly" id="eid" value="<?php echo $info['eid']; ?>"/>
                            </td>
                            <th>
                                <label class="x1" for="eid">رقم الموظف</label>
                            </th>

                        </tr>
                        <tr>
                                 <td>
                                <input class="x1" type="text" name="ename" id="ename" value="<?php echo $info['ename']; ?>"/>
                            </td>
                            <th>
                                <label class="x1" for="ename">اسم الموظف</label>
                            </th>

                        </tr>
                        
                         <tr>
                                                         <td>
                                <input class="x1" type="text" name="depaid" id="depaid" value="<?php echo $info['depaid']; ?>"/>
                            </td>
                            <th>
                                <label class="x1" for="depaid">رقم الأدارة التابعة</label>
                            </th>

                        </tr>
                        
                         <tr class="x1">
                                <td >
                                <input class="x1" type="text" name="depa" id="depa" value="<?php echo $info['depa']; ?>"/>
                            </td>
                            <th>
                                <label for="depa" class="x1">عنوان الأدارة التابعة</label>
                            </th>

                        </tr>

                                             
</table>
    
    </div>
    <div align="center" width="50">
    <input type="submit" value="حذف" name="dele3">
            </div>            
                                       </form>
                        
            </div>