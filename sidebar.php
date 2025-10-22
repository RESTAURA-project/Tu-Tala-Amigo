  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <div class="dropdown">
          <a href="./" class="brand-link">

              <?php if($_SESSION['login_type'] == 1): ?>
              <h3 class="text-center p-0 m-0"><b>ADMIN</b></h3>
              <?php else: ?>
              <h3 class="text-center p-0 m-0"><b>USER</b></h3>
              <?php endif; ?>

          </a>

      </div>
      <div class="sidebar pb-4 mb-4">
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item dropdown">
                      <a href="./" class="nav-link nav-home">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Inicio
                          </p>
                      </a>
                  </li>


                  <li class="nav-item">
                      <a href="#" class="nav-link nav-new_project tree-item">
                          <i class="nav-icon fas fa-solid fa-tree"></i>
                          <p>
                              Tala
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                      </ul>

                      <ul class="nav nav-treeview">
                          <!-- If para que este menú lo vean solo los usuarios que tienen permiso de admin, fenología o germinación+fenología -->
                          <?php if($_SESSION['login_type'] == 2 || $_SESSION['login_type'] == 1 || $_SESSION['login_type'] == 4): ?>
                          <li class="nav-item">
                              <a href="./index.php?page=mis_talas" class="nav-link nav-new_project tree-item">
                                  <i class="fas fa-angle-right nav-icon"></i>
                                  <p>Mis talas</p>
                              </a>
                          </li>
                          <?php endif; ?>
                      </ul>
                      <!-- If para que este menú lo vean solo los usuarios que tienen permiso de admin, germinación o germinación+fenología -->
                      <?php if($_SESSION['login_type'] == 3 || $_SESSION['login_type'] == 1 || $_SESSION['login_type'] == 4): ?>
                      <ul class="nav nav-treeview">

                          <li class="nav-item">
                              <a href="./index.php?page=germinacion_tala" class="nav-link nav-new_project tree-item">
                                  <i class="fas fa-angle-right nav-icon"></i>
                                  <p>Germinación</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <?php endif; ?>
                  <li class="nav-item">
                      <?php
					$qry = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM users order by concat(firstname,' ',lastname) asc");
					$row= $qry->fetch_assoc();
					?>

                      <a href="./index.php?page=editar_usuario&id=<?php echo $_SESSION['login_id'] ?>"
                          class="nav-link nav-edit_project nav-view_project">
                          <i class="nav-icon fas fa-database"></i>
                          <p>
                              Mis datos
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                  </li>


                  <?php if($_SESSION['login_type'] == 1): ?>
                  <li class="nav-item">
                      <a href="#" class="nav-link nav-edit_project nav-view_project">
                          <i class="nav-icon fas fa-layer-group"></i>
                          <p>
                              Administración
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item">
                              <a href="./index.php?page=nuevo_objetivo" class="nav-link nav-new_project tree-item">
                                  <i class="fas fa-angle-right nav-icon"></i>
                                  <p>Agregar Objetivo</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="./index.php?page=tipo_de_vivero" class="nav-link nav-project_list tree-item">
                                  <i class="fas fa-angle-right nav-icon"></i>
                                  <p>Agregar Tipo</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="./index.php?page=exportar_talas" class="nav-link nav-project_list tree-item">
                                  <i class="fas fa-angle-right nav-icon"></i>
                                  <p>Exportar Talas</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="./index.php?page=exportar_eventos_tala"
                                  class="nav-link nav-project_list tree-item">
                                  <i class="fas fa-angle-right nav-icon"></i>
                                  <p>Exportar eventos Talas</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="./index.php?page=exportar_germinacion"
                                  class="nav-link nav-project_list tree-item">
                                  <i class="fas fa-angle-right nav-icon"></i>
                                  <p>Exportar germinación</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="./index.php?page=exportar_usuarios" class="nav-link nav-project_list tree-item">
                                  <i class="fas fa-angle-right nav-icon"></i>
                                  <p>Exportar Usuarios</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="./index.php?page=exportar_sesiones" class="nav-link nav-project_list tree-item">
                                  <i class="fas fa-angle-right nav-icon"></i>
                                  <p>Inicios de sesión</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="./index.php?page=exportar_ultima_sesion"
                                  class="nav-link nav-project_list tree-item">
                                  <i class="fas fa-angle-right nav-icon"></i>
                                  <p>Último inicio de sesión</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="./index.php?page=exportar_usuarios_nunca_logeados"
                                  class="nav-link nav-project_list tree-item">
                                  <i class="fas fa-angle-right nav-icon"></i>
                                  <p>Nunca logeados</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link nav-edit_user">
                          <i class="nav-icon fas fa-users"></i>
                          <p>
                              Usuarios
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="./index.php?page=nuevo_usuario" class="nav-link nav-new_user tree-item">
                                  <i class="fas fa-angle-right nav-icon"></i>
                                  <p>Nuevo</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="./index.php?page=lista_de_usuarios" class="nav-link nav-user_list tree-item">
                                  <i class="fas fa-angle-right nav-icon"></i>
                                  <p>Lista</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <?php endif; ?>
              </ul>

          </nav>
      </div>
  </aside>
  <script>
$(document).ready(function() {
    var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
    var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
    if (s != '')
        page = page + '_' + s;
    if ($('.nav-link.nav-' + page).length > 0) {
        $('.nav-link.nav-' + page).addClass('active')
        if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
            $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
            $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
        }
        if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
            $('.nav-link.nav-' + page).parent().addClass('menu-open')
        }

    }

})
  </script>