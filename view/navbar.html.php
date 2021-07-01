<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom:50px;">
  <div class="container-fluid">
    <img src="public/images/kikbook-logo.png" width="100" height="100" class="d-inline-block align-top logo-kik"
      alt="kikbook-logo">
    <img src="public/images/kikbook-nom.png" class="d-inline-block align-top nom-kik" alt="kikbook-logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center">
        <li class="nav-item nav-mobile">
          <a class="nav-link" href="<?= $path ?>/news">Accueil</a>
        </li>
        <li class="nav-item nav-mobile">
          <a class="nav-link" href="<?= $path ?>/profil">Mon profil</a>
        </li>
        <li class="nav-item nav-mobile">
          <a class="nav-link" href="<?= $path ?>/profil">Chat</a>
        </li>
        <li class="nav-item nav-mobile">
          <a style="color:red;" class="nav-link" href="<?= $path ?>/off">Déconnexion</a>
        </li>
      </ul>
      <ul class="ml-auto navbar-nav nav-ordinateur" style="margin-right:30px;">
        <li>
          <a href="<?= $path ?>/news" style="margin-right:20px;">
            <img src="public/images/house-fill.png" width="30" height="30" class="d-inline-block align-top"
              alt="kikbook-logo">
          </a>
        </li>
        <li>
          <a href="<?= $path ?>/profil" style="margin-right:20px;">
            <img src="public/images/person-square.png" width="30" height="30" class="d-inline-block align-top"
              alt="kikbook-logo">
          </a>
        </li>
        <li>
          <a href="<?= $path ?>/profil" style="margin-right:20px;">
            <img src="public/images/chat-left-text-fill.png" width="30" height="30" class="d-inline-block align-top"
              alt="kikbook-logo">
          </a>
        </li>
        <li>
          <a href="<?= $path ?>/off">
            <img src="public/images/x-square-fill.png" width="30" height="30" class="d-inline-block align-top"
              alt="kikbook-logo">
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
