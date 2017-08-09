<?php
require_once '_main.php';
$node = new Ss\Node\Node();
?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                节点列表
                <small>Node List</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- START PROGRESS BARS -->
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <i class="fa fa-th-list"></i>
                            <h3 class="box-title">节点</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="callout callout-warning">
                                <h4>注意!</h4>
                                <p>请勿在任何地方公开节点地址！</p>
                            </div><?php
                            $node0 = $node->NodesArray(0);
                            foreach($node0 as $row){
                                ?>
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs pull-right">
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                操作 <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li role="presentation"><a role="menuitem" target="_blank" tabindex="-1" href="node_qr.php?id=<?php echo $row['id']; ?>">二维码</a></li>
                                            </ul>
                                        </li>
                                        <li class="pull-left header"><i class="fa fa-angle-right"></i> <?php echo $row['node_name']; ?></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1-1">
                                            <p> <a class="btn btn-xs bg-purple btn-flat margin" href="#">地址:</a> <code><?php echo $row['node_server']; ?></code>
                                                <a class="btn btn-xs bg-blue btn-flat margin" href="#">加密:</a> <code><?php echo $row['node_method']; ?></code>
                                            </p>
                                            <p>
                                                <a class="btn btn-xs bg-red btn-flat margin" href="#">协议:</a> <code><?php echo $row['node_protocol']; ?></code>
                                                <a class="btn btn-xs bg-green btn-flat margin" href="#">协议参数:</a> <code><?php echo $row['node_protocol_param']; ?></code>
                                                </p>
                                                <p>
                                                <a class="btn btn-xs bg-orange btn-flat margin" href="#">混淆:</a> <code><?php echo $row['node_obfs']; ?></code>
                                                <a class="btn btn-xs bg-red btn-flat margin" href="#">混淆参数:</a> <code><?php echo $row['node_obfs_param']; ?></code>
                                            </p>
                                            <p> <?php echo $row['node_info']; ?></p>
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div><!-- nav-tabs-custom -->
                            <?php }?>
                        </div><!-- /.box-body -->


                    </div><!-- /.box -->
                </div><!-- /.col (left) -->

                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <i class="fa fa-th-list"></i>
                            <h3 class="box-title">IPV6节点</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="callout callout-warning">
                                <h4>注意!</h4>
                                <p>需使用高校校园网连接</p>
                            </div><?php
                            $node1 = $node->NodesArray(1);
                            foreach($node1 as $row){
                                ?>
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs pull-right">
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                操作 <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li role="presentation"><a role="menuitem" target="_blank" tabindex="-1" href="node_qr.php?id=<?php echo $row['id']; ?>">二维码</a></li>
                                            </ul>
                                        </li>
                                        <li class="pull-left header"><i class="fa fa-angle-right"></i> <?php echo $row['node_name']; ?></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1-1">
                                            <p> <a class="btn btn-xs bg-purple btn-flat margin" href="#">地址:</a> <code><?php echo $row['node_server']; ?></code>
                                                <a class="btn btn-xs bg-blue btn-flat margin" href="#">加密:</a> <code><?php echo $row['node_method']; ?></code>
                                            </p>
                                            <p>
                                                <a class="btn btn-xs bg-red btn-flat margin" href="#">协议:</a> <code><?php echo $row['node_protocol']; ?></code>
                                                <a class="btn btn-xs bg-green btn-flat margin" href="#">协议参数:</a> <code><?php echo $row['node_protocol_param']; ?></code>
                                                </p>
                                                <p>
                                                <a class="btn btn-xs bg-orange btn-flat margin" href="#">混淆:</a> <code><?php echo $row['node_obfs']; ?></code>
                                                <a class="btn btn-xs bg-red btn-flat margin" href="#">混淆参数:</a> <code><?php echo $row['node_obfs_param']; ?></code>
                                            </p>
                                            <p> <?php echo $row['node_info']; ?></p>
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div><!-- nav-tabs-custom -->
                            <?php }?>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (right) -->
                 
            </div><!-- /.row -->
            <!-- END PROGRESS BARS -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php
require_once '_footer.php'; ?>
