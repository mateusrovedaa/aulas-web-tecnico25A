const API = 'http://localhost:8000/usuarios';

async function carregaLista() {
    try {
        const res = await fetch(API);
        const usuarios = await res.json();
        const tbody = document.getElementById('tabelabody');
        tbody.innerHTML = '';
        for (let i = 0; i < usuarios.length; i++) {
            const u = usuarios[i];
            const tr = document.createElement('tr');
            tr.innerHTML = `
            <td>${u.id}</td>
            <td>${u.nome}</td>
            <td>${u.email}</td>
            <td>
            <a href="edita.html?id=${u.id}">Editar</a> |
            <button onclick="excluir(${u.id})">Excluir</button>
            </td>`;
            tbody.appendChild(tr);
        }
    } catch (err) {
        alert('Erro ao carregar usuários: ' + err);
    }
}

async function excluir(id) {
    if (!confirm(`Confirma excluir usuário ${id}?`)) return;

    const res = await fetch(`${API}/${id}`, {
        method: 'DELETE'
    });

    if (res.status === 204) {
        carregaLista();
    } else {
        alert('Erro ao excluir');
    }
}

carregaLista();
