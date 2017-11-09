<!DOCTYPE html>
<html>
<head>
    <title></title>

</head>
<body>

@if(isset($newCustomProject))
    <span style="font-weight:700;font-size:16px;font-family: sans-serif;">NEW CUSTOM PROJECT</span>
    <br>
@endif
@if(isset($collectionItemTitle))
    <span style="font-weight:700;font-size:16px;font-family: sans-serif;">Collection Item Title :</span>    <span
            style="font-size:14px;"><i>{{$collectionItemTitle}}</i></span>
    <br>
@endif
@if(isset($collectionItemCode))
    <span style="font-weight:700;font-size:16px;font-family: sans-serif;">Collection Item Code :</span>    <span
            style="font-size:14px;"><i>{{$collectionItemCode}}</i></span>
    <br>
@endif
<span style="font-weight:700;font-size:16px;font-family: sans-serif;">Name :</span> <span
        style="font-size:14px;"><i>{{$name}}</i></span>
<br>
<span style="font-weight:700;font-size:16px;font-family: sans-serif;">Email : </span> <span
        style="font-size:14px;"><i>{{$email}}</i></span>
<br>
@if(isset($phone))
    <span style="font-weight:700;font-size:16px;font-family: sans-serif;">Phone : </span>    <span
            style="font-size:14px;"><i>{{$phone}}</i></span>
    <br>
@endif
<span style="font-weight:700;font-size:16px;font-family: sans-serif;">Country : </span> <span
        style="font-size:14px;"><i>{{$country}}</i></span>
<br>
@if(isset($customerType))
    <span style="font-weight:700;font-size:16px;font-family: sans-serif;">CUSTOMER TYPE : </span>    <span
            style="font-size:14px;"><i>{{$customerType}}</i></span>
    <br>
@endif
<span style="font-weight:700;font-size:16px;font-family: sans-serif;">MESSAGE & PROJECT DESCRIPTION: </span> <span
        style="font-size:14px;"><i>{{$messageBody}}</i></span>
</body>
<br>
<span style="font-weight:700;font-size:16px;font-family: sans-serif;">Attachemts : </span>  </body>
</html>

