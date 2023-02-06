<!-- PHP SECTION -->
<?php
include 'config.php';
$msg = "";

if(Isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confpw = mysqli_real_escape_string($conn, $_POST['confpw']);

    if($password === $confpw){

    } else {
        $msg = "<div class='alert'>Password and Confirm Password do not match</div>";
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
                    <div style="margin: 10px; word-wrap: break-word"><span class="alert" style="padding: 8px;
  background-color: #cc092f;
  font-weight: bold;
  border-radius: 10px;
  color: white;
  z-index: 99;
  ">Password and Confirm Password do not match</span></div>            
                    <!-- REGISTER FORM -->
                        <div class="textfield">
                            <input type="text" name="name" placeholder="Nome Completo">
                        </div> 
                        <div class="textfield">
                            <input type="email" name="email" placeholder="E-mail">
                            <br>
                            <input type="text" name="user" placeholder="Nome De Usuário">
                            <br>
                            <input type="password" name="password" placeholder="Senha">
                            <br>
                            <input type="password" name="confpw" placeholder="Confirmar Senha">
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