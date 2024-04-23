<?php
include ('../../../pages/login-funcionario/protect.php')
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ButacaBox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/2598/2598702.png">
    <link rel="stylesheet" href="http://127.0.0.1/ButacaBox/ButacaBox/src/css/dashboard.css">
</head>

<body class="vh-100">
    <main class="d-flex flex-nowrap h-100">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark sidebar">
            <a href="../../../index.php"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="navbar-brand-logo">
                    <img src="https://cdn-icons-png.flaticon.com/512/2598/2598702.png" alt="">
                </span>
                <strong style="font-size: .8em;">BUTACABOX</strong>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="../dashboard.php" class="nav-link text-white" aria-current="page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-camera-reels" viewBox="0 0 16 16">
                            <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0M1 3a2 2 0 1 0 4 0 2 2 0 0 0-4 0" />
                            <path
                                d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2zm6 8.73V7.27l-3.5 1.555v4.35zM1 8v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1" />
                            <path d="M9 6a3 3 0 1 0 0-6 3 3 0 0 0 0 6M7 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                        </svg>
                        Filmes
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-clipboard-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zm-5 0A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5zm-2 0h1v1A2.5 2.5 0 0 0 6.5 5h3A2.5 2.5 0 0 0 12 2.5v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2" />
                        </svg>
                        Funcionarios
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://cdn-icons-png.flaticon.com/512/5556/5556468.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong><?php echo $_SESSION['nome']; ?></strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="http://127.0.0.1/butacabox/butacabox/src/pages/login-funcionario/logout.php">
                            Encerrar Sessão
                        </a></li>
                </ul>
            </div>
        </div>
        <div class="container-fluid h-100">
            <div class="d-flex flex-column h-100 d-flex align-items-center justify-content-center">
                <div class="p-3">
                    <form id="createForm" class="row g-3">
                        <div class="col-md-12">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome">
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="col-md-12">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha">
                        </div>
                        <div class="col-md-12">
                            <label for="filial_id" class="form-label ">Filial</label>
                            <select class="form-select form-select-md" name="filial_id" id="filial_id">
                                <option selected disabled class="disabled">Selecionar filial</option>
                                <option value="1">Matriz</option>
                                <option value="2">Tarumã</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                    <div class="p-3 text-end">
                        <a href="funcionarios.php">
                            <button class="btn btn-primary">
                                <svg style="color: #fff;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="24" height="24" fill="currentColor">
                                    <path fill="none" d="M0 0h24v24H0V0z" />
                                    <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z" />
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="alert-message d-none" id="alertMessage"></div>
                <div id="errorMessage" class="alert alert-danger d-none" role="alert"></div>

            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('createForm').reset();
        });

        document.getElementById('createForm').addEventListener('submit', function (event) {
            event.preventDefault();

            var formData = {
                nome: document.getElementById('nome').value,
                email: document.getElementById('email').value,
                senha: document.getElementById('senha').value,
                filial_id: document.getElementById('filial_id').value,
            };

            var jsonData = JSON.stringify(formData);

            fetch('http://localhost/ButacaBox/ButacaBox/src/api/funcionarios/createEmployee.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: jsonData
            })
                .then(response => response.json())
                .then(data => {
                    var alertMessage = document.getElementById('alertMessage');
                    alertMessage.innerHTML = data.success ? '<div class="alert alert-success" role="alert">Funcionario adicionado com sucesso!</div>' : '<div class="alert alert-danger" role="alert">Erro ao adicionar funcionario!</div>';
                    alertMessage.classList.remove('d-none');
                    if (data.success) {
                        setTimeout(() => {
                            document.getElementById('createForm').reset();
                        }, 500);
                    } else {
                        setTimeout(() => {
                            alertMessage.classList.add('d-none');
                        }, 3000);
                    }
                })
                .catch(error => {
                    var errorMessage = document.getElementById('errorMessage');
                    errorMessage.innerHTML = 'Erro ao salvar: verifique os campos e tente novamente';
                    errorMessage.classList.remove('d-none');
                    setTimeout(() => {
                        errorMessage.classList.add('d-none');
                    }, 5000);
                });
        });
    </script>

    <!-- Bootstrap JS files -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

</body>

</html>