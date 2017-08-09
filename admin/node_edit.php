<?php
require_once '_main.php';
//更新
if(!empty($_POST)){
    $node_id       = $_POST['node_id'];
    $node_name     = $_POST['node_name'];
    $node_type     = $_POST['node_type'];
    $node_server   = $_POST['node_server'];
    $node_method   = $_POST['node_method'];
    $node_protocol = $_POST['node_protocol'];
    $node_protocol_param = $_POST['node_protocol_param'];
    $node_obfs = $_POST['node_obfs'];
    $node_obfs_param = $_POST['node_obfs_param'];
    $node_info     = $_POST['node_info'];
    $node_order    = $_POST['node_order'];
    $node = new \Ss\Node\NodeInfo($node_id);
    $query = $node->Update($node_name,$node_type,$node_server,$node_method,$node_protocol,
        $node_protocol_param,$node_obfs,$node_obfs_param,$node_info,$node_order);
    if($query){
        echo ' <script>alert("更新成功!")</script> ';
        echo " <script>window.location='node.php';</script> " ;
    }
    exit();
}
if(!empty($_GET)){
    //获取id
    $id = $_GET['id'];
    $node = new \Ss\Node\NodeInfo($id);
    $rs = $node->NodeArray();
}

?>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            节点编辑
            <small>Node Update</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">编辑节点</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="node_edit.php">
                        <div class="box-body">

                            <div class="form-group" style="display:none" >
                                <label for="cate_title" >ID</label>
                                <input  class="form-control" name="node_id" value="<?php echo $id;?>"  >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">节点名字</label>
                                <input  class="form-control" name="node_name" value="<?php echo $rs['node_name'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">节点地址</label>
                                <input  class="form-control" name="node_server" value="<?php echo $rs['node_server'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_method">加密方式</label>
                                <input  class="form-control" name="node_method" value="<?php echo $rs['node_method'];?>" >
                            </div>
                            <div class="form-group">
                                <label for="cate_method">协议</label>
                                <input  class="form-control" name="node_protocol" value="<?php echo $rs['node_protocol'];?>" >
                            </div>
                            <div class="form-group">
                                <label for="cate_method">协议参数</label>
                                <input  class="form-control" name="node_protocol_param" value="<?php echo $rs['node_protocol_param'];?>" >
                            </div>
                            <div class="form-group">
                                <label for="cate_method">混淆</label>
                                <input  class="form-control" name="node_obfs" value="<?php echo $rs['node_obfs'];?>" >
                            </div>
                            <div class="form-group">
                                <label for="cate_method">混淆参数</label>
                                <input  class="form-control" name="node_obfs_param" value="<?php echo $rs['node_obfs_param'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">节点描述</label>
                                <input  class="form-control" name="node_info" value="<?php echo $rs['node_info'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_order">分类(0或者1)</label>
                                <input   class="form-control" name="node_type"  value="<?php echo $rs['node_type'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_order">排序</label>
                                <input   class="form-control" name="node_order"  value="<?php echo $rs['node_order'];?>" >
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="action" value="edit" class="btn btn-primary">修改</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.box -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
require_once '_footer.php'; ?>
