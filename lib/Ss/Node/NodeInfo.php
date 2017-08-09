<?php


namespace Ss\Node;


class NodeInfo{

    private $table = "ss_node";
    private $db;
    private $id;
    function __construct($id){
        global $db;
        $this->db=$db;
        $this->id=$id;
    }
    function NodeArray(){
        $datas = $this->db->select($this->table,"*",[
            "id" => $this->id,
            "LIMIT" => "1"
        ]);
        return $datas['0'];
    }

    function Del(){
        $this->db->delete($this->table,[
            "id" => $this->id
        ]);
    }

    function Update($node_name,$node_type,$node_server,$node_method,$node_protocol,
        $node_protocol_param,$node_obfs,$node_obfs_param,$node_info,$node_order){
        $this->db->update("ss_node", [
            "node_name" => $node_name,
            "node_type" => $node_type,
            "node_server" => $node_server,
            "node_method" => $node_method,
            "node_protocol"=>$node_protocol,
            "node_protocol_param"=>$node_protocol_param,
            "node_obfs"=>$node_obfs,
            "node_obfs_param"=>$node_obfs_param,
            "node_info" => $node_info,
            "node_order" =>  $node_order
        ],[
            "id[=]"  => $this->id
        ]);
        return 1;
    }

}