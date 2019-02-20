<?php 

session_start();
$g='';
$o='';
$d='';
$uEnergy='';
$b= array();
for ($i=1; $i < 11 ; $i++) { 
	if($i==$pageSide){
		
		if($i>3 && $i<9	 )
		{
		$b[$i]='class="active-submenu"';	
		}else{
			$b[$i]='class="active"';
		}
	}
	else
	{

		$b[$i]=" ";
		
	}
	
}

if ($_SESSION["userType"]=="seller") {

	$d='<li '.$b[1].'><a class="active" href="dashboard-seller.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>';

	$uEnergy='<li '.$b[3].'><a  href="update-energy.php"><i class="icon-material-outline-star-border"></i> Update Energy Limit</a></li>';


	$g='<li '.$b[4].$b[5].'><a  href="#"><i class="icon-material-outline-business-center"></i> Gigs</a>
								<ul>
									<li '.$b[4].'><a  href="my-gigs.php">Manage Gigs </a></li>
									
									<li '.$b[5].'><a  href="post-gig.php">Post a Gig</a></li>
								</ul>	
							</li>';


	$o='<li '.$b[6].$b[7].$b[8].'><a  href="#"><i class="icon-material-outline-assignment"></i> Offers</a>
								<ul>
									<li '.$b[6].'><a  href="completed-offers.php">Sold Offers </a></li>
									<li '.$b[7].'><a  href="manage-offers.php">Pending Approvel Offers </a></li>
									<li '.$b[8].'><a  href="pending-consumption.php">Pending Consumption Offers</a></li>
									
									
								</ul>	
							</li>';
}

else if ($_SESSION["userType"]=="buyer") {

	$d='<li '.$b[1].'><a class="active" href="dashboard-buyer.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>';
	$o='<li '.$b[6].$b[7].$b[8].'><a  href="#"><i class="icon-material-outline-assignment"></i> Offers</a>
								<ul>
									<li '.$b[6].'><a  href="consumed-offers.php">Consumed Offers </a></li>
									<li '.$b[7].'><a  href="consume-offers.php">Pending Consumption Offers</a></li>
									<li '.$b[8].'><a  href="pending-approval.php">Pending Approval Offers</a></li>
									
									
									
									
								</ul>	
							</li>';
}


echo '<div class="dashboard-nav-inner">

						<ul data-submenu-title="Start">
							'.$d.'
							<li '.$b[2].'><a  href="messages.php"><i class="icon-material-outline-question-answer"></i> Messages </a></li>
							'.$uEnergy.'
							
						</ul>
						
						<ul data-submenu-title="Organize and Manage">
							
							'.$g.$o.'
						</ul>

						<ul data-submenu-title="Account">
							<li '.$b[9].'><a  href="javascript:;"><i class="icon-material-outline-settings"></i> Settings</a></li>
							<li '.$b[10].'><a  href="logout.php"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
						</ul>
						
					</div>';


 ?>