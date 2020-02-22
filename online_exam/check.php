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
		<?php
			$conn = new mysqli('localhost', 'root', '', 'project');
 
			$score = 0;
 
			foreach($_POST['questionid'] as $question):
				$info = explode("||", $question);
 
				$questionid = $info[0];
				$iterate = $info[1];
 
				$sql = "SELECT * FROM truefalse WHERE questionid = '$questionid'";
				$query = $conn->query($sql);
				$row = $query->fetch_array(); 
 
				?>
				<div>
					<p><?php echo $iterate; ?>. <?php echo $row['question']; ?></p>
					<p>Correct Answer: <?php if($row['answer']==1){ echo 'True';} else{ echo 'False';} ?></p>
					<?php
						if (isset($_POST['answer_'.$iterate])){
							?>
							You Answered: <?php if($_POST['answer_'.$iterate] == 1){echo 'True';} else{echo 'False';} ?><br>
							<?php
							if ($_POST['answer_'.$iterate] == $row['answer']){
								echo '<span class="glyphicon glyphicon-check"></span> Correct<br><br>';
								$score = $score + 1;
							}
							else{
								echo '<span class="glyphicon glyphicon-remove"></span> Wrong<br><br>';
							}
						}
					?>		
				</div>
				<?php
 
			endforeach;
 
		?>
		<h2>Score: <?php echo $score; ?></h2>
		</div>
	</div>
</div>
</body>
</html>