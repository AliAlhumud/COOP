<head>
    
		<title>أمانة الاحساء</title>

    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.css">

    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
      </head>


<?php
include 'connection.php';

if(isset($_GET['update1'])){
$depaid = $_GET['update1'];
$query="SELECT * FROM table02 WHERE depaid='$depaid'";
$resultx=mysqli_query($con, $query);
$info=mysqli_fetch_assoc($resultx);

}
                    
	?>

<?php 

$result=-1;
if(isset($_POST['update2']))
{
    $depaid=$_POST['depaid'];
    $depa=$_POST['depa'];
    
    $query= " UPDATE table02 SET depaid='$depaid', depa= '$depa' WHERE depaid='$depaid'";
    
            $result=mysqli_query($con,$query);
    
}




    ?>


<div>
    

<?php if($result==1)  { ?>
    <script>
         Swal.fire({
  icon: 'success',
  title: 'حسنا',
  text: 'تم تحديث البيانات بنجاح',
  showCancelButton: false,
  showConfirmButton: false 
})
  setTimeout(function(){ document.location = 'mangcon.php'; }, 1500);
   </script>

   <?php } elseif($result==0)  { ?>
    
    <script>
        
             Swal.fire({
  icon: 'error',
  title: 'خطأ',
  text: 'لم يتم تحديث البيانات بنجاح',
  showCancelButton: false,
  showConfirmButton: false 
})

         setTimeout(function(){ document.location = 'mangcon.php'; }, 1500);
     </script>
    
   <?php } ?>

<form id="contact" name="add" method="POST" action="mupd.php" enctype="multipart/form-data">
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
                        
                                                 <h1 class="x1">تحديث بيانات الأدارة</h1>

                        

                        
                         <tr>
                                                         <td>
                                <input class="x1" type="text" name="depaid" readonly="readonly" id="depaid" readonly="readonly" value="<?php echo $info['depaid']; ?>"/>
                            </td>
                            <th>
                                <label class="x1" for="depaid">رقم الأدارة</label>
                            </th>

                        </tr>
                        
                         <tr class="x1">
                                <td >
                                <input class="x1" type="text" length= "30" name="depa" id="depa" value="<?php echo $info['depa']; ?>"/>
                            </td>
                            <th>
                                <label for="depa" class="x1">عنوان الأدارة</label>
                            </th>

                        </tr>

                                             
</table>
    
    </div>
    <div align="center" width="50">
    <input type="submit" value="تحديث" name="update2">
            </div>            
                                       </form>
                        
            </div>
