<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $_SESSION['foto'] ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nome'] ?></p>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview active">
          <a href="#"><i class="fa fa-lightbulb-o"></i><span>Projetos</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="projetos.php?p=listar">Listar</a></li>
            <li><a href="projetos.php">Cadastrar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i><span>Clientes</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="cliente.php?p=listar">Listar</a></li>
            <li><a href="cliente.php">Cadastrar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-file-o"></i><span>Relatórios</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"><i class="fa fa-file-text"></i><span>Cronograma Inicial</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="relatorio.php?r=cronograma&p=listar">Listar</a></li>
                  <li><a href="relatorio.php?r=cronograma&p=cadastrar">Cadastrar</a></li>
                </ul>
            </li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-file-o"></i><span>Faturas</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
              <li><a href="faturas.php?p=listar">Listar</a></li>
              <li><a href="faturas.php?p=cadastrar">Cadastrar</a></li>
            </ul>
        </li>
            
          </ul>
        </li>
        <li ><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>