const API = 'http://localhost:8000/usuarios';
const form = document.getElementById('form');
const nomeInput = document.getElementById('nome');
const emailInput = document.getElementById('email');
const idadeInput = document.getElementById('idade');

form.addEventListener('submit', async e => {
    // pausa o envio do submit para controlarmos manualmente
    e.preventDefault();

    const payload = {
        nome: nomeInput.value,
        email: emailInput.value,
        idade: Number(idadeInput.value)
    };

    try {
        const res = await fetch(API, {
            method: 'POST',
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
        alert('Erro ao cadastrar: ' + err);
    }
});
