<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta name="keywords" content="A Simple CMS , Do Anything . Just Do What You Want To Do . 你不是一个很好的记录者，从现在起，尝试着勇敢的做自己。每天发现新的自己！" />
<meta name="description" content="快节奏的生活常常让我们迷失了自己，我们忙于学习，参加各类培训考试；忙于工作，争取升职加薪；忙着充实，忙着把自己的理想变为现实。我们从太阳刚刚冒出脑袋的清晨出发，忙到傍晚家家都已灯火阑珊时才归来。竞争越来越大，往前走的步伐也是愈迈愈快。很少有时间静下心来思考。我是谁？我到底想要什么？是不是曾忽略了父母双鬓渐渐增多的白发？是不是少有机会跟老朋友分享聊天？是不是偶尔也会孤独，颇有朱自清笔下那般“热闹是他们的，而我什么也没有“的落寞？是不是觉得自己怀才不遇，满腹委屈，甚至想过放弃？其实，所有这一切皆因我们在自我追求的路上走的过于心急。我们需要一个安静的空间和地点来审视自己。A Simple CMS是个驿站，在这里，你可以毫无顾虑的用心和自己对话，释放压力，轻装上阵。当脚步放慢了，心态平和了，你会发现生活并没有我们想象得那般糟糕！也许你不是一个很好的记录者，从现在起，尝试着勇敢的做自己！" />
<title>A Simple CMS , Do Anything .</title>
<link rel="Shortcut Icon" href="http://wansun-iblog.qiniudn.com/ws_icon-dribbble-color.png" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/jquery-1.8.2.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/layer/layer.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/js/jquery.easing.min.js"></script>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/index.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/index/css/iregister.css" type="text/css"/>
<style type="text/css">
body{width:99%;}
.errorMessage{color:white;}
</style>
<!-- 动态设置宽高 -->
<script type="text/javascript">
$(function(){
	
	var width  = window.screen.width - 20;	//浏览器可用宽度  除去滚动条
	var imagewidth = 60;
	var padding = 1;						//图片间距	
	var assignwidth = imagewidth + padding*2;		//默认最小图片宽度
	var tmp = parseInt(width / assignwidth);
	var margin = width - (tmp*assignwidth);
	
	$(".userhead").css({"padding":padding+"px"});
	$(".maincontent").css({"margin-left":margin/2+"px"});

	//用户搜索
	var searchwhat;
	var tmp;
	var uid;
	var flag;
	
	//input失去焦点设置button父节点a的href生成锚点
	$(".uname").blur(function(){
		
		searchwhat = $(this).val();
		tmp = searchwhat;
		if(searchwhat != ""){
			searchwhat = "#"+searchwhat;
			$(".searchbutton").parent().attr("href",searchwhat);
		}
		
	});

	//监听enter键跳到锚点
	$(document).keypress(function(e)    
	    {    
	        switch(e.which)    
	        {    
	            // user presses the "enter"    
	            case 13:    
		            
		            /////////////////////////////////////////
	            	searchwhat = $(".uname").val();
	            	tmp = searchwhat;
					//触发searchbutton点击事件
					$(".uname").trigger("blur");
	            	$(".searchbutton").trigger("click");
					////////////////////////////////////////////
	                break;      
	                                
	        }    
	    }); 

	//点击搜索跳转到锚点处
	$(".searchbutton").click(function(){
		
		flag = 0;				//初始化标志位
		if(searchwhat == ""){
			layer.tips('哎哟，没看到你啊有木有。', '.searchbutton',{time: 2,guide:0,style: ['background-color:black;color:white;','black']});
			return false;
		}

		//遍历判断是否存在class
		$(".userhead").each(function(){
			var iclass = $(this).attr("class");
			iclass = iclass.split(" ");
			if(iclass[1] == tmp){
				flag = 1;
				return false;	//退出循环
			}
			
		});

		if(!flag){
			
			layer.tips('哎哟，没看到你啊有木有。你确定你有脸了吗？（~~没脸去你的管理助手里照个脸吧~~，赶紧的。。~~）', '.searchbutton',{time: 6,guide:0,style: ['background-color:black;color:white;','black']});
			return false;
		}

		//提示信息
		layer.tips('here，我在这儿。', "."+tmp,{time: 0,guide:0,style: ['background-color:black;color:white;','black']});
		
	});


	//登录框

	var k=!0;

	$(".loginmask").css("opacity",0.8);
	
	if($.browser.version <= 6){
		$('#reg_setp,.loginmask').height($(document).height());
	}
	
	$(".thirdlogin ul li:odd").css({marginRight:0});	
	
	$(".user").click(function(){
		k&&"0px"!=$("#loginalert").css("top")&& ($("#loginalert").show(),$(".loginmask").fadeIn(500),$("#loginalert").animate({top:0},400,"easeOutQuart"));
	});
	
	$(".loginmask,.closealert").click(function(){
		k&&(k=!1,$("#loginalert").animate({top:-600},400,"easeOutQuart",function(){$("#loginalert").hide();k=!0}),$(".loginmask").fadeOut(500));
	});
	
	
	$("#sigup_now,.reg a").click(function(){
		$("#reg_setp,#setp_quicklogin").show();
		$("#reg_setp").animate({left:0},500,"easeOutQuart");
	});																																																																																
	
	$(".back_setp").click(function(){
		"block"==$("#setp_quicklogin").css("display")&&$("#reg_setp").animate({left:"100%"},500,"easeOutQuart",function(){$("#reg_setp,#setp_quicklogin").hide()});
	});

	//登陆错误信息
	var loginstatus = <?php echo $loginerror; ?>;
	loginstatus = parseInt(loginstatus);
	if(loginstatus){
		$("#loginalert").css("top")&& ($("#loginalert").show(),$(".loginmask").fadeIn(500),$("#loginalert").animate({top:0},400,"easeOutQuart"));
		
	}
	
});
</script>
</head>
<body>
<div style="display:none;">A Simple CMS，为爱编辑的你而生。</div>
<div style="display:none;" class="description">
快节奏的生活常常让我们迷失了自己，我们忙于学习，参加各类培训考试；忙于工作，争取升职加薪；忙着充实，忙着把自己的理想变为现实。我们从太阳刚刚冒出脑袋的清晨出发，忙到傍晚家家都已灯火阑珊时才归来。竞争越来越大，往前走的步伐也是愈迈愈快。很少有时间静下心来思考。我是谁？我到底想要什么？是不是曾忽略了父母双鬓渐渐增多的白发？是不是少有机会跟老朋友分享聊天？是不是偶尔也会孤独，颇有朱自清笔下那般“热闹是他们的，而我什么也没有“的落寞？是不是觉得自己怀才不遇，满腹委屈，甚至想过放弃？其实，所有这一切皆因我们在自我追求的路上走的过于心急。我们需要一个安静的空间和地点来审视自己。A Simple CMS是个驿站，在这里，你可以毫无顾虑的用心和自己对话，释放压力，轻装上阵。当脚步放慢了，心态平和了，你会发现生活并没有我们想象得那般糟糕！也许你不是一个很好的记录者，从现在起，尝试着勇敢的做自己！
</div>
<!-- 登录框 -->
<div class="loginmask"></div>
<div id="loginalert">
	<!--  -->
	<div class="pd20 loginpd">
		<h3><i class="closealert fr"></i><div class="clear"></div></h3>
		<div class="loginwrap">
			<div class="loginh">
				<div class="fl">会员登录</div>
				<div class="fr">还没有账号<a id="sigup_now" href="<?php echo $this->createUrl("/index/register"); ?>">立即注册</a></div>
			</div>
			
			<?php $form = $this->beginWidget("CActiveForm",array(
					'enableClientValidation'	=>	true,
					'clientOptions'				=>	array(
						'validateOnSubmit'	=>	true,
					),
				)); 
			?>
			<!-- <form action="" method="post" id="login_form"> -->
			
				<h3><span class="fl"><!-- 邮箱登录  --></span><span class="login_warning"><a>
				<?php echo $form->error($loginModel,'loginname'); ?>
				<?php echo $form->error($loginModel,'loginpass'); ?>
				</a></span><div class="clear"></div></h3>
			
				<div class="logininput">
					<!-- <input type="text" name="username" class="loginusername" value="" placeholder="邮箱/用户名" />  -->
					<?php echo $form->textField($loginModel,'loginname',array('class'=>'loginusername','placehoder'=>'邮箱/用户名')); ?>
					<!-- <input type="text" class="loginuserpasswordt" value="" placeholder="密码" />  -->
					<?php echo $form->passwordField($loginModel,'loginpass',array('class'=>'loginuserpasswordt','placehoder'=>'密码')); ?>
					<!-- <input type="password" name="password" class="loginuserpasswordp" style="display:none" /> -->
				</div>
				<div class="loginbtn">
					<div class="loginsubmit fl"><input type="submit" value="登录" class="btn" /></div>
					<!-- 
					<div class="fl" style="margin:26px 0 0 0;"><input id="bcdl" type="checkbox" checked="true" />保持登录</div>
					<div class="fr" style="margin:26px 0 0 0;"><a href="javascript:void(0);">忘记密码?</a></div>
					<div class="clear"></div>
					 -->
				</div>
			<!-- </form> -->
			<?php $this->endWidget(); ?>
		</div>
	</div>
	
	<div class="thirdlogin">
		<div class="pd50">
			<h4>用第三方帐号直接登录</h4>
			<ul>
				<li id="sinal"><a href="#">微博账号登录</a></li>
				<li id="qql"><a href="#">QQ账号登录</a></li>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
	
</div>
<!--loginalert end-->
<div class='isearchuser'>
<input type="text" name='whois' class='uname' style="outline:none;"/>
<a ><input type="button" class='searchbutton' value="搜索"/></a>
<div class="search-user">
	<a title="快速登录" class="user"><b></b></a>
</div>
</div>

<div class="maincontent">
<?php foreach ($users as $u): ?>
	<?php if(!empty($u['headpicture'])): ?>
		<div class="userhead <?php echo $u['username']; ?>"><a  name="<?php echo $u['username']; ?>" id="<?php echo $u['username']; ?>" href="<?php echo $this->createUrl("/index/m",array('who'=>$u['id'])); ?>" ><img src="<?php echo $url.$u['headpicture']; ?>"></a></div>
	<?php endif; ?>
<?php endforeach; ?>
</div>
<script>
$('.uname').on('mouseenter', function(){
	 layer.tips('输入用户名搜搜自己在哪儿吧。', '.uname',{time: 0,guide:0,style: ['background-color:black;color:white;','black']});
	 
});
$('.uname').on('mouseleave', function(){
	layer.closeTips();
	 
});
</script>
</body>
</html>