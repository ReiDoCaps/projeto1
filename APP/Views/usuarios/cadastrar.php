<?php require APPROOT . '/app/Views/inc/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Cadastro</h3>
                    <form name="registerForm" action="<?php echo URLROOT; ?>/appControllers/usuarios/Usuarios.php" method="POST">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control <?php echo (!empty($dados['nome_erro'])) ? 'is-invalid' : ''; ?>" value="<?php echo isset($dados['nome']) ? $dados['nome'] : ''; ?>" required>
                            <span class="invalid-feedback"><?php echo isset($dados['nome_erro']) ? $dados['nome_erro'] : ''; ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control <?php echo (!empty($dados['email_erro'])) ? 'is-invalid' : ''; ?>" value="<?php echo isset($dados['email']) ? $dados['email'] : ''; ?>" required>
                            <span class="invalid-feedback"><?php echo isset($dados['email_erro']) ? $dados['email_erro'] : ''; ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Usuário</label>
                            <input type="text" name="username" id="username" class="form-control <?php echo (!empty($dados['username_erro'])) ? 'is-invalid' : ''; ?>" value="<?php echo isset($dados['username']) ? $dados['username'] : ''; ?>" required>
                            <span class="invalid-feedback"><?php echo isset($dados['username_erro']) ? $dados['username_erro'] : ''; ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" name="senha" id="senha" class="form-control <?php echo (!empty($dados['senha_erro'])) ? 'is-invalid' : ''; ?>" required>
                            <span class="invalid-feedback"><?php echo isset($dados['senha_erro']) ? $dados['senha_erro'] : ''; ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="confirmSenha" class="form-label">Confirmar Senha</label>
                            <input type="password" name="confirmSenha" id="confirmSenha" class="form-control <?php echo (!empty($dados['confirma_senha_erro'])) ? 'is-invalid' : ''; ?>" required>
                            <span class="invalid-feedback"><?php echo isset($dados['confirma_senha_erro']) ? $dados['confirma_senha_erro'] : ''; ?></span>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                        <div class="cadastrar">
                            <h4>Já tenho conta! <a href="<?php echo URLROOT; ?>/usuarios/login"> login</a>.</h4>
                        </div>
                        <input type="hidden" id="error" value="<?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?>">
                        <input type="hidden" id="error_field" value="<?php echo isset($_GET['error_field']) ? $_GET['error_field'] : ''; ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    window.onload = function() {
        const error = document.getElementById('error').value;
        const errorField = document.getElementById('error_field').value;

        if (error && errorField) {
            const field = document.getElementById(errorField);
            field.classList.add('is-invalid');
        }
    };
</script>
