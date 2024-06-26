var employees = [];

function fetchEmployees() {
    fetch('../../../api/funcionarios/getEmployee.php')
        .then(response => response.json())
        .then(data => {
            employees = data;
            displayEmployees(employees);
        })
        .catch(error => console.error(error));
}

function displayEmployees(employees) {
    var tableBody = document.getElementById('employeeTableBody');
    tableBody.innerHTML = '';
    employees.forEach(function (employee) {
        var row = document.createElement('tr');
        row.innerHTML =
            `<td>${employee.id_funcionario}</td>
         <td>${employee.nome}</td>
         <td>${employee.email}</td>
         <td>${employee.nome_setor}</td>
         <td>${employee.nome_filial}</td>
         <td><strong>R$${employee.salario_base}</strong></td>
         <td class="d-flex">
             <button style="background-color: #3ba6ff;" class="btn btn-sm w-50 text-white" id="editButton" onclick="editEmployee(${employee.id_funcionario})">Editar</button>
             <button style="background-color: #d9534f;" class="btn btn-sm w-50 text-white" onclick="deleteEmployee(${employee.id_funcionario})">Deletar</button>
         </td>`;
        tableBody.appendChild(row);
    });
}

function searchEmployees() {
    var searchValue = document.getElementById('searchInput').value.trim().toLowerCase();
    if (searchValue !== '') {
        var filteredEmployees = employees.filter(function (employee) {
            return employee.id_funcionario.toString().indexOf(searchValue) !== -1 || employee.nome.toLowerCase().includes(searchValue)
                || employee.email.toLowerCase().includes(searchValue) || employee.nome_setor.toLowerCase().includes(searchValue);
        });
        displayEmployees(filteredEmployees);
    } else {
        displayEmployees(employees);
    }
}

document.getElementById('searchInput').addEventListener('input', searchEmployees);
fetchEmployees();

var editModal = new bootstrap.Modal(document.getElementById('editEmployeeModal'));
document.getElementById('saveChanges').addEventListener('click', function (event) {
    event.preventDefault();
    var id = document.getElementById('editEmployeeModalLabel').innerText.split(":")[1].trim();
    saveEmployeeChanges(id);
    editModal.hide();
});

function editEmployee(id) {
    fetch(`../../../api/funcionarios/getEmployee.php?id=${id}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Erro HTTP! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            document.getElementById("nome").value = data.nome;
            document.getElementById("email").value = data.email;
            document.getElementById("filial_id").value = data.filial_id;
            document.getElementById("setor_id").value = data.setor_id;
            document.getElementById("salario_base").value = data.salario_base;
            editModal.show();
        })
        .catch(error => {
            console.error('Erro:', error);
        });

    const modalLabel = document.getElementById('editEmployeeModalLabel');
    modalLabel.innerText = `Editar funcionário: ${id}`;
}

function saveEmployeeChanges(id) {
    var nome = document.getElementById('nome').value;
    var email = document.getElementById('email').value;
    var salario_base = document.getElementById('salario_base').value;
    var filial_id = document.getElementById('filial_id').value;
    var setor_id = document.getElementById('setor_id').value;
    var employeeData = {
        nome: nome,
        email: email,
        filial_id: filial_id,
        setor_id: setor_id,
        salario_base: salario_base
    };

    fetch(`../../../api/funcionarios/updateEmployee.php?id=${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(employeeData)
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Erro HTTP! status: ${response.status}`);
            }
            fetchEmployees();
        })
        .catch(error => {
            console.error('Erro ao salvar alterações do funcionário:', error);
            alert('Erro ao salvar alterações do funcionário: ' + error.message);
        });
}

function deleteEmployee(id) {
    var confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
    const modalLabel = document.getElementById('confirmDeleteModalLabel');
    modalLabel.innerText = `Excluir funcionário: ${id}?`;
    confirmDeleteModal.show();

    const confirmButton = document.getElementById('confirmDeleteButton');
    const newButton = confirmButton.cloneNode(true);
    confirmButton.parentNode.replaceChild(newButton, confirmButton);

    newButton.addEventListener('click', function () {
        fetch(`../../../api/funcionarios/deleteEmployee.php?id=${id}`, {
            method: 'DELETE'
        })
            .then(response => {
                if (response.ok) {
                    fetchEmployees();
                } else {
                    throw new Error(`Erro HTTP! status: ${response.status}`);
                }
            })
            .catch(error => {
                console.error('Erro ao excluir funcionário:', error);
                alert('Erro ao excluir funcionário: ' + error.message);
            });
        confirmDeleteModal.hide();
    });
}

function fetchSetor() {
    fetch('http://127.0.0.1/ButacaBox/ButacaBox/src/api/setores/getSetor.php')
        .then(response => response.json())
        .then(data => {
            const selectSetor = document.getElementById('setor_id');
            data.forEach(setor => {
                const option = document.createElement('option');
                option.value = setor.id_setor;
                option.textContent = setor.nome;
                selectSetor.appendChild(option)
            });
        })
        .catch(error => console.error(error))
}
fetchSetor();