<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/register.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="js/register.js">
	</script>
	<title> 注册页面 </title>
	</head>
	<body>
	<div id = "wrapper">
		<div id="header"></div>
		<div id="content">
			<a href="index.php"><img src="images/logo.png"/></a><h1>欢迎您的加入</h1>
				<div class="clearfix">
					<div class="article">
					<form action="registerResult.php" method="post" name="form1">
						<div class="item">
							<label>登录名</label>
							<input id ="login_name" class="basic-input" type="text" tabindex="1" maxlength="15" name="count_name">
							<span id="prompt1" class="validate-option" style="display: none ;">字母或下划线,最长15个字符</span>
						</div>
						<div class="item">
							<label>用户名</label>
							<input id="user_name" class="basic-input" type="text" value="" tabindex="3" maxlength="15" name="user_name">
							<span id="prompt2" class="validate-option" style="display: none;">中、英文均可，最长14个英文或7个汉字</span>
						</div>
						<div class="item">
							<label>密码</label>
							<input id="password" class="basic-input" type="password" maxlength="14" tabindex="2" name="password">
							<span id="prompt3" class="validate-option" style="display: none;">字母、数字或符号，最长15个字符，区分大小写</span>
						</div>
						<div class="item-submit">
							<label>&nbsp;</label>
							<input id="button" class="btn-submit" type="submit" title="注册" tabindex="6" value="注册">
                            <a href="index.php"><span>首页</span></a>
						</div>
					</form>
				</div>
					<div class="aside">
					<p class = "p1">
					已经拥有账号？
					<a href = "login.php">直接登录</a>
					</p>
				</div>
				</div>
		</div>
		<div id="footer">
     	 <div id="footer-inner">
        	 <p>
		  		 AngryBug - MyNotes/豆荚网 <br />&copy; 2012 - 2013 
          		 <a href="#" title="No href now!">Contact Us</a>
        	 </p>
     	 </div>
    	</div>
	</div>
	</body>
</html>