<!DOCTYPE html>
<html>
<head>
 <title>User</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<style>
    .content{
        text-align:center;
        position: absolute;
        margin:10px;
        padding: 10px;
        border-radius: 10px;
        border:solid black;
        width:50%;
    
      }

      .left-footer{
        text-align:left;
      }

      .image{
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      }

      .image img-icon{
        border-radius: 50%;
      }

</style>
<body>
<div class="content">
<h2>MTICS Confirmation Message</h2>
<h4>Hello {{$fname}} {{$lname}}</h4>
<h4>from: {{$section}}</h4>
<h5>Message</h5>
<p>Please wait for our answer to your service inquiry as we appreciate you using the MTICS Printing Service. Please look for messages in your inbox.</p>
<div class="image">
<img class="img-icon" src="{{ $message->embed(public_path('/images/mtics.jpg')) }}"/>
</div>
<div class="left-footer">
<h6>Best Regards</h6>
<p>MTICS Admin</p>
</div>
</div>
</body>
</html>