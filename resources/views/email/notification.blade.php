<!DOCTYPE html>
<html>
<head>
 <title>User</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<style>
    .content{
        text-align:center;
        margin:10px;
        padding: 10px;
        position: absolute;
        border-radius: 10px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .image{
        position: relative;
        height: 150px;
        width: 150px;
        border-radius: 50%;
        border:solid 2px black;
    }
    .image .img-icon{
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 50%;
      box-shadow: 0 5px 20px rgba(0,0,0,0.4);
    }

</style>
<body>
<div class="content">
<h2>Thank you for registering ! {{  $name }} {{$email}}</h2>
<div class="image">
<img class="img-icon" src="{{ $message->embed(public_path('/images/mtics.jpg')) }}"/>
</div>
</div>
</body>
</html>