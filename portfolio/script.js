document.getElementById('foto-perfil').addEventListener('click', function () {
    alert('Olá! Eu sou eu!');
});

let contadorLike = 0;
let contadorDislike = 0;

document.getElementById('like').addEventListener('click', function () {
    contadorLike++;
    document.getElementById('contador-like').textContent = contadorLike;
});

document.getElementById('dislike').addEventListener('click', function () {
    contadorDislike++;
    document.getElementById('contador-dislike').textContent = contadorDislike;
});

