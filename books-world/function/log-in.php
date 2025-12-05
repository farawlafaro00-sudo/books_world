    <?php
    session_start();
    include("../include/connect.php");
    $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : '../index.php';



    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        

        if (empty($username)) {
            $errors["username"] = "username is required";
        }
        if (empty($email)) {
            $errors["email"] = "email is required";
        }
        if (empty($password)) {
            $errors["password"] = "Password is required";
        }
        

        if (empty($errors)) {
            
            $sel_buyer = "SELECT * FROM buyer WHERE name = :username AND email = :email AND  password = :password ";
            $res_buyer = $pdo->prepare($sel_buyer);

            // ربط القيم مع الاستعلام
            $res_buyer->bindParam(':username', $username);
            $res_buyer->bindParam(':email', $email);
            $res_buyer->bindParam(':password', $password);
           

            // تنفيذ الاستعلام
            $res_buyer->execute();

            // التحقق من النتيجة
            if ($res_buyer->rowCount() == 1) {
                $_SESSION["user"] = $username;
                header("Location: " . $redirect);
                exit();

                exit();
            } else {
                $errors["login"] = "Incorrect Data❌";
            }
        }


        $_SESSION['user_error'] = $errors;
        header("location:../login.php");
        exit();
    }


    ?>