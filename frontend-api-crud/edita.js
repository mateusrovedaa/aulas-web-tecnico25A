const API = 'http://localhost:8000/usuarios';
// pega o ID através da URL
const queryString = new URLSearchParams(location.search);
const id = queryString.get('id');
const form = document.getElementById('form');
const idInput = document.getElementById('id');
const nomeInput = document.getElementById('nome');
const emailInput = document.getElementById('email');
const idadeInput = document.getElementById('idade');

async function carregaUsuario() {
    try {
        const res = await fetch(`${API}/${id}`);
        if (res.ok) {
            const u = await res.json();
            idInput.value = u.id;
            nomeInput.value = u.nome;
            emailInput.value = u.email;
            idadeInput.value = u.idade;
        } else {
            throw new Error('Usuário não encontrado');
        }
    } catch (err) {
        alert('Erro ao carregar: ' + err);
        location.href = 'index.html';
    }
}

form.addEventListener('submit', async e => {
    // pausa o envio do submit para controlarmos manualmente
    e.preventDefault();

    const payload = {
        nome: nomeInput.value,
        email: emailInput.value,
        idade: Number(idadeInput.value)
    };

    try {
        const res = await fetch(`${API}/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(payload)
        });
        
        if (res.ok) {
            window.location.href = 'index.html';
        } else {
            throw new Error(res.statusText);
        }
    } catch (err) {
        alert('Erro ao atualizar: ' + err);
    }
});

carregaUsuario();
