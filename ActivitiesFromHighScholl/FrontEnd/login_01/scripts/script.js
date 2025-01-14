function adquirirDados(){ //adquirindo dados digitados
    var nomeUsuario = document.getElementById('nome').value;
    var senhaUsuario = document.getElementById('senha').value;
    return new Usuario(nomeUsuario , senhaUsuario);
}

// identificando valores de login
function Usuario(nomeUsuario, senhaUsuario) { 
    this.nome =  nomeUsuario,
    this.senha = senhaUsuario
}

const usuario1 = new Usuario("johann","senha123");

var totalUsuarios = [usuario1];

console.log(totalUsuarios);

function checkUsuario(nomeUsuario){
    for (let i = 0; i < totalUsuarios.length; i++) {
        if (nomeUsuario === totalUsuarios[i].nome) {
            console.log("nome");
            return true;
        } 
    }
    console.log(nomeUsuario);
    console.log("não nome");
    return false;
}


function checkPassword(senhaUsuario){
    for (let i = 0; i < totalUsuarios.length; i++) {
        if (senhaUsuario == totalUsuarios[i].senha) {
            console.log("senha");
            return true;
        } 
    }
    console.log("não senha");
    return false;
}

// caso o usuario for real ele permite a troca de tela
function entrar(){
    Usuario = adquirirDados();
    nomeUsuario = document.getElementById('nome').value;
    localStorage.setItem('nome', Usuario.nome); 
    senhaUsuario = document.getElementById('senha').value;
    localStorage.setItem('senha', Usuario.senha); 
    if (checkUsuario(Usuario.nome) == false) {
        window.location.href = "index.html";
        return false;
    }
    if (checkPassword(Usuario.senha) == false) {
        window.location.href = "index.html";
        return false;
    }
    window.location.href = "tela_oi.html";
}


if (document.URL.includes("tela_oi.html")) {
    let nomeUsuario = localStorage.getItem('nome');
    document.getElementById("nome_usuario").textContent = nomeUsuario;
    let senhaUsuario = localStorage.getItem('senha');
    document.getElementById("senha_usuario").textContent = senhaUsuario;
}

