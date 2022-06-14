<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function index()
    {
        $accounts = Account::where('id_usuario', Auth::user()->id)->paginate(6);
        return view('dashboard', compact('accounts'));
    }


    public function create()
    {
        return view('accountCreate');
    }


    public function store(CreateRequest $request)
    {
        $account = new Account();
        $account->descricao = $request->conta;
        $account->tipo = $request->tipo;
        $account->data = $request->data;
        $account->razao_social = $request->fornecedor;
        $account->cpf_cnpj = preg_replace("/[^0-9]/", "", $request->cpf_cnpj);
        $valor = str_replace('.', '', $request->valor);
        $account->valor = str_replace(',', '.', $valor);
        $account->id_usuario = Auth::user()->id;
        $account->save();
        return redirect()->route('dashboard')->with('status', 'Conta cadastrada com sucesso!');
    }


    public function edit(Account $account)
    {
        return view('accountEdit', compact('account'));
    }


    public function update(CreateRequest $request, Account $account)
    {
        $account->descricao = $request->conta;
        $account->tipo = $request->tipo;
        $account->data = $request->data;
        $account->razao_social = $request->fornecedor;
        $account->cpf_cnpj = preg_replace("/[^0-9]/", "", $request->cpf_cnpj);
        $valor = str_replace('.', '', $request->valor);
        $account->valor = str_replace(',', '.', $valor);
        $account->update();
        return redirect()->route('dashboard')->with('status', 'Conta editada com sucesso!');
    }


    public function destroy(Request $request)
    {
        $account = Account::findOrFail($request->id);
        $account->delete();
        return redirect()->route('dashboard')->with('status', 'Conta deletada com sucesso!');
    }

    public function searchSuggestion(Request $request)
    {
        $query = $request->term;
        // busca no banco uma correspodência para sugestão de pesquisa
        $search = Account::where("id_usuario", Auth::user()->id)->where('descricao', 'like', "%{$query}%")->get('descricao');
        return $search->pluck('descricao');
    }

    public function search(SearchRequest $request)
    {
        $query = $request->only('search');

        $accounts = Account::where("id_usuario", Auth::user()->id)->where('descricao', 'like', "%{$query['search']}%")->orWhere('data', 'like', "%{$query['search']}%")
            ->orWhere('razao_social', 'like', "%{$query['search']}%")->orWhere('cpf_cnpj', 'like', "%{$query['search']}%")->orWhere('valor', 'like', "%{$query['search']}%")->paginate(6);

        return view('dashboard', compact('accounts', 'query'));
    }
}
