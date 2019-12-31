<!--https://www.w3school.info/2015/12/22/steps-to-create-dynamic-multilevel-menu-using-php-and-mysql/-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="style.css">
<title>Title</title>
</head>
<body>
<?php
$con=mysqli_connect("localhost","root","","wint_zoo");
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
// Perform queries 
 
function get_menu_tree($parent_id) 
{
	global $con;
	$menu = "";
	$sqlquery = " SELECT *FROM category where status='1' and parent_id='" .$parent_id . "' ";
	$res=mysqli_query($con,$sqlquery);
    while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)) 
	{
      $menu .="<li><a href='".$row['url']."'>".$row['cate_name']."</a>";
		   
      
      $menu = "<ul>".get_menu_tree($row['{cate_id}'])."</ul>"; //call  recursivel
		   
 		  $menu .= "</li>";
 
    }
    
    return $menu;
} 
?>
<h1>Create Nested menu Tree by Mysql php</h1>
<ul class="main-navigation">
<?php echo get_menu_tree(0);//start from root menus having parent id 0 ?>
</ul> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php mysqli_close($con); ?>



