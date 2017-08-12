<?php

namespace Ss\Etc;


class Pay {
	private $db;
	function __construct(){
		global $db;
		$this->db=$db;
	}
	function recharge($payCode,$uid){
		if($this->db->has('recharge',[
			"AND"=>[
			'code'=>$payCode,
			'uid'=>0
			]])){
			$this->db->update('recharge',[
				'uid'=>$uid,
				'time'=>time()
				],[
				'code'=>$payCode
				]);
			return $this->db->select('recharge',['value'],[
				'code'=>$payCode,
				"LIMIT" => 1
				])[0]['value'];
		}else
			return 0;
	}
}