<?php require APPROOT . '/app/Views/inc/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Login</h3>
                    <form action="<?php echo URLROOT; ?>/appControllers/usuarios/Usuarios.php" method="POST">
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
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="mt-3 text-center">
                            <h4>Não é cadastrado? <a href="<?php echo URLROOT; ?>/usuarios/cadastrar">Cadastrar-se</a>.</h4>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

