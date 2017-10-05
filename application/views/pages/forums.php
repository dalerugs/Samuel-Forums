<div class="row margin-top-20 margin-bot-20">
	<div class="col-md-12">
		<input class="form-control" placeholder="Search forum title..."></input>
	</div>
</div>

<?php if(!empty($forums)){ foreach($forums as $forum){ ?>
<div onclick="location.href='<?php echo base_url("Forums/forum/".$forum['id']); ?>'" class="row forum">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="forum-title">
					<?php echo $forum['title']; ?>
				</h4>
				
			</div>
			<div class="panel-body">
				<?php echo $forum['description']; ?>
			</div>
			<div class="panel-footer">
				Posted By: <?php echo $forum['firstName']." ".$forum['lastName']; ?> <br/>
				Date Posted: <?php echo $forum['createdAt']; ?> <br/>
				Last Update: <?php echo $forum['updatedAt']; ?> 
			</div>
		</div>
	</div>
</div>
<?php }} ?>