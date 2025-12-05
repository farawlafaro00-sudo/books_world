 <?php
    session_name("user");

    session_start();
    include("include/connect.php");



    $errors = isset($_SESSION['user_error']) ? $_SESSION['user_error'] : [];
    unset($_SESSION['user_error']);

    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1" />
     <link rel="icon" href="../admin/img/book.png">
     <title>Login - Library System</title>

     <!-- Google Font -->
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">

     <style>
         :root {
             --accent: #763f0c;

             --card-bg: rgba(255, 229, 200, 0.98);
             --text-light: #93650aff;
             --muted: #4e2901ff;
         }

         * {
             box-sizing: border-box
         }

         html,
         body {
             height: 100%;
             margin: 0;
             font-family: 'Montserrat', sans-serif;
             color: var(--text-light);
             -webkit-font-smoothing: antialiased;
             -moz-osx-font-smoothing: grayscale;
         }


         .bg {
             position: fixed;
             inset: 0;
             background-image: url('images/library.jpg');
             background-size: cover;
             background-position: center right;
             filter: brightness(0.55) saturate(0.95);
             z-index: -2;
         }


         .overlay {
             position: fixed;
             inset: 0;
             background: linear-gradient(90deg, rgba(2, 6, 10, 0.25) 0%, rgba(2, 6, 10, 0.65) 100%);
             z-index: -1;
         }

         .container {
             display: flex;
             align-items: center;
             justify-content: space-between;
             min-height: 100vh;
             padding: 40px;
             gap: 40px;
         }

         .hero {
             max-width: 55%;
             color: antiquewhite;
         }

         .welcome {
             font-size: 44px;
             font-weight: 700;
             line-height: 1.05;
             margin: 0 0 14px;
             letter-spacing: -0.5px;
             text-shadow: 0 4px 18px rgba(0, 0, 0, 0.5);
         }

         .sub {
             color: var(--muted);
             font-weight: 300;
             margin-top: 8px;
         }

         .card {
             width: 360px;
             background: var(--card-bg);
             border-radius: 12px;
             padding: 28px;
             box-shadow: 0 10px 30px rgba(54, 37, 1, 0.98);
             backdrop-filter: blur(6px);
             margin-right: 20%;
         }

         .card h2 {
             margin: 0 0 18px;
             font-weight: 700;
             text-align: center;
             letter-spacing: 0.4px;
             background-color: #763f0c;
             color: antiquewhite;
             border-radius: 50%;
         }

         .field {
             margin-bottom: 18px;
         }

         label {
             display: block;
             font-size: 15px;
             color: var(--muted);
             margin-bottom: 8px;
         }


         input[type="text"],
         input[type="email"],
         input[type="password"] {
             width: 100%;
             background: transparent;
             border: 0;
             border-bottom: 2px solid rgba(255, 255, 255, 0.12);
             padding: 10px 6px;
             color: var(--text-light);
             font-size: 15px;
             outline: none;
             transition: border-color 0.18s, box-shadow 0.18s;
         }

         input::placeholder {
             color: rgba(124, 53, 12, 1);
             font-size: small;
         }

         input:focus {
             border-bottom-color: var(--accent);
             box-shadow: 0 6px 18px rgba(23, 136, 184, 0.08);
         }

         .btn {
             display: inline-block;
             width: 100%;
             text-align: center;
             padding: 10px 14px;
             border-radius: 999px;
             background: linear-gradient(180deg, var(--accent), #c68a36ff);
             color: white;
             font-weight: 600;
             border: 0;
             cursor: pointer;
             box-shadow: 0 8px 18px rgba(23, 136, 184, 0.18);
             margin-top: 6px;
         }

         .small {
             font-size: 13px;
             color: var(--muted);
             text-align: center;
             margin-top: 14px;
         }

         .small a {
             color: var(--accent);
             text-decoration: none;
             font-weight: 600;
         }

         /* Responsive */
         @media (max-width:950px) {
             .container {
                 padding: 30px;
                 flex-direction: column;
                 align-items: flex-start;
             }

             .hero {
                 max-width: 100%;
                 margin-bottom: 20px;
             }

             .card {
                 width: 100%;
                 max-width: 420px;
             }
         }

         @media (max-width:520px) {
             .welcome {
                 font-size: 32px;
             }

             .card {
                 padding: 20px;
             }
         }
     </style>
 </head>

 <body>

     <div class="bg" aria-hidden="true"></div>
     <div class="overlay" aria-hidden="true"></div>

     <div class="container">

         <div class="hero">
             <h1 class="welcome">WELCOME <br><br> to the books_world<br><br>System 📙</h1>

         </div>


         <div class="card" role="main" aria-labelledby="loginTitle">
             <h2 id="loginTitle">Log in</h2>
             <br>

             <form action="function/log-in.php" method="post">
                 <div class="field">
                     <label for="username">Username</label>
                     <input id="username" name="username" type="text">
                 </div>
                 <?php if (isset($errors['username'])): ?>

                     <div style="color: black; margin-left:100px;"><?php echo $errors['username']; ?></div>
                 <?php endif; ?>

                 <div class="field">
                     <label for="email">email</label>
                     <input id="email" name="email" type="email">
                 </div>

                 <?php if (isset($errors['email'])): ?>

                     <div style="color: black; margin-left:100px;"><?php echo $errors['email']; ?></div>
                 <?php endif; ?>

                 <div class="field">
                     <label for="password">Password</label>
                     <input id="password" name="password" type="password">
                 </div>
                 <?php if (isset($errors['password'])): ?>

                     <div style="color: black; margin-left:100px;"><?php echo $errors['password']; ?></div>
                 <?php endif; ?>
                 
                

                 <?php if (isset($errors['login'])): ?>

                     <div style="color: black; margin-left:30%;"><?php echo $errors['login']; ?></div>
                 <?php endif; ?>
                 <br>

                 <button class="btn" type="submit" name="login">Log in »</button>

                 <p class="small">Don't have an account? <a href="register.php">Sign up now</a></p>
             </form>
         </div>
     </div>

 </body>

 </html>