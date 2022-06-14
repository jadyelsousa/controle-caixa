<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function index()
    {
        $accounts = Account::where('id_usuario',Auth::user()->id)->get();
        return view('dashboard',compact('accounts'));
    }


    public function create()
    {
        return view('accountCreate');
    }


    public function store(CreateRequest $request)
    {
        if ($request->data < now()) {
            return back()->withErrors([
                'Erro' => 'Data inválida!',
            ]);
        }

       $account = new Account();
       $account->descricao = $request->conta;
       $account->tipo = $request->tipo;
       $account->data = $request->data;
       $account->razao_social = $request->fornecedor;
       $account->cpf_cpnj = preg_replace("/[^0-9]/", "", $request->cpf_cnpj);
       $account->valor = preg_replace('/\D/', '.', $request->valor);
       $account->id_usuario = Auth::user()->id;
       $account->save();
       return redirect()->route('dashboard')->with('status', 'Conta cadastrada com sucesso!');

    }


    public function edit(Account $account)
    {
        return view('accountEdit',compact('account'));
    }


    public function update(CreateRequest $request, Account $account)
    {

       $account->descricao = $request->conta;
       $account->tipo = $request->tipo;
       $account->data = $request->data;
       $account->razao_social = $request->fornecedor;
       $account->cpf_cpnj = preg_replace("/[^0-9]/", "", $request->cpf_cnpj);
       $account->valor = preg_replace('/\D/', '.', $request->valor);
       $account->update();
       return redirect()->route('dashboard')->with('status', 'Conta editada com sucesso!');

    }


    public function destroy(Request $request)
    {
        $account = Account::findOrFail($request->id);
        $account->delete();
        return redirect()->route('dashboard')->with('status', 'Conta deletada com sucesso!');

    }
}
