<?php
include("mydb.php");
$ip=$_SERVER['REMOTE_ADDR']; 
if($_POST['id'])
{
$id=$_POST['id'];

$ip_sql=mysql_query("select ip_add from fx_image_ip where img_id_fk='$id' and ip_add='$ip'");
$count=mysql_num_rows($ip_sql);

if($count==0)
{
$sql = "update fx_blog set love=love+1 where id='$id'";
mysql_query( $sql);
$sql_in = "insert into fx_image_ip (ip_add,img_id_fk) values ('$ip','$id')";
mysql_query( $sql_in);

$result=mysql_query("select love from fx_blog where id='$id'");
$row=mysql_fetch_array($result);
$love=$row['love'];
?>
<span class="over_img" align="right" style=" color:black;font-family:BKoodakBold,Arial, Helvetica, sans-serif;font-size:11pt;margin-right:10px;"><?php echo $love; ?> نفر پسندیده </span>
<?php
}
else
{
echo '<span style="color:black">شما به این موضوع رای دادید</span>';
}



}

?>