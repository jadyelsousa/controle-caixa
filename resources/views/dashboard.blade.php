<x-app-layout>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> Bem vindo(a) <small>{{Auth::user()->name}}</small></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Layout</a></li>
                    <li class="breadcrumb-item active">Top Navigation</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </x-slot>
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
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
                                        <tr>
                                            <td>Conta tal</td>
                                            <td>12/12/2021</td>
                                            <td><span class="badge badge-info">A receber</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                    123,99
                                                </div>
                                            </td>
                                            <td>Fulano de tal</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#mdlExcluir" data-id=""
                                                class="nav-link float-right deleteContact">
                                                <i class="far fa-trash-alt"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#modal-lg-edit" data-contact=""
                                                class="nav-link float-right modalEdit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Conta tal</td>
                                            <td>12/12/2021</td>
                                            <td><span class="badge badge-warning">A pagar</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                    123,99
                                                </div>
                                            </td>
                                            <td>Fulano de tal</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#mdlExcluir" data-id=""
                                                class="nav-link float-right deleteContact">
                                                <i class="far fa-trash-alt"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#modal-lg-edit" data-contact=""
                                                class="nav-link float-right modalEdit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Conta tal</td>
                                            <td>12/12/2021</td>
                                            <td><span class="badge badge-info">A receber</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                    123,99
                                                </div>
                                            </td>
                                            <td>Fulano de tal</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#mdlExcluir" data-id=""
                                                class="nav-link float-right deleteContact">
                                                <i class="far fa-trash-alt"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#modal-lg-edit" data-contact=""
                                                class="nav-link float-right modalEdit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="{{route('account.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Nova conta</a>
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

</x-app-layout>
