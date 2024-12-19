<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <?php echo anchor('dashboard', 'Dashboard', "class='nav-link active'") ?>
        </li>
        <li class="nav-item">
          <?php echo anchor('client', 'Clientes', "class='nav-link'") ?>
        </li>
        <li class="nav-item">
          <?php echo anchor('auth/logout', 'Terminar Sessão', "class='nav-link'") ?>
        </li>
      </ul>
      </ul>
    </div>
  </div>
</nav>