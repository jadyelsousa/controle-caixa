<x-app-layout>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> Cadastro de conta</h1>
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
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">

                        <form action="" method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="conta">Conta</label>
                                            <input type="text" class="form-control" id="conta" name="conta">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <select class="form-control select2" style="width: 100%;">
                                                <option selected="selected">Selecione</option>
                                                <option>A pagar</option>
                                                <option>a receber</option>

                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="data">Data de vencimento</label>
                                            <div class="input-group date" data-target-input="nearest">
                                                <input type="date" id="data" name="data"
                                                    class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                                                <div class="input-group-append" data-target="#reservationdatetime"
                                                    data-toggle="datetimepicker">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
{{--
                                <h5>Custom Color Variants</h5> --}}
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Fornecedor/Cliente</label>
                                            <input type="text" class="form-control" placeholder="Enter ...">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>CPF/CNPJ</label>
                                            <input type="text" class="form-control" placeholder="Enter ...">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Valor</label>
                                            <input type="text" class="form-control" placeholder="Enter ...">
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

</x-app-layout>
