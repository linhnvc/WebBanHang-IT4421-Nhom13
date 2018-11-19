<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title><?php $title;?></title>
    <meta http-equiv="Content-Type" content="text/html, charset=utf8">
    <style type="text/css">
        <!--
        h1 {
            font-family: Arial, sans-serif;
            font-size: 24pt;
            color: #08185A;
            font-weight: 100
        }

        h2.co {
            font-family: Arial, sans-serif;
            font-size: 24pt;
            color: #08185A;
            margin-top: 0.1em;
            margin-bottom: 0.1em;
            font-weight: 100
        }

        h3.co {
            font-family: Arial, sans-serif;
            font-size: 16pt;
            color: #000000;
            margin-top: 0.1em;
            margin-bottom: 0.1em;
            font-weight: 100
        }

        body {
            font-family: Verdana, Arial, sans-serif;
            font-size: 10pt;
            color: #08185A background-color : #FFFFFF
        }

        a:link {
            font-family: Verdana, Arial, sans-serif;
            font-size: 8pt;
            color: #08185A
        }

        a:visited {
            font-family: Verdana, Arial, sans-serif;
            font-size: 8pt;
            color: #08185A
        }

        a:hover {
            font-family: Verdana, Arial, sans-serif;
            font-size: 8pt;
            color: #FF0000
        }

        a:active {
            font-family: Verdana, Arial, sans-serif;
            font-size: 8pt;
            color: #FF0000
        }


        tr.title {
            height: 25px;
            background-color: #0074C4
        }

        td {
            font-family: Verdana, Arial, sans-serif;
            font-size: 8pt;
            color: #08185A
        }

        th {
            font-family: Verdana, Arial, sans-serif;
            font-size: 10pt;
            color: #08185A;
            font-weight: bold;
            background-color: #CED7EF;
            padding-top: 0.5em;
            padding-bottom: 0.5em
        }

        input {
            font-family: Verdana, Arial, sans-serif;
            font-size: 8pt;
            color: #08185A;
            background-color: #CED7EF;
            font-weight: bold
        }



        #background-image {
            font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-size: 12px;
            width: 80%;
            text-align: left;
            border-collapse: collapse;
            background: url("...") 330px 59px no-repeat;
            margin: 20px;
        }

        #background-image th {
            font-weight: normal;
            font-size: 14px;
            color: #339;
            padding: 12px;
        }

        #background-image td {
            color: #669;
            border-top: 1px solid #fff;
            padding: 9px 12px;
        }

        #background-image tfoot td {
            font-size: 11px;
        }

        #background-image tbody td {
            background: url("./back.png");
        }

        * html
        #background-image tbody td {
            filter: progid : DXImageTransform.Microsoft.AlphaImageLoader ( src =
            'table-images/back.png', sizingMethod = 'crop' );
            background: none;
        }

        #background-image tbody tr:hover td {
            color: #339;
            background: none;
        }
        -->
    </style>

</head>
<body>


<!-- start branding table -->
<table width='100%' border='2' cellpadding='2' bgcolor='#0074C4'>
    <tr>
        <td bgcolor='#CED7EF' width='90%'>
            <h2 class='co'>&nbsp;Payment Client Example</h2>
        </td>
        <td bgcolor='#0074C4' align='center'>
            <h3 class='co'>OnePAY</h3>
        </td>
    </tr>
</table>
<!-- end branding table -->
<!-- End Branding Table -->
<center>
    <h1><?php echo $transStatus;?></h1>
</center>



<center>
    <table id="background-image" summary="Meeting Results">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Value</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td align="center" colspan="4"></td>
        </tr>
        </tfoot>
        <tbody>
        <tr>
            <td><strong><i>Merchant ID </i></strong></td>
            <td><?php
                echo $merchantID;
                ?></td>
            <td>Được cấp bởi OnePAY</td>
        </tr>
        <tr>
            <td><strong><i>Merchant Transaction Reference</i></strong></td>
            <td><?php
                echo $merchTxnRef;
                ?></td>
            <td>ID của giao dịch gửi từ website merchant</td>
        </tr>
        <tr>
            <td><strong><i>Transaction OrderInfo</i></strong></td>
            <td><?php
                echo $orderInfo;
                ?></td>
            <td>Tên hóa đơn</td>
        </tr>
        <tr>
            <td><strong><i>Purchase Amount</i></strong></td>
            <td><?php
                echo $amount / 100;
                ?></td>
            <td>Số tiền được thanh toán</td>
        </tr>

        <tr>
            <td><strong><i>VPC Transaction Response Code </i></strong></td>
            <td><?php
                echo $txnResponseCode;
                ?></td>
            <td>Mã trạng thái giao dịch trả về</td>
        </tr>
        <tr>
            <td><strong><i>Transaction Response Code Description </i></strong></td>
            <td><?php echo $txnResponseDescription;
                ?></td>
            <td>Trạng thái giao dịch</td>
        </tr>
        <tr>
            <td><strong><i>Message</i></strong></td>
            <td><?php
                echo "message";
                ?></td>
            <td>Thông báo từ cổng thanh toán</td>
        </tr>
        <?php
        // only display the following fields if not an error condition
        if ($txnResponseCode != "7" && $txnResponseCode != "No Value Returned") {
        ?>
        <tr>
            <td><strong><i>Transaction Number</i></strong></td>
            <td><?php
                echo $transactionNo;
                ?></td>
            <td>ID giao dịch trên cổng thanh toán</td>
        </tr>
        <?php
            Session::forget('cart');
        ?>
        <a href="/"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
        <?php
        }
        ?>
        </tbody>
    </table>
    <script type="text/javascript" src="{{asset('js/checkout.js')}}"></script>
</center>
</body>
</html>