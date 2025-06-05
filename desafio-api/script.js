async function buscaPokemon(){

    const pokemonBusca = document.getElementById("buscar");
    const pokemon = pokemonBusca.value;
    const resultado = await fetch("https://pokeapi.co/api/v2/pokemon/" + pokemon);
    const pokemonAPI = await resultado.json();
    console.log(pokemonAPI);

    const resultadoDiv = document.getElementById("resultado");
    resultadoDiv.innerHTML = "<img src='"+ pokemonAPI.sprites.back_default +"'>";
    resultadoDiv.innerHTML += `<img src='${pokemonAPI.sprites.front_default}'>`;
    resultadoDiv.innerHTML += `<audio src="${pokemonAPI.cries.latest}" autoplay>`
}