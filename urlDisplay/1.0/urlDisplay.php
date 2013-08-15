<?php
function checkHTTPS() {
    if(!empty($_SERVER['HTTPS']))
        if($_SERVER['HTTPS'] !== 'off'){return true;}
        else{return false;}
     else
        if($_SERVER['SERVER_PORT'] == 443){return true;}
        else{return false;}
}
function urlDisplay(){
if(checkHTTPS() == true){$gets = "https://";}else{$gets = "http://";}
$gets = "http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
if(isset($_GET)){
$gets = $gets."?";
foreach($_GET as $key => $value){
$gets = $gets.$key."=".$value."&";
}
$gets = substr($gets, 0, -1);
}
echo $gets;
}
?>