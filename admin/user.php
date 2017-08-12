<?php
require_once '_main.php';
$Users = new Ss\User\User();
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户管理
                <small>User Manage</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <div class="col-lg-2">
                            <input id="name" class="form-control" type="username" placeholder="用户名">
                        </div>
                        <div class="col-lg-2">
                            <input id="email" class="form-control" type="email" placeholder="邮箱">
                        </div>
                        <div class="col-lg-2">
                            <input id="port" class="form-control" placeholder="端口">
                        </div>
                        <button id="search" class="btn btn-primary">查找</button>
                    </div>
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table id="user" class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>用户名</th>
                                    <th>邮箱</th>
                                    <th>端口</th>
                                    <th>总流量</th>
                                    <th>剩余流量</th>
                                    <th>已使用流量</th>
                                    <th>最后签到</th>
                                    <th>到期时间</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                                <?php
                                $us = $Users->AllUser();
                                foreach ( $us as $rs ){ ?>
                                    <tr>
                                        <td>#<?php echo $rs['uid']; ?></td>
                                        <td><?php echo $rs['user_name']; ?></td>
                                        <td><?php echo $rs['email']; ?></td>
                                        <td><?php echo $rs['port']; ?></td>
                                        <td><?php \Ss\Etc\Comm::flowAutoShow($rs['transfer_enable']); ?></td>
                                        <td><?php \Ss\Etc\Comm::flowAutoShow(($rs['transfer_enable']-$rs['u']-$rs['d'])); ?></td>
                                        <td><?php \Ss\Etc\Comm::flowAutoShow(($rs['u']+$rs['d'])); ?></td>
                                        <td><?php echo date('Y-m-d H:i:s',$rs['last_check_in_time']); ?></td>
                                        <td><?php echo date('Y-m-d H:i:s',$rs['disable_time']); ?></td>
                                        <td><?php if($rs['enable']) echo "可用";else echo "不可用"?></td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="user_edit.php?uid=<?php echo $rs['uid']; ?>">查看</a>
                                            <a class="btn btn-danger btn-sm" href="user_del.php?uid=<?php echo $rs['uid']; ?>" onclick="JavaScript:return confirm('确定删除吗？')">删除</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<script src="../asset/js/jQuery.min.js"></script>    
<script type="text/javascript">
    $(document).ready(function(){
        function search(){
            var cmp_name=$("#name").val();
            var cmp_email=$("#email").val();
            var cmp_port=$("#port").val();
            $("#user tr:not(:first-child)").each(function($i,$row){
                var name=$row.cells[1].innerHTML;
                var email=$row.cells[2].innerHTML;
                var port=$row.cells[3].innerHTML;
                if(name.indexOf(cmp_name)==-1||email.indexOf(cmp_email)==-1||(cmp_port!="" && cmp_port!=port)){
                    $(this).hide();
                }else{
                    $(this).show();
                }
            });
        }
        $("#search").click(function(){
            search();
        });
        $("html").keydown(function(event){
            if(event.keyCode==13){
                search();
            }
        });
    });
</script>

<?php
require_once '_footer.php'; ?>
