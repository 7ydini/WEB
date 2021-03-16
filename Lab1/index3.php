<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>InetProg</title>
<link rel="stylesheet" href="/bootstrap-4.0.0/dist/css/bootstrap.css"> 
<script src="/bootstrap-4.0.0/js/tests/vendor/jquery-1.9.1.min.js"></script> 
<script src="/bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script> 
<script src="/bootstrap-4.0.0/dist/js/bootstrap.js"></script> 
<link href="https://fonts.google.com/share?selection.family=Open%20Sans:wght@300"rel="stylesheet">
  <style>   
body {font-family: Courier New;}
    .column {
      font-size:14px;
      display: inline-block;
      border: 1px solid #ccc;
      background-color: #eee;
      padding: 10px;
      box-sizing: border-box;
      vertical-align: top;
    }    
    /*.first {
      margin-first:10px;
      width: calc(100% - 600px);
    }    
    .sec {   
	width: 250px;
    }
    .third{
	width: 250px;
}  */  
    .column p {
      margin: 0;
    }    
    @media (max-width: 600px) {      
      .first {
        width: 100%;
      }
      .sec{
        width: 100%;
        margin:0;
      }
	.third{
	width: 100%;
        margin:0;
}
    }
  </style>
</head>
 
<body>
<div class="container-fluid">
  <div class="row">
    <div class="column first col-sm-4 order-sm-1 order-3">
      <p>colomn 1</p>
    </div>
    <div class="column sec col-sm-2 order-sm-2 order-2">
      <p>colomn 2</p>
    </div>
    <div class="column third col-sm-6 order-sm-3 order-1">
      <p>colomn 3</p>
    </div>
  </div>
</div>
</body>
 
</html>
