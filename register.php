<!-- PHP SECTION -->
<?php
if(Isset($_POST['submit'])) {
    
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
                    <h1>Cadastro</h1>
                    <!-- REGISTER FORM -->
                    <form action="">
                        <div class="textfield">
                            <input type="text" name="nome completo" placeholder="Nome Completo">
                        </div> 
                        <div class="textfield">
                            <input type="password" name="e-mail" placeholder="E-mail">
                            <br>
                            <input type="password" name="nome de usuario" placeholder="Nome De Usuário">
                            <br>
                            <input type="password" name="senha" placeholder="Senha">
                            <br>
                            <input type="password" name="confirmar senha" placeholder="Confirmar Senha">
                            <button name="submit" type="submit" class="close btn-cadastro">Cadastrar-se</button>
                            <a class="fechar return"><ion-icon name="arrow-back-circle-outline"></ion-icon></a>
                        </div>
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