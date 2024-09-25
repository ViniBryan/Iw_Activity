<?php include 'php/header.php'; ?>

<head>
    <link rel="stylesheet" href="../projeto_root/css/styles_3.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Acesso ao Sistema</h2>

        <!-- Exibe mensagem de erro, se existir -->
        <?php
        session_start();
        if (isset($_SESSION['error_message'])) {
            echo '<div class="alert alert-danger text-center">' . $_SESSION['error_message'] . '</div>';
            unset($_SESSION['error_message']);
        }
        ?>

        <form action="php/process_login.php" method="POST" class="mt-4 p-4" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
            <div class="form-group mb-4">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
            </div>

            <div class="form-group mb-4">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>

            <div class="form-check mb-4">
                <input type="checkbox" class="form-check-input" id="remember" name="remember" style="cursor: pointer;">
                <label class="form-check-label" for="remember">Lembrar de mim</label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <button type="button" onclick="window.location.href='index.php'" class="btn btn-secondary">Voltar</button>
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>

        <div class="text-center mt-4">
            <span>Ainda não tem uma conta?</span>
            <a href="cadastrar.php">Cadastre-se</a>
        </div>
    </div>
</body>

</html>