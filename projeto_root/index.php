<?php include 'php/header.php'; ?>

<head>
    <link rel="stylesheet" href="../projeto_root/css/styles_2.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Bem-vindo ao Site</h1>

        <p class="mt-3">Cadastre-se ou faça login para continuar</p>

        <div class="mt-5">
            <button onclick="window.location.href='cadastrar.php'" class="btn btn-primary btn-lg">
                Cadastrar
            </button>

            <span style="display: inline-block; width: 20px;"></span>

            <button onclick="window.location.href='login.php'" class="btn btn-secondary btn-lg">
                Login
            </button>
        </div>

        <div class="text-center mt-4">
            <span>&copy; 2024 Root_Project. Todos os direitos reservados.</span>
        </div>
    </div>
</body>
<?php if (isset($_GET['error']) && $_GET['error'] == 'login_failed'): ?>
    <div class="alert alert-danger text-center" role="alert">
        E-mail ou senha inválidos!
    </div>
<?php endif; ?>

</html>