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
        width:300px;
    
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
<h2>Thank you for Using the MTICS Printing Services ! {{$email}}</h2>
<div class="container">
<h5>Student Name: {{$fname}} {{$lname}}</h5>
<h5>Course & Section: {{$section}}</h5>
<br>
<h4><strong>Service Details</strong></h4>
<h5>File Name: {{$filename}}</h5>
<h5>Color Options: {{$options}}</h5>
<h5>Number of Copies: {{$quantity}}</h5>
<h5>Printing Cost: {{$cost}}</h5>

<h5><strong>You may now claim the printed file</strong></h5>
<p>{{$filename}}</p>
</div>

<div class="image">
<img class="img-icon" src="{{ $message->embed(public_path('/images/mtics.jpg')) }}"/>
</div>
</div>
</body>
</html>