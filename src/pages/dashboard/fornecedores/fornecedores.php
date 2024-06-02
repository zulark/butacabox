<?php include ('../../login-funcionario/protect.php') ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Butacabox Dashboard</title>
  <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/2598/2598702.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="http://127.0.0.1/ButacaBox/ButacaBox/src/css/dashboard.css">
</head>


<body class="vh-100">
  <main class="d-flex flex-nowrap h-100">
    <?php
    include ('../../../../components/sidebarSmall.php');
    include ('../../../../components/sidebar.php');
    ?>
    <div class="container-fluid h-100">
      <div class="d-flex flex-column h-100">
        <div class="pt-3 pb-3 d-flex justify-content-between align-items-center">
          <div class="searchinput">
            <input id="searchInput" type="text" class="form-control" placeholder="Buscar filme">
          </div>
          <button id="mobileBtn" class="btn btn-dark d-flex d-md-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
            <span class="navbar-toggler-icon">
              <i class="bi bi-list text-white"></i>
            </span>
          </button>
        </div>
        <div class="table-responsive small flex-grow-1">
          <table class="table table-responsive table-lg">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col" class="text-center" style="width: 185px;">Ações</th>
              </tr>
            </thead>
            <tbody id="fornecedorTableBody">
            </tbody>
          </table>
        </div>
        <div class="p-3 text-end">
          <a href="fornecedoresCreate.php">
            <button class="btn btn-success ">Adicionar Fornecedor</button>
          </a>
        </div>
      </div>
    </div>
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmDeleteModalLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body label">
            Tem certeza de que deseja excluir este fornecedor?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn" style="background-color: #3ba6ff; color: #fff;"
              data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn" style="background-color: #d9534f; color: #fff;"
              id="confirmDeleteButton">Excluir</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="editFornecedorModal" tabindex="-1" aria-labelledby="editFornecedorModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editFornecedorModalLabel">Editar Fornecedor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editForm">
              <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
              </div>
              <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button style="background-color: #d9534f;" type="button" class="btn btn-sm text-white"
              data-bs-dismiss="modal">Cancelar</button>
            <button style="background-color: #3ba6ff;" type="submit" form="editForm" class="btn btn-sm text-white"
              id="saveChanges">Salvar Alterações</button>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <script src="../../../js/fornecedores.js"></script>
</body>

</html>