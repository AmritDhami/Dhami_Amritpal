
<?php
          include 'connection/database.php';
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Untamed 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20131220

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.php">Home</a></li>
						<?php
                         foreach($record as $menu):

                    ?>
                 <li>
                 	<a class="nav-link" href="index.php?item='<?php echo $menu['item'];?>'"><?php echo $menu['item'];?></a>
                       </li>
              <?php endforeach;?>
					
					<li><a href="form.php">Enter a New SCP data</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="header-featured">
	<div id="banner-wrapper">
		<div id="banner" class="container">
			<h2>SCP FILE</h2>
			<p>Special containment procedure</p>	
			<a href="form.php" class="button special big">Get Started to New SCP file</a>
		</div>
	</div>
</div>
<div id="wrapper">
<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>Welcome to SCP file</h2>
				 </div>
			<p><img src="images/download.png" alt="" class="image image-full" />
			</p>
			<?php
					if(isset($_GET['item']))
					{
                        
					  $scp=trim($_GET['item'],"'");
					$item="select * from scp_file where item='$scp'";
					$subject=$conn->prepare($item);
					$subject->execute();
					$display=$subject->fetch(PDO::FETCH_ASSOC);
                    
					$id=$display['id'];
					echo "
			
					<h2>Item:{$display['item']}<hr> Object class:{$display['class']}</h2>
                     <div class= 'foot'>
                    <h2>Speical containment procedure</h2>
					<p>{$display['special_procedure']}</p>
					<p><img class='img-fluid' src='{$display['image']}' style='width:75%;height:auto;box-shadow:3px,3px,3px;margin-left:auto;margin-right:auto; display:block;'></p>
                       
                        <h2>Description</h2>
						<p>{$display['description']}</p>

						<h2>Reference</h2>
						<p>{$display['reference']}</p>

						<h2>Additional</h2>
						<p>{$display['additional']}</p>

                       </div>
                       <div class='btt'>
						<a href='update.php?id={$id}' class='btn btn-warning'>Update record</a>
						<a href='#' onclick='delete_record({$id})' class='btn btn-danger'>Delete</a>
                    </div>
					";
					}
					else
					{
									echo "
							 <h5>Welcome to the SCP application</h5>
			               <p >PLease use the menu above to view SCP subject.</p>
			               ";
					}
					?>
		</div>
		
		</div>
	
	
</div>
<div id="copyright" class="container">
	<p>&copy; Design by:- Amritpal Dhami, 30017389. All rights reserved, 2020.</p>
</div>

<?php
        
        $delete=isset($_GET['action']) ? $_GET['action'] :"";

        //if directed from delete.php
        if($delete =='deleted')
        {
            echo "<div clas='alert alert-success'>Records was deleted</div>";
        }
 
 
 ?>
 <script>
function delete_record(id)
{
    var answer=confirm('ok to delete this recpord');
    if(answer)
    {
      window.location='delete.php?id=' + id;
    }
}

 </script>
</body>
</html>
