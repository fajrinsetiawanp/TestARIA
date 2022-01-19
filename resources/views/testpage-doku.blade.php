<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <?php 
    // dd($data['shared_key']);
  ?>
  
  <form action="http://staging.doku.com/Suite/Receive" method="post" id="form1" name="form1">
    <input name="MALLID" type="hidden" value="{{ $data['mall_id'] }}" >
    <input name="BASKET" type="hidden" value="testing item,10000.00,1,10000.00" >
    <input name="CHAINMERCHANT" type="hidden" value="NA" >
    <input name="AMOUNT" type="hidden" value="{{ $data['amount'] }}" >
    <input name="PURCHASEAMOUNT" type="hidden" value="{{ $data['amount'] }}" >
    <input name="TRANSIDMERCHANT" type="hidden" value="{{ $data['trans_id'] }}" >
    <input name="WORDS" type="hidden" value="{{ $words}}" >
    <input name="CURRENCY" type="hidden" value="360" >
    <input name="PURCHASECURRENCY" type="hidden" value="360" >
    <input name="COUNTRY" type="hidden" value="ID" >
    <input name="SESSIONID" type="hidden" value="234asdf234" >
    <input name="REQUESTDATETIME" type="hidden" value="20151212000000" >
    <input name="NAME" type="hidden" value="Customer Name" >
    <input name="EMAIL" type="hidden" value="customer@domain.com">
    <input name="PAYMENTCHANNEL" type="hidden" value="15" >

    <button type="submit" class="btn btn-primary">submit</button>
  </form>
</div>

</body>
</html>
