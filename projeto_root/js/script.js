document.getElementById('userForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Previne o envio padrão
    const form = this;

    // Aqui, você pode fazer a requisição para process_form.php, por exemplo usando fetch
    fetch(form.action, {
        method: form.method,
        body: new FormData(form)
    })
        .then(response => response.text())
        .then(data => {
            // Supondo que você redirecione após o cadastro
            window.location.href = 'php/cadastrar.php'; // Redireciona para a página de cadastro
        })
        .catch(error => {
            console.error('Erro:', error);
        });

    form.reset(); // Limpa os campos do formulário
});
