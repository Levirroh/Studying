function salvarDados(){
    var nome = document.getElementById('nome').value;
    var email = document.getElementById('email').value;
    var senha = document.getElementById('senha').value;
    var idade = document.getElementById('idade').value;
    var cidade = document.getElementById('cidade').value;
    var Usuario = {
        nome: nome,
        email: email,
        senha: senha,
        idade: idade,
        cidade: cidade
    }
}

