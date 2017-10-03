<div class="row margin-top-20">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<button onclick="createForum()" class="btn btn-default pull-right">
							<i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Create Forum
						</button>
					</div>
				</div>
				<div class="row margin-top-20">
					<div class="col-md-12">
						<table data-order='[[ 2, "DESC" ]]' id="forumsTable" class="table table-hover table-bordered dataTable">
			            	<thead>
				              	<tr>
					                <th>TITLE</th>
					                <th>DESCRIPTION</th>
					                <th>DATE POSTED</th>
					                <th>LAST UPDATE</th>
					                <th></th>
				              	</tr>
				            </thead>
				            <tbody></tbody>
			          	</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="createForum" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <form method="POST" id="forumForm" accept-charset="utf-8">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create New Forum</h4>
            </div>
            <div class="modal-body">
            	<p id="createMessage" class="alert alert-danger center display-none"></p>
                <div class="form-group">
                	<label>Title</label>
                	<input name="title" type="text" placeholder="Enter Title" class="form-control" />
                </div>
                <div class="form-group">
                	<label>Description</label>
                	<textarea name="description" class="form-control" placeholder="Enter Description" rows="7"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="create()">Create</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
        </div>
    </div>
</div>

<script type="text/javascript">

	$("#forumsTable").DataTable({
	    "ajax":{
	      "url":"<?php echo site_url('myForums/showForums') ?>",
	      "type":"POST"
	    }
	  });

	function createForum(){
		$('#createForum').modal('show');
	}

	function create(){
		$("#createMessage").hide();
		$.ajax({
	        url: "<?php echo site_url('myForums/newForum'); ?>",
	        type: 'POST',
	        dataType: 'json',
	        data: $('#forumForm').serialize(),
	        encode:true,
	        success:function(data) {
	          console.log(data);
	          if (!data.success) {
	            $("#createMessage").text("Please fill up all fields");
	            $("#createMessage").fadeIn();
	          }else{
	            window.location.reload();
	          }
	        }
	      });
	}
</script>
