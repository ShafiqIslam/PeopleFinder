<div class="container search_result_details_wrapper">
	<div class="row">
		<div class="col-sm-5 left_side">
			<h1>Jhon Doe</h1><span><a class="tooltip_check" href="#" data-toggle="tooltip" data-placement="top" title="Verified Report."><i class="fa fa-check-square-o"></i></a></span>
			<p><b>Missing/Found : Washington DC, US.</b></p>
			<div class="row">
				<div class="col-sm-5"><h4>Birth Date</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4>12/03/2016</h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Blood Group</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4>O+</h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Person's Status</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4>Found</h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Nationality</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4>Bangladesh</h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Resident Country</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4>Bangladesh</h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Resident City</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4>khulna</h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Resident Street</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4>khulna</h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Mental illness</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4>No</h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Status</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4>Alive</h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Kidnapped</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4>No</h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Physical illness</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4>No</h4></div>
			</div>
		</div>
		<!--===================left side===============-->
		<div class="col-sm-7 right_side">
			<!--Search Images of the Result Details-->
			<div class="">
				<div class="col-sm-12 search_result_img">
					<h1>Images of John Doe</h1>
					<ul>
						<li class="col-sm-4 search_result_Details_img"><img class="img-responsive" src="img/01.jpg"></li>
						<li class="col-sm-4 search_result_Details_img"><img class="img-responsive" src="img/01.jpg"></li>
						<li class="col-sm-4 search_result_Details_img"><img class="img-responsive" src="img/01.jpg"></li>
					</ul>
				</div>
		
				<!--=======This is for captcha using=========-->
				<div class="row captcha_section">
					<div class="col-sm-6 btn_found_section">
						<a class="btn btn_found pull-right" href="">Found</a>
					</div>

					<div class="col-sm-6 report_abuse_section">
						<form id="captcha" method="post" class="form-horizontal report_abuse" action="">
							<div class="captcha captcha_hide">
								<p>Please fill the correct captcha for Report Abuse.</p>

				                <div class="form-group">
				                    <label class="col-sm-4 control-label" id="captchaOperation"></label>
				                    <div class="col-sm-4">
				                        <input type="text" class="form-control" name="captcha" />
				                    </div>
				                </div>
							</div>
						 
			                <div class="form-group">
			                    <div class="col-sm-12">
			                        <a type="submit" class="btn btn-warning btn_abuse" name="abuse" value="abuse" href="<?php echo $this->webroot;?>search_result">Abuse</a>
			                    </div>
			                </div>
			            </form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="container">
			<!--=========Related result=============-->
			<div class="col-sm-12 related_search">
				<h1>Related Search Results</h1>
				<ul>
					<li>
						<a href="#">
							<img class="img-thumbnail" src="img/01.jpg">
							<h4>John Webster</h4>
							<p>Missing Dublin, Ireland, UK</p>
						</a>
					</li>
					<li>
						<a href="#">
							<img class="img-thumbnail" src="img/01.jpg">
							<h4>John Keats</h4>
							<p>Missing London, UK</p>
						</a>
					</li>
					<li>
						<a href="#">
							<img class="img-thumbnail" src="img/01.jpg">
							<h4>John Milton</h4>
							<p>Found London, UK</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>