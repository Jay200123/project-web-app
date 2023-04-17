<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
</head>
<style>

.university-address {
    margin-bottom: 20px;
    text-align: center;
}


footer{
    margin-top: 20px;
    text-align: center;
    font-size: 12px;
}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 10px;
}
th, td {
  padding: 5px;
  text-align: left;
}

.test{
width:100%;
}
</style>
<body>

<div class="university-address">
            <p>Manila Technician Institute Computer Society</p>
            <p>Technological University of the Philippines Taguig</p>
            <p>Km. 14, East Service Road, South Luzon Expressway, Taguig, 1630 Metro Manila</p>
            <p>(02) 8823 2456</p>
</div>
<h1 style="text-align:center">Transaction Reports</h1>

<h3>Total for All Orders</h3>
<table class="test">
<tr>
    <th>Orders</th>
    <th>Quantity</th>
    <th>Cost</th>
  </tr>

  <tr>
    <th>MTICS ID Lace</th>
    <td>{{$lace->quantity}}</td>
    <td> {{$lace->total}}</td>
  </tr>

  <tr>
    <th>Tech Shirt (Size Small):</th>
    <td>{{$small->quantity}}</td>
    <td>{{$small->total}}</td>
  </tr>

  <tr>
    <th>Tech Shirt (Size Medium):</th>
    <td>{{$medium->quantity}}</td>
    <td>{{$medium->total}}</td>
  </tr>

  <tr>
    <th>Tech Shirt (Size Large):</th>
    <td>{{$large->quantity}}</td>
    <td> {{$large->total}}</td>
  </tr>

</table>
<h3>Overall Total for Order Transactions</h3>
<table class="test">
<tr>
    <th>Process Orders:</th>
    <td> {{$process->total}}</td>
  </tr>

  <tr>
    <th>Finished Orders:</th>
    <td>  {{$finished->total}}</td>
  </tr>

</table>

<h3>Total for All Printing Service</h3>
<table class="test">

<tr>
    <th>Services</th>
    <th>Quantity</th>
    <th>Cost</th>
  </tr>

<tr>
    <th>Colored Printing Services:</th>
    <td>{{$colored->quantity}}</td>
    <td>{{$colored->total}}</td>
</tr>

  <tr>
    <th>Black and White Printing Services:</th>
    <td>{{$black->quantity}}</td>
    <td>{{$black->total}}</td>
  </tr>

  <tr>
    <th>Small Size Printing Service:</th>
    <td>{{$sml->quantity}}</td>
    <td>{{$sml->total}}</td>
  </tr>

  <tr>
    <th>Medium Size Printing Service:</th>
    @if($mdm && $mdm->quantity)
    <td>{{$mdm->quantity}}</td>
    <td>{{$mdm->total}}</td>
    @else
    <td>No Data</td>
    <td>No Data</td>
    @endif
  </tr>

  <tr>
    <th>Large Size Printing Service:</th>
    <td>{{$lrg->quantity}}</td>
    <td>{{$lrg->total}}</td>
  </tr>

  <tr>
    <th>A4 Size Printing Service:</th>
    <td>{{$a4->quantity}}</td>
    <td>{{$a4->total}}</td>
  </tr>
</table>

<h3>Service Overall Total</h3>
<table class="center">
<tr>
    <th>Total</th>
    <td>{{$print->total}}</td>
  </tr>
</table>

<h3>Total for All Membership Transactions</h3>
<table class="test">
  <tr>
    <th>Unpaid Memberships:</th>
    <td>{{$unpaid->total}}</td>
  </tr>

  <tr>
    <th>Paid Memberships:</th>
    <td>{{$paid->total}}</td>
  </tr>

  <tr>
    <th> Total:</th>
    <td>{{$member->total}}</td>
  </tr>

</table>

<h3>Total for Overall Transactions of MTICS TUP-Taguig</h3>
<table class="test">
  <tr>
    <th> On Process Transactions:</th>
    <td>{{$total[1]}}</td>
  </tr>

  <tr>
    <th>Finished Transactions:</th>
    <td> {{$total[0]}}</td>
  </tr>

</table>
<footer>&copy;2023 Manila Technician Institute Computer Society TUP Taguig. All Rights Reserved.</footer>
</body>
</html>