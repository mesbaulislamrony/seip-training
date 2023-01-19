<html>
<head>
<title>Google</title>
<style>
body{
	height:60%;
	width:100%;
	margin:0;
	padding:0;
	display:table;
	box-sizing:border-box;
	text-align:center;
}
form{
	display: table-cell;
	vertical-align: middle;
}
.inputgroup{	
	width:480px;
	margin:0 auto;
}
.logo{
	max-width:272px;
	margin:0 auto;
	padding-bottom:15px;
	position:relative;
}
.logo img{
	width:100%;
	display:block;
}
.logo p{
	margin:0;
	position:absolute;
	left:5px;
	bottom:14px;
	text-align:left;
	text-transform:lowercase;
}
input[type="text"]{
	width:100%;
	padding:3px;
	line-height:24px;
	box-sizing:border-box;
}
.submit{
	height:36px;
	background-color: #f2f2f2;
	border: 1px solid #f2f2f2;
	border-radius: 2px;
	color: #757575;
	cursor: default;
	font-family: arial,sans-serif;
	font-size: 13px;
	font-weight: bold;
	margin: 11px 4px;
	min-width: 54px;
	padding: 0 16px;
	text-align: center;
}
</style>
</head>
<body>
<form action="https://www.google.com/search" method="get" >
	<div class="logo">
		<img src="googlelogo.png">
		<p>Developed by r.max</p>
	</div>
	<div class="inputgroup">
		<input type="text" name="q">
		<button class="submit">Google Search</button>
	</div>
</form>
</body>
</html>

