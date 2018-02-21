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
								<td class="bold">Subject</td>
								<td><?php echo $forum['subject']; ?></td>
							</tr>
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
				<div class="row margin-top">
					<div class="col-md-8">
						<h3>Conclusion</h3>
						<p id="Conclusion">
						
						</p>
					</div>
					<div class='loading col-md-12'>	`
						<img class='center-block' src="<?php echo base_url("assets/Ellipsis.gif"); ?>" >
						<h3 style="margin-top:-50px;text-align:center">
							PLEASE WAIT . . . &nbsp; <span class='loading-status'></span>
						</h3>
					</div>
				</div>
				<div class="row margin-top">
					<div class="col-md-8">
						<!-- <h3>Polarity</h3> -->
						<p style="font-size: 25px" id="Polarity">
							
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row margin-top-20">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<h2>Dashboard</h2>
					</div>
				</div>
				<div class="row">
					<div id="dashboard" class="col-md-12">
						<div class='loading col-md-12'>	`
							<img class='center-block' src="<?php echo base_url("assets/Ellipsis.gif"); ?>" >
							<h3 style="margin-top:-50px;text-align:center">
								PLEASE WAIT . . . &nbsp; <span class='loading-status'></span>
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row margin-top-20">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<h2>TEXT CLASSIFICATION</h2>
					</div>
				</div>
				<div class="row">
					<div id="classification" class="col-md-12">
						<table class="table table-bordered">
								<thead>
									<tr>
										<td>POSITIVE</td>
										<td>NEUTRAL</td>
										<td>NEGATIVE</td>
									</tr>
									
								</thead>
								<tbody id="classification-table-body">

								</tbody>
							</table>
							<div class='loading col-md-12'>	`
								<img class='center-block' src="<?php echo base_url("assets/Ellipsis.gif"); ?>" >
								<h3 style="margin-top:-50px;text-align:center">
									PLEASE WAIT . . . &nbsp; <span class='loading-status'></span>
								</h3>
							</div>
							
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<h2>Discussions</h2>

<script type="text/javascript">var corpus = "";</script>

<?php if (!empty($answers)){ foreach($answers as $answer) {?>
<script type="text/javascript">corpus +=" <?php echo $answer['answer']; ?>";</script>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-warning">
			<div class="panel-heading">
					<label>
						<?php echo $answer['firstName']." ".$answer['lastName']; ?>
					</label>
					<?php if($answer['editable']){ ?>
					<button class="btn btn-danger pull-right btn-sm">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
					<button style="margin-right: 5px" class="btn btn-info pull-right btn-sm">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</button>
					
					<?php } ?>
			</div>
			<div class="panel-body">
				<?php echo $answer['answer']; ?>
			</div>
			<div class="panel-heading">
				Date Posted: <?php echo $answer['createdAt']; ?>
			</div>
		</div>
	</div>
</div>

<?php  }} ?>

<?php if($loggedIn){ ?>

<div class="row margin-top-20">
	<div class="col-md-12">
		<div class="panel panel-primary">
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

<?php } ?>

<script type="text/javascript">
	data = {
		'text':corpus,
		'summary_length':8,
		'visualize': true,
	};
	$.ajax({
		url: "http://192.168.1.14:63342/samuel_api?KEY=wYXhoTGLXQCvARxkD60AA6rm01O6mh0u68nBnRTV",
		type: 'POST',
		data: JSON.stringify(data),
		contentType:"application/json",
		success:function(samuel) {
		console.log(samuel);
		clearInterval(interval);
		$(".loading").hide();
		// CONCLUSION
		$("#Conclusion").text(samuel.summarized_text);

		//  DASHBOARD
		$("#dashboard").html(samuel.dashboard);

		// POLARITY & PERCENTAGE 
		var varpositive = samuel.total_score.percentage.positive;
		var varnegative = samuel.total_score.percentage.negative;
		var varneutral = samuel.total_score.percentage.neutral;

		var totalPosNeg = varpositive + varnegative;
		var finalPos = ((varpositive/totalPosNeg)*100).toFixed(2);
		var finalNeg = ((varnegative/totalPosNeg)*100).toFixed(2);

		if(finalPos>finalNeg){
			$("#Polarity").html("<i class='fa fa-smile-o' aria-hidden='true'></i> &nbsp;"+finalPos+" % Positive")
			$("#Polarity").addClass("text text-success")
		}
		else{
			$("#Polarity").html("<i class='fa fa-frown-o' aria-hidden='true'></i> &nbsp;"+finalNeg+" % Negative")
			$("#Polarity").addClass("text text-danger")
		}

		// TEXT CLASSIFICATION

		var classificationTable = "";
		for(var i = 0 ; i<samuel.score.length ; i++){
			posDescriptors ="";
			samuel.descriptors[i].pos.forEach(function(word) {
				posDescriptors += word +", ";
			});
			neuDescriptors ="";
			samuel.descriptors[i].neu.forEach(function(word) {
				neuDescriptors += word +", ";
			});
			negDescriptors ="";
			samuel.descriptors[i].neg.forEach(function(word) {
				negDescriptors += word +", ";
			});
			
			classificationTable += ""
			+"<tr>"
			+"<td><b>"+samuel.score[i].pos.toFixed(2)+"</b><br>"+posDescriptors+"</td>"
			+"<td><b>"+samuel.score[i].neu.toFixed(2)+"</b><br>"+neuDescriptors+"</td>"
			+"<td><b>"+samuel.score[i].neg.toFixed(2)+"</b><br>"+negDescriptors+"</td>"
			+"</tr>";
		}
		$("#classification-table-body").html(classificationTable);

		// if (samuel.polarity=="positive") {
		// 	$("#Polarity").html("<i class='fa fa-smile-o' aria-hidden='true'></i> &nbsp;"+samuel.percentage.positive+" Positive")
		// 	$("#Polarity").addClass("text text-success")
		// }
		// else if(samuel.polarity=="negative"){
		// 	$("#Polarity").html("<i class='fa fa-frown-o' aria-hidden='true'></i> &nbsp;"+samuel.percentage.negative+" Negative")
		// 	$("#Polarity").addClass("text text-danger")
		// }
		// else{
		// 	$("#Polarity").html("<i class='fa fa-meh-o' aria-hidden='true'></i> &nbsp;"+samuel.percentage.neutral+" Neutral")
		// 	$("#Polarity").addClass("text text-primary")
		// }
		},
		error: function(xmlhttprequest, textstatus, message) {
			clearInterval(interval);
			$(".loading").html("<h1>Something went wrong. Please try again.</h1>");
		}
	});

	var interval = setInterval(getProgress,1000);
	function getProgress(){
		$.ajax({
			url: "http://192.168.1.14:63343/",
			success: function(progress){
				console.log(progress);
				$(".loading-status").text(progress+" %")
			}
		});
	}
	
</script>