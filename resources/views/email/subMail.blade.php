<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; margin: 20px">
    
    <h1 style=" color:#35FFB0; display: flex; align-items: center;"> <img src="{{$message->embed(public_path().'/img/logo.png')}}" style="width: 4%; margin-right: 1%">EasyToCop</h1>
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; font-size: 20px; height: 80vh">
        <p>✅ Vous êtes abonné à notre service {{$sub->name}} à <span style="font-weight: bold">{{$sub->price}} €</span> /mois</p>
        <p>Merci {{$user->name}} 👍</p>
    
    </div>

</body>
</html>