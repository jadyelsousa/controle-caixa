  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
          <a href="{{ route('login') }}" class="navbar-brand">
              <span class="brand-text font-weight-light">Controle de contas</span>
          </a>

          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
              aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse order-3" id="navbarCollapse">
              <!-- Left navbar links -->
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a href="index3.html" class="nav-link">Home</a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">Contact</a>
                  </li>
              </ul>

              <!-- SEARCH FORM -->
              <form class="form-inline ml-0 ml-md-3">
                  <div class="input-group input-group-sm">
                      <input class="form-control form-control-navbar" type="search" placeholder="Search"
                          aria-label="Search">
                      <div class="input-group-append">
                          <button class="btn btn-navbar" type="submit">
                              <i class="fas fa-search"></i>
                          </button>
                      </div>
                  </div>
              </form>
          </div>

          <!-- Right navbar links -->
          <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

              <li class="nav-item">
                  <form method="POST" action="{{ route('logout') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <button type="submit" class="nav-link border-transparent"
                          style=" background-color: transparent !important; margin-top: -2px;" onclick="event.preventDefault();
                          this.disabled=true;
                          this.value='Enviando';
                          this.closest('form').submit(); "><i class="fas fa-sign-out-alt"></i>
                          <span class="d-none d-md-inline">Sair</span>



                      </button>
                  </form>
              </li>
          </ul>
      </div>
  </nav>
  <!-- /.navbar -->
