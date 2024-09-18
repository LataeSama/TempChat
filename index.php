<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Group By Gohung and Present by Latae</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --clr-m: #;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            width: 100%;
            height: 100vh;
            background-image: url('https://i.pinimg.com/originals/f0/25/57/f02557f1f0b160c3e06b86a7a38fe76d.jpg');
            background-position: center;
            background-size: cover;
            overflow: auto;
        }
    </style>
</head>

<body>
    <main>
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="bg-white p-3 shadow-sm border border-1" style="min-width: 550px; border-radius: 15px;">test</div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.7.5/socket.io.js" integrity="sha512-luMnTJZ7oEchNDZAtQhgjomP1eZefnl82ruTH/3Oj/Yu5qYtwL7+dVRccACS/Snp1lFXq188XFipHKYE75IaQQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let username;
        const socket = io("http://localhost:3000");

        socket.emit("join", {
            username: "test",
            room: "123456"
        });
    </script>
</body>

</html>