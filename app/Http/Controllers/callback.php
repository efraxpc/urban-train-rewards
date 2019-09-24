<?php
/*


Basic Postback Example Script.
Copyright 2009. CPA Lead. All Rights Reserved
*/

$YOURPASSWORD = "Master*1!cpalead$#@"; //this is the password you set when creating your widget
$mysql_where = "localhost"; //hostname - usually localhost
$mysql_username = "monty"; //database username
$mysql_password = "alexpass"; //database password
$mysql_database = "rewards"; //database name

$password = $_REQUEST['password'];
    if ($password != $YOURPASSWORD) {
        echo "Access Denied";
    exit;
}

mysql_connect($mysql_where, $mysql_username, $mysql_password);
mysql_select_db($mysql_database);

/*


For a complete variable list see: http://www.cpalead.com/postback-variables.php (You must be logged in to view).
*/
$subid = $_REQUEST['subid'];
$survey = $_REQUEST['survey'];
$earn = $_REQUEST['earn'];
$pdtshow = $_REQUEST['pdtshow'];

//$query_getuserid = mysql_query("SELECT id from members WHERE username= '".$subid."'") or die(mysql_error());
//foreach(mysql_fetch_array($query_getuserid) as $userid);

$query_checkRef = mysql_query("SELECT referral_ID from members WHERE username= '".$subid."'") or die(mysql_error());
foreach(mysql_fetch_array($query_checkRef) as $ref_id_user);
    if ($ref_id_user>=1)
    {
        mysql_query("UPDATE users SET points=points+".$pdtshow." WHERE username='".$subid."'");
        mysql_query("UPDATE users SET completed_surveys=completed_surveys+1 WHERE username ='".$subid."'");
        mysql_query("UPDATE users SET points=points+".$refer_points." WHERE id ='".$ref_id_user."'");
        mysql_close();
        echo "Success: ".$subid." earned ".$pdtshow." points\n and is referred by".$ref_id_user;
    }else {
        mysql_query("UPDATE users SET points=points+".$pdtshow." WHERE username='".$subid."'");
        mysql_query("UPDATE users SET completed_surveys=completed_surveys+1 WHERE username ='".$subid."'");
        mysql_close();
        echo "Success: ".$subid." earned ".$pdtshow." points\n and is referred by nobody";
    }

?>