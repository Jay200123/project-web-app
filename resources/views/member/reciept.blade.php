<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTICS Payment Receipt</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 0;
        }
        
        .receipt {
            border: 1px solid #ccc;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            text-align: left;
        }
        
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .header h1 {
            font-size: 28px;
            font-weight: bold;
            margin: 0;
        }
        
        .header h4 {
            font-size: 18px;
            margin: 0;
        }
        
        .content {
            text-align: left;
        }
        
        .title {
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
        }
        
        .name, .section, .date, .amount, .officer {
            font-size: 16px;
            margin: 10px 0;
        }
        
        .section {
            margin-bottom: 20px;
        }
        
        .officer {
            font-style: italic;
            margin-top: 30px;
        }

        .payment-amount {
            margin-top: 30px;
            padding: 10px;
            border: 1px solid #ccc;
            font-size: 18px;
            font-weight: bold;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
        }

        .university-address {
            margin-bottom: 20px;
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="receipt">

    <div class="university-address">
            <p>Manila Technician Institute Computer Society</p>
            <p>Tehnological University of the Philippines Taguig</p>
            <p> Km. 14, East Service Road, South Luzon Expressway, Taguig, 1630 Metro Manila</p>
            <p>(02) 8823 2456</p>
        </div>

        <div class="header">
            <h1>MTICS Payment Receipt</h1>
            <h4>Membership ID: {{$member_id}}</h4>
            <h4>Date Placed: {{$date_placed}}</h4>
            <p class="officer">Payment updated by: MTICS President {{Auth::user()->name}}</p>
        </div>
        <div class="content">
            <p class="title">Payment for {{$title}}</p>
            <p class="name">Student Name: {{$fname}} {{$lname}}</p>
            <p class="section">Section: {{$section}}</p>
            <p class="date">Date Paid: {{$date_paid}}</p>
            <p class="amount">Membership Amount: {{$amount}}</p>
            <p class="officer">Thank you for your payment, which has been updated by: {{Auth::user()->name}}</p>
        </div>
       
        <div class="payment-amount">
            Payment Amount: {{$amount}}
        </div>
        <footer>@2023 Manila Technician Institute Computer Society TUP Taguig All rights reserved.</footer>
    </div>
</body>
</html>
