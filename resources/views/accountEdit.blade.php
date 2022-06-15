<x-app-layout>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> Edição de conta</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Edição</li>
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
                    <div class="card card-default">
                        <form id="cadForm" action="{{ route('account.update', $account->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <h5>Informações da conta</h5>

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="conta">Conta</label>
                                            <input type="text" class="form-control" id="conta" name="conta"
                                                value="{{ $account->descricao }}"
                                                placeholder="Breve descrição da conta">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <select name="tipo" id="tipo" class="form-control select2"
                                                style="width: 100%;">
                                                <option value="">Selecione</option>
                                                <option value="1" @if ($account->tipo == 1) selected @endif>A
                                                    pagar</option>
                                                <option value="2" @if ($account->tipo == 2) selected @endif>A
                                                    receber</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="data">Data de vencimento</label>
                                            <div class="input-group date" id="reservationdatetime"
                                                data-target-input="nearest">
                                                <input type="text" id="data" name="data"
                                                    value="{{ \Carbon\Carbon::parse($account->data)->format('d/m/Y') }}"
                                                    class="form-control datetimepicker-input"
                                                    data-target="#reservationdatetime" />
                                                <div class="input-group-append" data-target="#reservationdatetime"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Fornecedor/Cliente</label>
                                            <input type="text" class="form-control" name="fornecedor" id="fornecedor"
                                                value="{{ $account->razao_social }}"
                                                placeholder="Informe o Fornecedor ou Cliente">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>CPF/CNPJ</label>
                                            <input type="text" class="form-control cpf_cnpj" name="cpf_cnpj" id="cpf_cnpj" onblur="validaCpfCnpj(this.value)"
                                                value="{{ $account->cpf_cnpj }}" placeholder="Ex.:123.123.123-12">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Valor</label>
                                            <input type="text" name="valor" id="valor" class="form-control"
                                                value="{{ $account->valor }}"
                                                pattern="^[R$\-\s]*[\d\.]*?([\,]\d{0,2})?\s*$" placeholder="0,00">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Salvar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <script src="../../dist/js/EditValidation.js"></script>


</x-app-layout>
