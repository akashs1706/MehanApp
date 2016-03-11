<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<?php
        $uri1 = strtok($_SERVER["REQUEST_URI"],'?');
        $urinew1 = trim($uri1, '/').'/';
        $urinew2 = explode('/',$urinew1);
        $basedir =  $urinew2['0'];
        ?>
				<li class="<?php if($basedir =='dashboard' ){ echo "active";} else{ echo "start";}?> ">
					<a href="/dashboard">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					<span class="selected"></span>
					<span class="arrow "></span>
					</a>
					
				</li>
				<li class="<?php if($basedir =='global' || $basedir =='packages' || $basedir =='jobcategories'){ echo "active";} else{ echo "start";}?> ">
					<a href="javascript:;">
					<i class="icon-home"></i>
					<span class="title">Global Setting</span>
						<span class="selected"></span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="/global/industry-types">
							<i class="icon-bar-chart"></i>
							Industry Types</a>
						</li>
						
						<li>
							<a href="/global/countries">
							<i class="icon-bar-chart"></i>
							Countries</a>
						</li>
						
						<li>
							<a href="/global/states">
							<i class="icon-bar-chart"></i>
							District</a>
						</li>
            			<li>
							<a href="/global/cities">
							<i class="icon-bar-chart"></i>
							City</a>
						</li>
						<li>
							<a href="/global/salary-range">
							<i class="icon-bar-chart"></i>
							Salary Range</a>
						</li>
						
						<li>
							<a href="/global/candidates-degree">
							<i class="icon-bar-chart"></i>
							Candidates Degree</a>
						</li>
						
						<li>
							<a href="/global/achievements">
							<i class="icon-bar-chart"></i>
							Candidates Achievements</a>
						</li>
						
						<li>
							<a href="/packages">
							<i class="icon-bar-chart"></i>
							Packages</a>
						</li>
						
						<li>
							<a href="/global/course">
							<i class="icon-bar-chart"></i>
							Courses</a>
						</li>
						<li>
							<a href="/jobcategories">
							<i class="icon-bar-chart"></i>
							Job Categories</a>
						</li>
						<li>
							<a href="/global/api">
							<i class="icon-bar-chart"></i>
							APIs Keys</a>
						</li>
						
					</ul>
				</li>
				<li class="<?php if($basedir =='admin' || $basedir =='employers' || $basedir =='candidates'){ echo "active";} else{ echo "start";}?>  ">
					<a href="javascript:;">
					<i class="icon-home"></i>
					<span class="title">Users</span>
						<span class="selected"></span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="/admin">
							<i class="icon-bar-chart"></i>
							Admin</a>
						</li>
						<li>
							<a href="/employers">
							<i class="icon-bar-chart"></i>
							Employers</a>
						</li>
						<li>
							<a href="/candidates">
							<i class="icon-bar-chart"></i>
							Candidates</a>
						</li>
					</ul>
				</li>

				<!--  job menu-->
				
				<li class="<?php if($basedir =='jobs' || $basedir =='job-applications'){ echo "active";} else{ echo "start";}?>  ">
					<a href="javascript:;">
					<i class="icon-home"></i>
					<span class="title">Jobs</span>
						<span class="selected"></span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="/jobs">
							<i class="icon-bar-chart"></i>
							List Jobs</a>
						</li>
						<li>
							<a href="/job-applications">
							<i class="icon-bar-chart"></i>
							Job Applications</a>
						</li>
						
						<li>
							<a href="/jobs/refferal">
							<i class="icon-bar-chart"></i>
							Job Refferal</a>
						</li>

						<li>
							<a href="/jobs/interviews">
							<i class="icon-bar-chart"></i>
							Interviews</a>
						</li>
						
					</ul>
				</li>
							
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	