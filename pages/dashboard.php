 <?php
 $adminCount = getadminCount();
 $empCount = getempCount();
 $candCount = getcandCount();
 $jobCateCount = getjobCateCount();
 $jobsCount = getjobsCount();
 ?>
 <h3 class="page-title">
			Dashboard <small>reports &amp; statistics</small>
			</h3>
<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $adminCount;?>
							</div>
							<div class="desc">
								 Admin Users
							</div>
						</div>
						<a href="/admin" class="more">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fa fa-bar-chart-o"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $empCount;?>
							</div>
							<div class="desc">
								 Employers
							</div>
						</div>
						<a href="/employers" class="more">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $candCount;?>
							</div>
							<div class="desc">
								 Candidates
							</div>
						</div>
						<a href="/candidates" class="more">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple-plum">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $jobCateCount;?>
							</div>
							<div class="desc">
								 Job Category
							</div>
						</div>
						<a href="javascript:;" class="more">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple-plum">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $jobsCount;?>
							</div>
							<div class="desc">
								 Job's Posted
							</div>
						</div>
						<a href="/jobs" class="more">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>
