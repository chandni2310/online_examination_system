<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Simple True or False Quiz Generator</title>
	<link href="<a href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"" rel="nofollow">https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"</a> rel="stylesheet">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Simple True or False Quiz Generator</h1>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form method="POST" action="check.php">
				<?php
					$iterate = 1;
					$conn = new mysqli('localhost', 'root', '', 'project');
 
					//this will arrange the questions randomly and 10 only

 
					$sql = "SELECT * FROM truefalse ORDER BY rand() LIMIT 10";
					$query = $conn->query($sql);
					while($row = $query->fetch_array()){
						?>
						<div>
							<input type="hidden" value="<?php echo $row['questionid']; ?>||<?php echo $iterate; ?>" name="questionid[]">
							<p><?php echo $iterate; ?>. <?php echo $row['question']; ?></p>
							<input type="radio" name="answer_<?php echo $iterate; ?>" value="1"> True
	  						<input type="radio" name="answer_<?php echo $iterate; ?>" value="0"> False
						</div><br>
						<?php
 
					$iterate++;	
					}
 
				?>
				<button type="submit" class="btn btn-primary">Save</button>
				<br><br>
			</form>
		</div>
	</div>
</div>
</body>
</html>