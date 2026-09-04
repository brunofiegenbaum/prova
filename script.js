

const titulo = document.getElementById("titulo");
const nome = document.getElementById("nome");
const mensagem = document.getElementById("mensagem");
const hobby = document.getElementById("hobby");
const botaoPremio = document.querySelector("#premio");








function boasVindas() {

    alert("Você ganhou uma marea turbo!");

}



function mudarCorTitulo() {

    titulo.style.color = "#45d483";

}



document
    .getElementById("botaoBoasVindas")
    .addEventListener("click", boasVindas);

document
    .getElementById("botaoPremio")
    .addEventListener("click", botaoPremio);

document
    .getElementById("botaoCor")
    .addEventListener("click", mudarCorTitulo);


document
    .getElementById("botaoNome")
    .addEventListener("click", mostrarNome);


document
    .getElementById("botaoHobby")
    .addEventListener("click", mostrarHobby);



nome.addEventListener("keydown", function(evento) {

    if (evento.key === "Enter") {

        mostrarNome();

    }

});




for (let i = 0; i < hobbies.length; i++) {

    console.log("Hobby " + (i + 1) + ": " + hobbies[i]);

}