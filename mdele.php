<head>
    
		<title>أمانة الاحساء</title>

    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.css">
<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    
      </head>


<?php
include 'connection.php';

if(isset($_GET['dele2'])){
$depaid = $_GET['dele2'];
$query="SELECT * FROM table02 WHERE depaid='$depaid'";
$resultx=mysqli_query($con, $query);
$info=mysqli_fetch_assoc($resultx);

}
                    
	?>

<?php 

$result=-1;
$x=-1;
if(isset($_POST['dele3']))
{
    
    $depaid=$_POST['depaid'];
    $queryx= "SELECT * FROM table03 WHERE depaid='$depaid'";
    $resulty=mysqli_query($con,$queryx);
            if (mysqli_num_rows($resulty))
            {
                  $x=1;
                

                
            }

        else
                    {
                $x=0;
                    }

    
}




    ?>


<div>
    
<?php if($x==1)  { ?>
        
    <script>
        
 Swal.fire({
  icon: 'error',
  title: 'خطأ',
  text: 'لا يمكن حذف الادارة لوجود موظفين بها',
  showCancelButton: false,
  showConfirmButton: false  
})
  setTimeout(function(){ document.location = 'mangcon.php'; }, 1500);
    
    
    </script>
   <?php } elseif($x==0)  {
    
       $query= "DELETE FROM table02 WHERE depaid='$depaid'";
    
            $result=mysqli_query($con,$query);
    
    ?>
    
<?php if($result==1)  { ?>
        
    <script>
        
 Swal.fire({
  icon: 'success',
  title: 'حسنا',
  text: 'تم حذف البيانات بنجاح',
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
  text: 'لم يتم حذف البيانات بنجاح',
  showCancelButton: false,
  showConfirmButton: false 
})

         setTimeout(function(){ document.location = 'mangcon.php'; }, 1500);
     </script>
    
   <?php } ?>
    
    
    
    
   <?php } ?>
    
    
    



    
<form id="contact" name="add" method="POST" action="mdele.php" enctype="multipart/form-data">
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
                        
                                                 <h1 class="x1">حذف الأدارة</h1>

                        

                                                         <td>
                                <input class="x1" type="text" name="depaid" id="depaid" readonly="readonly" value="<?php echo $info['depaid']; ?>"/>
                            </td>
                            <th>
                                <label class="x1" for="depaid">رقم الأدارة</label>
                            </th>
                        
                         <tr class="x1">
                                <td >
                                <input class="x1" type="text" name="depa" id="depa" value="<?php echo $info['depa']; ?>"/>
                            </td>
                            <th>
                                <label for="depa" class="x1">عنوان الأدارة</label>
                            </th>

                        </tr>

                                             
</table>
    
    </div>
    <div align="center" width="50">
    <input type="submit" value="حذف" name="dele3">
            </div>            
                                       </form>
                        
            </div>
