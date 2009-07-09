<?php

#  GLOBALS
define('DATABASE_FILE','../../data/db/open-comments.sqlite');

# the main output container
$output ="";
$data = array();

$data['action']="test";

# a simple controller will distribute the different tasks this script is called to do
switch ($action){ 

case "edit":
	break;
	
default:
	# the default action is to show the comments for the specific page that loaded the script.
	showComments();
	showForm();
}

echo $output;


function showComments(){
	global $data, $output;

	//include("crude_pdo.php");
	//$data = new crude("id", "comments");
	//$id = $data ->get('1');
	//print_r( $id );


    $dbh=getdbh();
    $sql = 'SELECT * FROM "comments" WHERE path="'.$_REQUEST['path'].'"';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
	if (!$rs)
      return false;

	$data['comments'][]=$rs;
	}
	$output .= getView("oc_comment.php", $data);
    return true;

 }
 
function showForm(){
	global $data, $output;

	$output .= getView("oc_form.php", $data);
}

# filter path 

# verify login

# add comment

# return an error

# delete comment

#get config - this returns a sub-set of the configuration file in JSON format. we expose only the essential variables that javascript needs to run. as an additional security step all this information is compaired when it's returned to the user. 

# getView - loads the markup to present the data

function getView($filename,&$vars=null) {
  if (is_array($vars))
    extract($vars);
  ob_start();
  require('../views/fragments/'.$filename);
  return ob_get_clean();
}


//===============================================
// Database
//===============================================
function getdbh() {

  if (!isset($GLOBALS['dbh']))
    try {
      $GLOBALS['dbh'] = new PDO('sqlite:'.DATABASE_FILE);
    } catch (PDOException $e) {
      die('Connection failed: '.$e->getMessage());
    }
  return $GLOBALS['dbh'];
}


?>