<div id="header" class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">

          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon icon-shield" style="font-size:30px; color:#3498db;"></span>
            </button>
            <a class="navbar-brand hidden-xs hidden-sm" href="../index.php"><span class="icon icon-file" style="font-size:18px; color:#3498db;"></span></a>
          </div>

          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="../index.php" class="smoothScroll">Início</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Atualizar<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="campus.php">Campus</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="unid_acad.php">Unidade Acadêmica</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="curso.php">Curso</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="instru_avaliacao.php">Instrumento de Avaliação</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="dimensoes.php">Dimensão</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="items.php">Item</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastrar<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="../cadastrar/campus.php">Campus</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="../cadastrar/unid_acad.php">Unidade Acadêmica</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="../cadastrar/curso.php">Curso</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="../cadastrar/instru_avaliacao.php">Instrumento de Avaliação</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="../cadastrar/dimensoes.php">Dimensão</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="../cadastrar/items.php">Item</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="../cadastrar/avaliacao.php">Avaliação</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Deletar<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="../deletar/campus.php">Campus</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="../deletar/unid_acad.php">Unidade Acadêmica</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="../deletar/curso.php">Curso</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="../deletar/instru_avaliacao.php">Instrumento de Avaliação</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="../deletar/dimensoes.php">Dimensão</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="../deletar/items.php">Items</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consultar<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="../consulta.php">Avaliação</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="left:450px">Olá, <?php echo $_SESSION['adm']; ?><span class="caret"></span>
                </a>
                <ul style="left:450px" class="dropdown-menu">
                  <li><a href="../sair.php">Sair</a></li>
                </ul>
              </li>
            </ul>

          </div><!--/.nav-collapse -->
        
        </div>
      </div>