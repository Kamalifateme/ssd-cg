<section id="content"> <section class="vbox"> <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
		<li><a href="<?=base_url()?>"><i class="fa fa-home"></i> <?=lang('home')?></a></li>
		<li class="active"><?=lang('updates')?></li>
	</ul>
	 <div class="row">
	 <div class="col-lg-8">
	<section class="panel panel-default">
	<div class="panel-body">
<!-- Start Upgrader -->
<?php
error_reporting(0);
ini_set('max_execution_time',120);
$version = $this->config->item('version');
//Check For An Update
$getVersions = file_get_contents($this->config->item('update_check')) or die ('ERROR checking Updates');
if ($getVersions != '')
{
	echo '<p>CURRENT VERSION: <span class="badge bg-info"><strong>'.$version.'</span></strong></p>';
	echo '<pre><p>Reading Current Releases List</p>';
	$versionList = explode("\n", $getVersions);	
	foreach ($versionList as $aV)
	{
		if ( $aV > $version) {
			echo '<p>New Update Found: <span class="badge bg-primary"><strong> v'.$aV.'</span></strong></p>';
			$found = TRUE;
			
			if ( !is_file($this->config->item('update_url').'FO-'.$aV.'.zip' )) {
				echo '<p>Downloading New Update</p>';
				$newUpdate = file_get_contents($this->config->item('update_url').'FO-'.$aV.'.zip');
				if ( !is_dir('./UPDATES/' ) ) mkdir ('./UPDATES/' );
				$dlHandler = fopen('./UPDATES/FO-'.$aV.'.zip', 'w');
				if ( !fwrite($dlHandler, $newUpdate) ) { echo '<p>Could not save new update. Operation aborted.</p>'; exit(); }
				fclose($dlHandler);
				echo '<p>Updates Downloaded and Saved</p>';
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
					if ( !is_dir ('./'.$thisFileDir ) )
					{
						 mkdir ('./'.$thisFileDir );
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
							$updateThis = fopen('./'.$thisFileName, 'w');
							fwrite($updateThis, $contents);
							fclose($updateThis);
							unset($contents);
							//echo' UPDATED</li>';
						}
					}
				}
				//echo '</ul>';
				echo "</pre>";
				$updated = TRUE;
			}else{
				echo '<p>Update ready for Installation. <br> <hr> <a href="?doUpdate=1" class="btn btn-sm btn-success" >&raquo; Install Updates</a></p>';
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
                  ?>
				<a href="<?php echo base_url()?>update_install/db_schema" class="btn btn-sm btn-success" >Update Database</a>
	<?php 
	}else if (isset($found) != TRUE) echo 'No update is available.</p>';

	
}
else echo '<p>Could not find latest releases.</p>';
?>
</div></div>
</section>
<!-- End Upgrade -->
<!-- footer -->
  <footer id="footer">
    <div class="text-center padder clearfix">
      <p>
        <small>Web Updates Installer &copy; <?=date('Y')?></small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
</div>

</section>
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
</section>