<?php
	require_once '_main.php';
?>
<!--充值卡兑换-->
<div class="content-wrapper">
            <!-- left column -->

            <section class="content-header">
            <h1>
				流量兑换<small>Recharge</small>
            </h1>
        	</section>
        <section class="content">
        <div class="row">
            <div class="col-md-6">
            <div class="box box-primary">
        		<div class="box-header">
	                <i class="fa fa-exchange"></i>
	                <h3 class="box-title">兑换</h3>
            	</div>

	            <div class="box-body">
		             <div class="form-group">
			             <label for="cate_title">输入充值卡号</label>
			             <input id="input" class="form-control" name="payCode" >
		            </div>
                    <div id="msg-error" class="alert alert-warning alert-dismissable" style="display:none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-warning"></i> 出错了!</h4>
                        <p id="msg-error-p"></p>
                    </div>

                    <div id="msg-success" class="alert alert-info alert-dismissable" style="display:none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info"></i> Ok!</h4>
                        <p id="msg-success-p"></p>
                    </div>
	                <div class="box-footer">
						<button id="rechBtn" type="submit" class="btn btn-primary">兑换</button>
		            </div>
	            </div>
            </div>
            </div>
		</div>
        </section>
</div>
<script src="../asset/js/jQuery.min.js"></script>
<script>
    $(document).ready(function(){
        function recharge(){
            $.ajax({
                type:"POST",
                url:"_recharge.php",
                dataType:"json",
                data:{
                    payCode:$("#input").val()
                },
                success:function(data){
                    if(data.ok){
                        $("#msg-success-p").html(data.msg);
                        $("#msg-success").show();
                    }else{
                        $("#msg-error-p").html(data.msg);
                        $("#msg-error").show();
                    }
                }
            });
        }
       $("#html").keydown(function(event){
            if(event.keyCode==13){
                recharge();
            }
       });
       $("#rechBtn").click(function(){
                recharge();
       });
       
    });
</script>

<?php
require_once '_footer.php'; 
?>