<?php

require_once '_main.php';
$data=$db->select("user",
	["[><]recharge"=>"uid"],
	["user.user_name","recharge.value","recharge.time"],
	["ORDER"=>"recharge.time"]);
$string=[
	'%s : %s 解囊相助，为网站贡献了%d元!',
	'%s : %s 挥金如土，一口气给大家捐出了%d元!',
	'%s : %s 为网站捐出%d 元，请叫ta雷锋！'
];
?>
<div class="content-wrapper">
        <section class="content-header">
            <h1>
                网站流水
                <small>Check</small>
            </h1>
        </section>
         <section class="content">
        <div class="row">
                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <h3 class="box-title">网站收入</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                        <?php
                        	foreach ($data as $i) {
                        		$str=$string[rand(0,count($string)-1)];
                   echo "<p>".sprintf($str,date("Y-m-d G:i:s",$i['time']),$i['user_name'],array_search($i['value'],$goods))."</p>";
                        	}
                        ?>
                        </div>
                        <!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (right) -->
	    </div>
	    </section>
</div>
<?php
require_once '_footer.php';
?>