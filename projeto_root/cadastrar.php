<?php include 'php/header.php'; ?>

<body>

    <main class="container mt-5">
        <section class="form-wrapper">
            <h1 class="text-center mb-4">Cadastro de Usuário</h1>

            <form id="userForm" class="needs-validation" novalidate action="php/process_form.php" method="post">
                <fieldset>
                    <legend>Informações Pessoais</legend>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control input-custom" id="nome" name="nome"
                                placeholder="Digite seu nome completo" required>
                            <div class="invalid-feedback">Por favor, insira um nome válido.</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="nascimento" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control input-custom" id="nascimento" name="nascimento" required>
                            <div class="invalid-feedback">Por favor, insira uma data de nascimento válida.</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control input-custom" id="email" name="email"
                                placeholder="exemplo@dominio.com" required>
                            <div class="invalid-feedback">Por favor, insira um e-mail válido.</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="tel" class="form-control input-custom" id="telefone" name="telefone"
                                placeholder="(xx) xxxx-xxxx" required pattern="^\(\d{2}\) \d{4,5}-\d{4}$">
                            <div class="invalid-feedback">Por favor, insira um número de telefone válido.</div>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Endereço</legend>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="cep" class="form-label">CEP</label>
                            <input type="text" class="form-control input-custom" id="cep" name="cep"
                                placeholder="Digite seu CEP" required>
                            <button type="button" id="consultarCep" class="btn btn-primary btn-custom mt-2">Consultar</button>
                            <div class="invalid-feedback">Por favor, insira um CEP válido.</div>
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" class="form-control input-custom" id="endereco" name="endereco"
                                placeholder="Rua, Número" required>
                            <div class="invalid-feedback">Por favor, insira um endereço válido.</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input type="text" class="form-control input-custom" id="bairro" name="bairro"
                                placeholder="Bairro" required>
                            <div class="invalid-feedback">Por favor, insira um bairro válido.</div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="cidade" class="form-label">Cidade</label>
                            <input type="text" class="form-control input-custom" id="cidade" name="cidade"
                                placeholder="Cidade" required>
                            <div class="invalid-feedback">Por favor, insira uma cidade válida.</div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <select class="form-select input-custom" id="estado" name="estado" required>
                                <option value="" disabled selected>Selecione seu estado</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                            <div class="invalid-feedback">Por favor, selecione um estado válido.</div>
                        </div>
                        </select>
                        <div class="invalid-feedback">Por favor, selecione um estado válido.</div>
                    </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Documentos</legend>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control input-custom" id="cpf" name="cpf"
                                placeholder="Digite seu CPF" required>
                            <div class="invalid-feedback">Por favor, insira um CPF válido.</div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="rg" class="form-label">RG</label>
                            <input type="text" class="form-control input-custom" id="rg" name="rg"
                                placeholder="Digite seu RG" required>
                            <div class="invalid-feedback">Por favor, insira um RG válido.</div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control input-custom" id="senha" name="senha"
                                placeholder="Crie uma senha segura" required>
                            <div class="invalid-feedback">Por favor, insira uma senha válida.</div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="confirmaSenha" class="form-label">Confirme a Senha</label>
                            <input type="password" class="form-control input-custom" id="confirmaSenha"
                                name="confirma_senha" placeholder="Confirme sua senha" required>
                            <div class="invalid-feedback">As senhas devem coincidir.</div>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Outras Informações</legend>
                    <div class="mb-3">
                        <label for="assunto" class="form-label">Assunto</label>
                        <input type="text" class="form-control input-custom" id="assunto" name="assunto"
                            placeholder="Digite o assunto" required>
                        <div class="invalid-feedback">Por favor, insira um assunto válido.</div>
                    </div>

                    <div class="mb-3">
                        <label for="mensagem" class="form-label">Mensagem</label>
                        <textarea class="form-control input-custom" id="mensagem" name="mensagem" rows="4"
                            placeholder="Digite sua mensagem" required></textarea>
                        <div class="invalid-feedback">Por favor, insira uma mensagem válida.</div>
                    </div>
                </fieldset>

                <div class="text-end">
                    <a href="index.php" class="btn btn-outline-primary btn-custom">Voltar</a>
                    <button type="reset" class="btn btn-secondary btn-custom me-2">Limpar</button>
                    <button type="submit" class="btn btn-primary btn-custom">Cadastrar</button>
                </div>

                <footer class="bg-light text-center text-muted mt-4 py-3">
                    <p>&copy; <?= date('Y'); ?> Bryan & Gabriel Rodrigues. Todos os direitos reservados.</p>
                </footer>
            </form>
        </section>
    </main>

    <script src="js/masks.js"></script>
    <script src="js/main.js"></script>
    <script src="js/validation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>