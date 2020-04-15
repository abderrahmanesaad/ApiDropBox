<?php 
require_once '/home/xtreamcodes/dropbox/dropbox/vendor/autoload.php';
use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;

$dropboxKey ="";
$dropboxSecret ="";
$dropboxToken="";


$app = new DropboxApp($dropboxKey,$dropboxSecret,$dropboxToken);
$dropbox = new Dropbox($app);

$server = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";

if ($_GET["q"] == null){
	$folderName="/";
}
else  {$folderName= $_GET["q"];}  

$file = $dropbox->listFolder($folderName)->getItems();
// echo'<pre>',print_r($file),'</pre>';

echo"<h2><a href='".$server."'>";
echo "Main folder";
echo "</a></h2><br>";
foreach ($file as $fi) {

	echo"<li><a href='".$server."?q=".$fi->getPathDisplay()."'>";
	printf("%s", $fi->getName());
	echo "</a></li><br>";

}


?>