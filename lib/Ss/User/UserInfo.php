<?php

namespace Ss\User;


class UserInfo {

    public  $uid;
    private $db;

    private $table = "user";

    function __construct($uid=0){
        global $db;
        $this->uid = $uid;
        $this->db  = $db;
    }

    //user info array
    function UserArray(){
        $datas = $this->db->select($this->table,"*",[
            "uid" => $this->uid,
            "LIMIT" => "1"
        ]);
        return $datas['0'];
    }
    function DisableDate(){
        return date('Y-m-d h:i:s',$this->UserArray()['disable_time']);
    }
    function GetPasswd(){
        return $this->UserArray()['pass'];
    }

    function GetEmail(){
        return $this->UserArray()['email'];
    }

    function GetUserName(){
        return $this->UserArray()['user_name'];
    }

    function RegDate(){
        return $this->UserArray()['reg_date'];
    }

    function RegDateUnixTime(){
        return strtotime($this->RegDate());
    }

    function UpdatePwd($pass){
        $this->db->update("user",[
            "pass" => $pass
        ],[
            "uid" => $this->uid
        ]);
    }

    function isAdmin(){
        if($this->db->has("ss_user_admin",[
            "uid" => $this->uid
        ])){
            return true;
        }else{
            return false;
        }
    }

    function DelMe(){
        $this->db->delete($this->table,[
            "uid" => $this->uid
        ]);
    }
}