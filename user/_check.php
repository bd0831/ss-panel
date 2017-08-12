<?php
if(isset($_COOKIE['uid'])){
    $uid = $_COOKIE['uid'];
    $user_email = $_COOKIE['user_email'];
    $user_pwd  = $_COOKIE['user_pwd'];

    $U = new \Ss\User\UserInfo($uid);
    //验证cookie
    $pwd = $U->GetPasswd();
    $pw = \Ss\User\Comm::CoPW($pwd);
    if($pw != $user_pwd || $pw == null || $user_pwd == null  ){
        header("Location:login.php");
        exit();
    }
}else{
    header("Location:login.php");
    exit();
}
$oo = new Ss\User\Ss($uid);