<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    		<div class="row">	
    			<h3 align="right">پنل مدیریت</h3>
    		</div>
			<div align="right" class="row">
				<p>
					<a align="right" href="create.php" class="btn btn-success">کوتاه کردن دامنه</a>
				</p>
				
				<table align="right" class="table table-striped table-bordered">
		              <thead align="right">
		                <tr>
		                  <th align="right">دامنه اصلی</th>
		                  <th align="right">دامنه کوتاه</th>
		                  <th align="right">کاربر</th>
		                  <th align="right">ویرایش</th>
		                </tr>
		              </thead>
		              <tbody >
		              <?php 
					include("../auth.php");
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM shorturl ORDER BY id DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['url'] . '</td>';
							   	echo '<td>'. $row['shorturl'] . '</td>';
							   	echo '<td>'. $row['user'] . '</td>';
							   	echo '<td align="right" width=250>';
							   	echo '<a class="btn" href="read.php?id='.$row['id'].'">مشاهده</a>';
							   	echo '&nbsp;';
							   	echo '<a align="right" class="btn btn-success" href="update.php?id='.$row['id'].'">ویرایش</a>';
							   	echo '&nbsp;';
							   	echo '<a align="right" class="btn btn-danger" href="delete.php?id='.$row['id'].'">حذف</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>