<?php
namespace Ss\Node;
 class Node {

    private $db;

    function __construct(){
        global $db;
        $this->db=$db;
    }

    function NodesArray($node_type){
        $node_array = $this->db->select("ss_node","*",[
           "node_type[=]" => $node_type,
           "ORDER" => "node_order",
        ]);
        return $node_array;
    }
    function NodeInfo($id){
        $nodeInfo=$this->db->select("ss_node","*",[
            "id"=>$id
            ]);
        return $nodeInfo[0];
    }

    function AllNode(){
        $node_array = $this->db->select("ss_node","*",[
            "ORDER" => "node_order"
        ]);
        return $node_array;
    }

    function Add($node_name,$node_type,$node_server,$node_method,$node_protocol,$node_protocol_param,$node_obfs,
        $node_obfs_param,$node_info,$node_order){
         $this->db->insert("ss_node", [
             "node_name" => $node_name,
             "node_type" => $node_type,
             "node_server" => $node_server,
             "node_method" => $node_method,
             "node_protocol" => $node_protocol,
             "node_protocol_param" =>$node_protocol_param,
             "node_obfs" =>$node_obfs,
             "node_obfs_param" =>$node_obfs_param,
             "node_info" => $node_info,
             "node_order" =>  $node_order
         ]);
     }
    function Del($id){
        $this->db->delete($this->table,[
            "id" => $id
        ]);
    }
    function Update($id,$node_name,$node_type,$node_server,$node_method,$node_protocol,
        $node_protocol_param,$node_obfs,$node_obfs_param,$node_info,$node_order){
        $ret=$this->db->update("ss_node", [
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
            "id[=]"  => $id
        ]);
        return $ret;
    }
    private function encode($str){
        return str_replace('=','',base64_encode($str));
    }
    function getSSRUrl($id){
        global $oo;
        global $site_url;
        $array=$this->NodeInfo($id);
        $server = $array['node_server'];
        $method = $array['node_method'];
        $protocol=$array['node_protocol'];
        $protocol_param=$array['node_protocol_param'];
        $obfs=$array['node_obfs'];
        $obfs_param=$array['node_obfs_param'];
        $pass = $oo->get_pass();
        $port = $oo->get_port();
        $name = $array['node_name'];
        $ssrurl = $server.":".$port.":".$protocol.":".$method.":".$obfs.":".$this->encode($pass)."/?obfsparam=".$this->encode($obfs_param)."&protoparam=".$this->encode($protocol_param)."&remarks=".$this->encode($name)."&group=".$this->encode($site_url);
        $ssrqr = "ssr://".$this->encode($ssrurl);
        return $ssrqr;
    }
}