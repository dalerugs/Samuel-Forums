<div class="row margin-top-20">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-10">
						<h2><?php echo $forum['title']; ?></h2>
					</div>
					<div class="col-md-2">
					<?php if($editable){ ?>
						<button class="btn btn-info btn-100">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Edit
						</button>
						<button class="btn btn-danger btn-100">
							<i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete
						</button>
					<?php } ?>
					</div>
				</div>
				<div class="row margin-top">
					<div class="col-md-12">
						<table class="table margin-top-20">
							<tr>
								<td class="bold">Description</td>
								<td><?php echo $forum['description']; ?></td>
							</tr>
							<tr>
								<td class="bold">Date Posted</td>
								<td><?php echo $forum['createdAt']; ?></td>
							</tr>
							<tr>
								<td class="bold">Last Update</td>
								<td><?php echo $forum['updatedAt']; ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<h2>Discussions</h2>

<?php if (!empty($answers)){ foreach($answers as $answer) {?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				
			</div>
		</div>
	</div>
</div>

<?php  }} ?>

<div class="row margin-top-20">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Post your answer</h4>
			</div>
			<div class="panel-body">
				<form id="answerForm" method="POST">
					<div class="form-group">
						<textarea name="answer" class="form-control" placeholder="Post your answer..." rows="7"></textarea>
					</div>
					<div class="form-group">
						<input name="post" type="submit" class="btn btn-primary btn-100" value="Post"></input>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>