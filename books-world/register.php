<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../admin/img/book.png">
    <title> Register</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            background: url('images/library.jpg') center/cover no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(3px);
        }

        .container {
            width: 380px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            color: #fff;
            text-align: center;
        }

        h2 {
            margin-bottom: 25px;
            font-size: 28px;
            font-weight: 600;
        }

        .input-field {
            width: 100%;
            margin: 15px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.6);
            padding-bottom: 10px;
        }

        .input-field input {
            width: 100%;
            padding: 8px 5px;
            border: none;
            background: transparent;
            outline: none;
            color: #fff;
            font-size: 15px;
        }

        .input-field input::placeholder {
            color: #ddd;
        }

        .terms {
            display: flex;
            align-items: center;
            margin: 15px 0;
            font-size: 14px;
        }

        .terms input {
            margin-right: 8px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: #fff;
            border: none;
            border-radius: 4px;
            color: #96490eff;
            font-size: 16px;
            cursor: pointer;
            font-weight: 600;
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #332004ff;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            opacity: 0.8;
        }
    </style>

</head>

<body>

    <div class="container">
        <h2> Register Now</h2>

        <form action="function/register.php" method="post">

            <div class="input-field">
                <input type="text" placeholder="Username" name="username">
            </div>

            <div class="input-field">
                <input type="email" placeholder="Email" name="email">
            </div>

            <div class="input-field">
                <input type="password" placeholder="Password" name="password">
            </div>

            <div class="input-field">
                <input type="text" placeholder="Address" name="address">
            </div>



            <a href=""><button class="btn" type="submit">REGISTER</button></a>
        </form>


    </div>

</body>

</html>