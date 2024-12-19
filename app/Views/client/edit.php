<form method="POST" action="<?php echo site_url('client/update/' . $client["id"]) ?>">
  <?php echo view('client/form', ["client" => $client]) ?>
</form>