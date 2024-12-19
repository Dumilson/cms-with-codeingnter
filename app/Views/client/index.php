<?php echo anchor('client/create', 'Novo Cliente', "class='btn btn-success mb-3'") ?>
<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
  </div>
<?php endif; ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Nome</th>
      <th>E-mail</th>
      <th>Telefone</th>
      <th>Segmento</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($clients as $client): ?>
      <tr>
        <td><?= @$client['name']  ?></td>
        <td><?= @$client['email']   ?></td>
        <td><?= @$client['phone'] ?></td>
        <td><?= @$client['segment_name'] ?></td>
        <td>
            <?= anchor('client/edit/' . @$client['id'], 'Editar', "class='btn btn-sm btn-warning'") ?>
            <?= anchor('client/delete/' . @$client['id'], 'Excluir', "class='btn btn-sm btn-danger'") ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>