<!-- PHP SECTION -->
<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

include 'config.php';
$msg = "";

if(Isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $confpw = mysqli_real_escape_string($conn, md5($_POST['confpw']));
    $code = mysqli_real_escape_string($conn, md5(rand()));

    if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0){
        $msg = "<div class='alert-box>{$email} - This email has already been used.</div>";
    } else {
        if($password === $confpw){
            $sql = "INSERT INTO users (name, email, user, password, code) VALUES ('{$name}', '{$email}', '{$user}', '{$password}', '{$code}')";
            $result = mysqli_query($conn, $sql);

            if($result){
                echo "<div style='display: none;'>";
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'zumbivirtual00@gmail.com';                                     //SMTP username
                    $mail->Password   = 'codingprogamming/king';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('zumbivirtual00@gmail.com');
                    $mail->addAddress($email);

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'no reply';
                    $mail->Body    = 'Here is the verification Link<b><a href="https://localhost/login/?verification='.$code.'">https://localhost/login/?verification='.$code.'</a> </b>';

                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                echo "</div>";
                $msg = "<div class='info-box'>Registration Complete, please verify your e-mail to validate</div>";
            } else {
                $msg = "<div class='alert-box'>Something went wrong</div>";
            }
        } else {
            $msg = "<div class='alert'>Password and Confirm Password do not match</div>";
        }
    }
}
?>

<!-- END PHP SECTION -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/components-style.css">
    <title>Login</title>
</head>
<body>
    <main>
        <div class="main-login">
            <div class="left-login">
                <h1>Ainda não tem conta?<br>Cadastre-se e participe conosco!!</h1>
                <img src="assets/negocios.svg" class="left-login-image" alt="negocios animaçao">
            </div>
            <div class="rigth-login">
                <div class="card-login active">
                    <h1>LOGIN</h1>
                   <div class="textfield">
                    <label for="usuario">Usuário</label>
                    <input type="text" name="usuario" placeholder="Usuário">
                   </div> 
                   <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="Senha">
                    </div>
                    <button class="btn-login">Fazer Login</button>
                    <div class="cadastro">
                        <p>Ainda não tem conta?<br>Cadastre-se e participe conosco!!</p>
                        <button class="open btn-cadastro">Cadastre-se</button>
                    </div>
                    <a href="index.html" class="return"><ion-icon name="arrow-back-circle-outline"></ion-icon></a>
                </div>
                <div class="registro">
                    <?php echo $msg ?>
                    <h1>Registro</h1>    
                    <form method="POST">              
                    <!-- REGISTER FORM -->
                        <div class="textfield">
                            <input type="text" name="name" placeholder="Nome Completo" value="<?php if (isset($_POST['submit'])) {echo $name;} ?>" required>
                        </div> 
                        <div class="textfield">
                            <input type="email" name="email" placeholder="E-mail" value="<?php if (isset($_POST['submit'])) {echo $email;} ?>"required>
                            <br>
                            <input type="text" name="user" placeholder="Nome De Usuário" value="<?php if (isset($_POST['submit'])) {echo $user;} ?>"required>
                            <br>
                            <input type="password" name="password" placeholder="Senha" required>
                            <br>
                            <input type="password" name="confpw" placeholder="Confirmar Senha" required>
                            <button name="submit" type="submit" class="btn-cadastro">Cadastrar-se</button>
                            <a class="fechar return"><ion-icon name="arrow-back-circle-outline"></ion-icon></a>
                    </form>
                    <!-- END REGISTER FORM -->
                </div> 
            </div>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        let regBtn = document.querySelector(".open");
        let regBtn2 = document.querySelector(".close");
        let registro = document.querySelector(".registro");
        let cadastro = document.querySelector(".card-login");
        let fechar = document.querySelector(".fechar");

        regBtn.addEventListener("click", () => {
            registro.classList.add("active");
            cadastro.classList.remove("active");
            fechar.classList.add("active");
        });

        fechar.addEventListener("click", () => {
            registro.classList.add("active");
            cadastro.classList.remove("active");
            fechar.classList.add("active");
        });

        regBtn2.addEventListener("click", () => {
            registro.classList.remove("active");
            cadastro.classList.add("active");
            fechar.classList.remove("active");
        });

        fechar.addEventListener("click", () => {
            registro.classList.remove("active");
            cadastro.classList.add("active");
            fechar.classList.remove("active");
        });

    </script>
</body>

</html>