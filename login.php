<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/login.css" type="text/css" rel="stylesheet" />
	<title> 登录页面 </title>
	</head>
	<body>
	<div id = "wrapper">
		<div id="header"></div>
		<div id="content">
			<a href="index.php"><img src="images/logo.png"/></a><h1>欢迎登陆豆荚网</h1>
				<div class="clearfix">
					<div class="article">
					<form action="loginResult.php" method="post" name="form1">
						<div class="item">
							<label>登陆名</label>
							<input id ="login_name" class="basic-input" type="text" tabindex="1" maxlength="15" name="count_name">
						</div>
						<div class="item">
							<label>密码</label>
							<input id="password" class="basic-input" type="password" maxlength="20" tabindex="2" name="password">
						</div>
						<div class="item-submit">
							<label>&nbsp;</label>
							<input id="button" class="btn-submit" type="submit" title="登录" tabindex="6"  value="登录">
                            <a href="index.php"><span>首页</span></a>
						</div>
					</form>
				</div>
					<div class="aside">
					<p class = "p1">
					还没有账号？
					<a href = "register.php">免费注册</a>
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