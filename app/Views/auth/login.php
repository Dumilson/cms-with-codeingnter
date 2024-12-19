  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 400px;">
      <h4 class="text-center mb-4">Login</h4>
      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
          <?= session()->getFlashdata('error') ?>
        </div>
      <?php endif; ?>

      <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
          <?= $validation->listErrors() ?>
        </div>
      <?php endif; ?>
      <form method="POST" action="<?= base_url('/auth/login') ?>">
        <div class="form-group mb-3">
          <label for="email">E-mail</label>
          <input autofocus type="email" class="form-control <?= isset(session('errors')['email']) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= old('email') ?>" required>
          <?php if (is_array(session('errors')) && isset(session('errors')['email'])): ?>
            <div class="invalid-feedback">
              <?= session('errors')['email'] ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="form-group mb-3">
          <label for="password_hash">Senha</label>
          <input type="password" class="form-control <?= isset(session('errors')['password_hash']) ? 'is-invalid' : '' ?>" id="password_hash" name="password_hash" required>
          <?php if (is_array(session('errors')) && isset(session('errors')['password_hash'])): ?>
            <div class="invalid-feedback">
              <?= session('errors')['password_hash']; ?>
            </div>
          <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
      </form>
    </div>
  </div>