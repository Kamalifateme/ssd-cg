<!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
  <meta charset="utf-8" />
  <title>Updates | Freelancer Office</title>
  <meta name="description" content="Project Management System for freelancers" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="../resource/css/app.v2.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="">
  <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
    <div class="container aside-xxl">
      <a class="navbar-brand block" href="">Freelancer Office</a>
      <section class="panel panel-default m-t-lg bg-white">
        <header class="panel-heading text-center">
          <strong>FREE UPDATES</strong>
        </header>
        <div class="panel-body wrapper-lg">
        
       
<!-- Start Upgrader -->
<?php
error_reporting(0);
ini_set('max_execution_time',60);
$version = $_GET['version']?$_GET['version']:'1.4';
//Check For An Update
$getVersions = file_get_contents('http://fo.shuleportal.com/releases/current-release-versions.php') or die ('ERROR');
if ($getVersions != '')
{
	echo '<p>CURRENT VERSION: '.$version.'</p>';
	echo '<p>Reading Current Releases List</p>';
	$versionList = explode("\n", $getVersions);	
	foreach ($versionList as $aV)
	{
		if ( $aV > $version) {
			echo '<p>New Update Found: v'.$aV.'</p>';
			$found = true;
			
			if ( !is_file('http://fo.gitbench.com/releases/UPDATES/FO-'.$aV.'.zip' )) {
				echo '<p>Downloading New Update</p>';
				$newUpdate = file_get_contents('http://fo.gitbench.com/releases/UPDATES/FO-'.$aV.'.zip');
				if ( !is_dir('./UPDATES/' ) ) mkdir ('./UPDATES/' );
				$dlHandler = fopen('./UPDATES/FO-'.$aV.'.zip', 'w');
				if ( !fwrite($dlHandler, $newUpdate) ) { echo '<p>Could not save new update. Operation aborted.</p>'; exit(); }
				fclose($dlHandler);
				echo '<p>Update Downloaded And Saved</p>';
			} else echo '<p>Update already downloaded.</p>';	
			
			if (isset($_GET['doUpdate'])) {
				//Open The File And Do Stuff
				$zipHandle = zip_open('./UPDATES/FO-'.$aV.'.zip');
				//echo '<ul>';
				while ($aF = zip_read($zipHandle) ) 
				{
					$thisFileName = zip_entry_name($aF);
					$thisFileDir = dirname($thisFileName);
					
					//Continue if its not a file
					if ( substr($thisFileName,-1,1) == './') continue;
					
	
					//Make the directory if we need to...
					if ( !is_dir ('../'.$thisFileDir ) )
					{
						 mkdir ('../'.$thisFileDir );
						 //echo '<li>Created Directory '.$thisFileDir.'</li>';
					}
					
					//Overwrite the file
					if ( !is_dir('./'.$thisFileName) ) {
						// echo '<li>'.$thisFileName.'...........';
						$contents = zip_entry_read($aF, zip_entry_filesize($aF));
						$contents = str_replace("\r\n", "\n", $contents);
						$updateThis = '';
						
						//If we need to run commands, then do it.
						if ( $thisFileName == 'upgrade.php' )
						{
							$upgradeExec = fopen ('upgrade.php','w');
							fwrite($upgradeExec, $contents);
							fclose($upgradeExec);
							include ('upgrade.php');
							//unlink('upgrade.php');
							//echo' EXECUTED</li>';
						}
						else
						{
							$updateThis = fopen('../'.$thisFileName, 'w');
							fwrite($updateThis, $contents);
							fclose($updateThis);
							unset($contents);
							//echo' UPDATED</li>';
						}
					}
				}
				//echo '</ul>';
				$updated = TRUE;
			}else{
				echo '<p>Update ready. <br> <hr> <a href="?doUpdate=1" class="btn btn-sm btn-success" >&raquo; Install Updates</a></p>';
				break;
			}
		}
	}
	
	if (isset($updated))
	{
		echo '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ok-sign"></i><strong>Well done!</strong> You successfully upgraded to version '.$aV.'.
                  </div>';
				$domain = $_SERVER["HTTP_HOST"];
				$self = $_SERVER["PHP_SELF"];
				$path = $domain . $self;
				$url = 'http://' . substr($path, 0, -18);
				?>
				<a href="<?php echo $url; ?>/upgrade" class="btn btn-sm btn-success" >Complete Updates</a>
	<?php 
	}
	else if ($found != true) echo 'No update is available.</p>';

	
}
else echo '<p>Could not find latest releases.</p>';
?>



<!-- End Upgrader -->
        <hr>
        <?php
        		$domain = $_SERVER["HTTP_HOST"];
				$self = $_SERVER["PHP_SELF"];
				$path = $domain . $self;
				$url = 'http://' . substr($path, 0, -18);
				?>
        <a href="<?php echo $url; ?>" class="btn btn-sm btn-dark" >Dashboard</a>
</div>

      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder clearfix">
      <p>
        <small>Web Updates Installer &copy; <?=date('Y')?></small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  <script src="../resource/js/jquery-2.1.1.min.js"></script>
  <!-- Bootstrap -->
  <script src="../resource/js/bootstrap.min.js"></script>
  <!-- App -->
  <script src="../resource/js/app.v2.js"></script> 
  <script src="../resource/js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../resource/js/app.plugin.js"></script>
</body>
</html>