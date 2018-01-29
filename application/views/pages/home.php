<div style="margin-top:8%" class='row'>
    <div class='col-md-6 col-md-offset-2'>
        <input id='link' type='text' class='form-control input-lg' placeholder='Paste the link here...' />
    </div>
    <div class='col-md-2'>
        <button type='button' onclick="analyze()" class='btn btn-info btn-block btn-lg'>Analyze</button>
    </div>
</div>

<div style='display:none' id='result'>
    <div class="row margin-top-20">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row margin-top">
                        <div class="col-md-8">
                            <h3>Conclusion</h3>
                            <p id="Conclusion">
                                
                            </p>
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
						<h3>Dashboard</h3>
					</div>
				</div>
				<div class="row">
					<div id="dashboard" class="col-md-12">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script type='text/javascript'>
    function analyze(){
        $("#result").hide();
        data = {
            'link': $("#link").val()
        };
        $.ajax({
            url: "http://192.168.1.14:63342/samuel_analyze",
            type: 'POST',
            data: JSON.stringify(data),
            contentType:"application/json",
            success:function(samuel) {
                console.log(samuel);
                $("#Conclusion").text(samuel.summarized_text);
                $("#dashboard").html(samuel.dashboard);
                if (samuel.polarity=="positive") {
                    $("#Polarity").html("<i class='fa fa-smile-o' aria-hidden='true'></i> &nbsp; Positive")
                    $("#Polarity").addClass("text text-success")
                }
                else if(samuel.polarity=="negative"){
                    $("#Polarity").html("<i class='fa fa-frown-o' aria-hidden='true'></i> &nbsp; Negative")
                    $("#Polarity").addClass("text text-danger")
                }
                else{
                    $("#Polarity").html("<i class='fa fa-meh-o' aria-hidden='true'></i> &nbsp; Neutral")
                    $("#Polarity").addClass("text text-primary")
                }
                $("#result").fadeIn();
            
            }
        });
    }

    

</script>