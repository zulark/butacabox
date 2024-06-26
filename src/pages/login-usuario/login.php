<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    header("Location: http://127.0.0.1/ButacaBox/ButacaBox/src/pages/index.php");
}

include ('../../api/db_connection.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {

    if (empty($_POST['email'])) {
        $errorMessage = "Preencha seu e-mail";
    } else if (empty($_POST['senha'])) {
        $errorMessage = "Preencha sua senha";
    } else {

        $email = $conn->real_escape_string($_POST['email']);
        $senha = $conn->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);

        if ($sql_query->num_rows == 1) {
            $usuario = $sql_query->fetch_assoc();
            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['id_usuario'] = $usuario['id_usuario'];
                $_SESSION['nome_usuario'] = $usuario['nome'];
                header("Location: http://127.0.0.1/ButacaBox/ButacaBox/src/pages/index.php");
                exit();
            } else {
                $errorMessage = "Falha ao logar! E-mail ou senha incorretos";
            }
        } else {
            $errorMessage = "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ButacaBox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/login.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>


<body>

    <style>
        body {
            background-image: url("https://www.shutterstock.com/image-photo/movie-theater-entrance-interior-blur-600nw-1819363976.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .login-wrap {
            border-radius: 10px;
        }
    </style>
    <div class="container-lg">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-8 col-lg-6">
                <div class="login-wrap p-5 p-md-5 text-bg-dark">
                    <div class="d-flex justify-content-center mb-4 navbar-brand-logo ">
                        <img src="https://cdn-icons-png.flaticon.com/512/2598/2598702.png" alt="" class="img-fluid">
                    </div>
                    <form action="" method="POST" class="signin-form">
                        <?php if (isset($errorMessage)): ?>
                            <div class="alert alert-danger text-center" role="alert">
                                <?php echo $errorMessage; ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-group mb-3">
                            <label class="label" for="name">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="password">Senha</label>
                            <input type="password" class="form-control" placeholder="Senha" name="senha">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-block submit w-100"
                                style="background-color: #fd8f32;">Entrar</button>
                        </div>
                        <div class="form-group d-flex">
                            <div class="w-50 text-start">
                                <a class="break" href="register.php">Não é cadastrado? Registre-se</a>
                            </div>
                            <div class="w-50 text-end">
                                <a class="break" href="#">Esqueci minha senha</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>

</body>

</html>