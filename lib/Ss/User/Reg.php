<?php


namespace Ss\User;


class Reg {

    private $db;
    function __construct(){
        global $db;
        $this->db = $db;
    }

    function GetLastPort(){
        $datas = $this->db->select('user',"*",[
            "ORDER" => "uid DESC",
            "LIMIT" => 1
        ]);
        return $datas['0']['port'];
    }

    function Reg($username,$email,$pass,$transfer){
        $sspass = \Ss\Etc\Comm::get_random_char(8);
        $time=time()+3600*30*24;
        $this->db->insert("user",[
           "user_name" => $username,
            "email" => $email,
            "pass" => $pass,
            "passwd" =>  $sspass,
            "t" => '0',
            "u" => '0',
            "d" => '0',
            "transfer_enable" => $transfer,
            "port" => $this->GetLastPort()+rand(1,5),
            "#reg_date" =>  'NOW()',
            "#disable_time"=>$time
        ]);
    }

}