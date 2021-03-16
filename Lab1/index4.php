<html>
<head>
<style>
#main_cont {
	display: -webkit-flex; 
	-webkit-flex-wrap: wrap;
	display: flex;
	flex-wrap: wrap;
	flex-direction: row;
	background-color: #ededed;
	padding: 20px;
	height: auto;
	min-width: 250px;
	}
#main_cont div {
	margin:10px;
	background-color: #7a0aad;
	border-radius: 10px;
	padding: 10px;
	flex: 1 1 100px;
	}
div#f1 {
	min-width: 100px;
	}
div#f3 {
	flex: 0 0 400px;
	}
div#f2 {
	flex: 0 0 400px;
	}
 @media screen and (max-width: 600px) {
	#main {
    display: block;
  }
	}
</style>
</head>
<body>
FlexBox
<hr>
<div id="main_cont">
<div id="f1">Flex 1</div>
<div id="f2">Flex 2</div>
<div id="f3">Flex 3</div>
</div>
</body>
</html>
