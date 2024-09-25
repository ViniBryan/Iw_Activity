// Validação personalizada para confirmar se as senhas coincidem
document.getElementById('userForm').addEventListener('submit', function (event) {
    var senha = document.getElementById('senha').value;
    var confirmaSenha = document.getElementById('confirmaSenha').value;

    // Verifica se as senhas são diferentes
    if (senha !== confirmaSenha) {
        event.preventDefault();  // Impede o envio do formulário se as senhas não coincidirem
        document.getElementById('confirmaSenha').classList.add('is-invalid');  // Adiciona a classe de erro visual
        confirmaSenha.setCustomValidity('As senhas não coincidem'); // Mensagem de erro
    } else {
        document.getElementById('confirmaSenha').classList.remove('is-invalid');  // Remove a classe de erro se as senhas forem iguais
    }
});
