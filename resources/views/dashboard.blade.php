<x-app-layout>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> Bem vindo(a) <small>{{ Auth::user()->name }}</small></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Listagem</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </x-slot>
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    @if (isset($query))
                        <h5>Exibindo resultados para: "{{ $query['search'] }}"</h5>
                    @endif
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Minhas contas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Data vencimento</th>
                                            <th>Tipo</th>
                                            <th>Valor</th>
                                            <th>Fornecedor/Cliente</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($accounts as $account)
                                            <tr>
                                                <td>{{ $account->descricao }}</td>
                                                <td>{{ \Carbon\Carbon::parse($account->data)->format('d/M/Y') }}
                                                    @if ($account->data < \Carbon\Carbon::now()->format('Y-m-d'))
                                                        <span class="badge badge-danger">Vencido</span>
                                                    @endif
                                                </td>
                                                @if ($account->tipo == 1)
                                                    <td><span class="badge badge-warning">A pagar</span></td>
                                                @else
                                                    <td><span class="badge badge-info">A receber</span></td>
                                                @endif
                                                <td>
                                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                        R$ {{ number_format($account->valor, 2, ',', '.') }}
                                                    </div>
                                                </td>
                                                <td>{{ $account->razao_social }}</td>
                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#mdlExcluir"
                                                        data-id="{{ $account->id }}"
                                                        class="nav-link float-right delete">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                    <a href="{{ route('account.edit', $account->id) }}"
                                                        class="nav-link float-right">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td>Nada ainda, comece adicionando contas.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <div class="float-left">
                                @if (isset($query))
                                    {{ $accounts->appends($query)->links() }}
                                @else
                                    {{ $accounts->links() }}
                                @endif
                            </div>
                            <a href="{{ route('account.create') }}" class="btn btn-primary float-right"><i
                                    class="fas fa-plus"></i> Nova conta</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    {{-- modal de exclusão de conta --}}

    <div class="modal" id="mdlExcluir" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <form class="needs-validation" action="{{ route('account.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="contact" id="id_account" class="recipient-name">
                        <br />
                        <span style="font-size: 30px; color: #595959"><b>Exclusão de conta</b></span><br />
                        <b style="font-size: 20px" class="text-danger">Tem certeza que deseja apagar essa
                            conta?</b><br><br>
                        <a style="min-width: 100px; margin-right: 20px" type="button" class="btn btn-default btn-tam"
                            data-dismiss="modal">Cancelar</a>
                        <button name="send" id="send" style="min-width: 100px" type='submit'
                            class='btn btn-danger btn-tam'>Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- fim do modal-->

    <script>
        // script para passar valor da conta para modal de exclusão

        $(document).on('click', '.delete', function() {
            var id = $(this).attr('data-id');
            // pega o id da conta ao clicar no botão, e adiciona ao input id_account
            $('#id_account').val(id);

            $('#mdlExcluir').modal('show');
        });
        x
    </script>

</x-app-layout>
