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


              <!-- SEARCH FORM -->
              <form class="form-inline ml-0 ml-md-3" action="{{ route('account.search') }}" method="post">
                  @csrf
                  <div class="input-group input-group-sm">
                      <input class="form-control form-control-navbar" type="search" name="search" id="search"
                          placeholder="Buscar" required aria-label="Buscar">
                      <div class="input-group-append">
                          <button class="btn btn-navbar" type="submit">
                              <i class="fas fa-search"></i>
                          </button>
                      </div>
                  </div>
                  {{-- código de autocomplete na pesquisa --}}
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
                  <script type="text/javascript">
                      var route = "{{ url('searchSuggestion') }}";
                      $('#search').typeahead({
                          source: function(query, process) {
                              return $.get(route, {
                                  term: query
                              }, function(data) {
                                  return process(data);
                              });
                          }
                      });
                  </script>
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
