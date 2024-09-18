<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project TempChat by Latae, Powered by Thanpisit</title>
    <link rel="shortcut icon" href="https://i.imgflip.com/6ej3bl.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Kanit", system-ui;
            font-weight: 400;
            font-style: normal;
        }

        :root {
            --clr-m: #6495ED;
            --clr-m65: #6495ED65;
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

        .btn-main {
            display: block;
            padding: 10px 15px;
            border-radius: 12.5px;
            color: var(--clr-m);
            border: 2.5px solid var(--clr-m);
            background-color: var(--clr-m65);
            transition: all .35s ease;
        }

        .btn-main:hover {
            color: #f6f6f6;
            background-color: var(--clr-m);
        }

        .btn-main:disabled {
            cursor: not-allowed;
        }

        .text-main\/gra {
            background: -webkit-linear-gradient(90deg, #6F8FAF, var(--clr-m));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body>
    <main>
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="bg-white p-4 pb-5 shadow-sm border border-1 d-flex justify-content-center" style="min-width: 550px; max-width: calc(80% + 15px); border-radius: 20px;">
                <div class="col-12 col-sm-10">
                    <h2 class="text-main/gra mt-3 mb-5 text-center">แชทสำหรับใช้แล้วทิ้ง <span style="font-size: 12px;"><b>Powered by Thanpisit</b></span></h2>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="room" placeholder="123456" style="border-radius: 15px;">
                        <label for="room">Room</label>
                    </div>
                    <div class="form-floating mb-5">
                        <input type="text" class="form-control" id="user" placeholder="lnwza" style="border-radius: 15px;">
                        <label for="user">Username</label>
                    </div>
                    <button class="btn-main w-100" id="joinRoom"><b>เข้าร่วมห้องเลย&nbsp;<i class="fa-solid fa-arrow-right"></i></b></button>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.7.5/socket.io.js" integrity="sha512-luMnTJZ7oEchNDZAtQhgjomP1eZefnl82ruTH/3Oj/Yu5qYtwL7+dVRccACS/Snp1lFXq188XFipHKYE75IaQQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let room;
        let username;
        const socket = io("http://localhost:3000");

        const joinRoomBUTN = document.getElementById("joinRoom");

        joinRoomBUTN.addEventListener("click", (e) => {
            e.preventDefault();
            joinRoomBUTN.disabled = true;

            const RoomID = document.getElementById("room");
            const Username = document.getElementById("user");
            if (RoomID.value == '') {
                joinRoomBUTN.disabled = false;
                swalalert("warning", "กรุณาใส่ห้องที่จะเข้า", 1500);
            } else if (Username.value == '') {
                joinRoomBUTN.disabled = false;
                swalalert("warning", "กรุณาใส่ชื่อผู้ใช้งาน", 1500);
            } else {
                room = RoomID.value;
                username = Username.value;
                socket.emit("join", {
                    room: RoomID.value,
                    username: Username.value
                });
                swalalert("success", `สวัสดีไอโง่, ${username}`, 10000);
            }
        });

        function swalalert(icon, msg, timer) {
            Swal.fire({
                position: "center",
                icon,
                title: msg,
                showConfirmButton: false,
                timer
            });
        }
    </script>
</body>

</html>