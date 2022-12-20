<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Mail</title>
    <style>
        h1{
            background-color: grey;
            color: white;
        }
    </style>
 </head>
 <body>
    <div class="content">
        <header>
            <h3>$details['title']</h3>
        </header>
        <section class="cuerpoMail">
            <h1>{{ $details['body']->nombre }}</h1>
            <h2>{{ $details['body']->mail }}</h2>
            <h3>{{ $details['body']->telefono }}</h3>
            <p> {{ $details['body']->mensaje }}</p>
        </section>

    
    </div>
 </body>
 </html>