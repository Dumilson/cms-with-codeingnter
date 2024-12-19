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
<input type="hidden" name="id" value="<?= @$client['id'] ?>">
<div class="form-group mb-3">
  <label for="name">Nome</label>
  <input type="text" class="form-control <?= isset(session('errors')['name']) ? 'is-invalid' : '' ?>" id="name" name="name" value="<?= old('name') ?? @$client["name"] ?>" required>
  <?php if (is_array(session('errors')) && isset(session('errors')['name'])): ?>
    <div class="invalid-feedback">
      <?= session('errors')['name'] ?>
    </div>
  <?php endif; ?>
</div>
<div class="form-group mb-3">
  <label for="email">E-mail</label>
  <input type="email" class="form-control <?= isset(session('errors')['email']) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= old('email') ?? @$client["email"] ?>" required>
  <?php if (is_array(session('errors')) && isset(session('errors')['email'])): ?>
    <div class="invalid-feedback">
      <?= session('errors')['email'] ?>
    </div>
  <?php endif; ?>
</div>
<div class="form-group mb-3">
  <label for="phone">Telefone</label>
  <input type="text" class="form-control <?= isset(session('errors')['phone']) ? 'is-invalid' : '' ?>" id="phone" name="phone" value="<?= old('phone') ?? @$client["phone"] ?>" required>
  <?php if (is_array(session('errors')) && isset(session('errors')['phone'])): ?>
    <div class="invalid-feedback">
      <?= session('errors')['phone'] ?>
    </div>
  <?php endif; ?>
</div>
<div class="form-group mb-3">
  <label for="segment">Segmento</label>
  <select class="form-control <?= isset(session('errors')['segment_id']) ? 'is-invalid' : '' ?>" id="segment_id" name="segment_id" required>
    <option value="">Selecione um segmento</option>
    <?php foreach ($segments as $segment): ?>
      <option value="<?= $segment['id'] ?>" <?= (old('segment_id') ?? @$client["segment_id"]) == $segment['id'] ? 'selected' : '' ?>><?= $segment['name'] ?></option>
    <?php endforeach; ?>
  </select>
  <?php if (is_array(session('errors')) && isset(session('errors')['segment_id'])): ?>
    <div class="invalid-feedback">
      <?= session('errors')['segment_id'] ?>
    </div>
  <?php endif; ?>
</div>
<button type="submit" class="btn btn-primary w-100">Salvar</button>