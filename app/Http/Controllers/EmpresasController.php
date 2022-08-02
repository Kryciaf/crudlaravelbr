<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class EmpresasController extends Controller
{
    public function index() {
        return view('index');
    }


    public function create()
    {
        return view('empresas.create');
    }

    public function store(Request $request)
    {

        $validatorParams = [
            'TITLE' => 'required|string',
            'NAME' => 'required|string',
            'LAST_NAME' => 'required|string',
            'EMAIL' => 'required|email',
            'ADDRESS_CITY' => 'required|string',
            'ADDRESS_PROVINCE' => 'required|string'
        ];

        // Valida os campos enviados na requisção e barra se for preciso
        $validator = Validator::make($request->all(), $validatorParams);
        if ($validator->fails()) {
            $error = [];
            foreach ($validator->errors()->getMessages() as $erros) {
                $error = array_merge($error, $erros);
            }
            return Redirect::back()->with("mass_error", $error);
        }

        // POST para empresa
        $url = 'https://b24-rglbgk.bitrix24.com.br/rest/1/170x89mkd55icjaq/crm.contact.add.json';
        $dataCompany = [
            'NAME' => $request->NAME,
            'LAST_NAME' => $request->LAST_NAME,
            'EMAIL' => $request->EMAIL
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataCompany);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);

        $empresa = new Empresa();
        $empresa->title = $request->TITLE;
        $empresa->city = $request->ADDRESS_CITY;
        $empresa->state = $request->ADDRESS_PROVINCE;
        $empresa->save();


        // POST para contato
        $url = 'https://b24-rglbgk.bitrix24.com.br/rest/1/170x89mkd55icjaq/crm.company.add.json';
        $dataContact = [
            'TITLE' => $request->TITLE,
            'ADDRESS_CITY' => $request->ADDRESS_CITY,
            'ADDRESS_PROVINCE' => $request->ADDRESS_PROVINCE
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataContact);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);

        $contato = new Contato();
        $contato->name = $request->NAME;
        $contato->last_name = $request->LAST_NAME;
        $contato->email = $request->EMAIL;
        $contato->save();

        return redirect('/empresas/list');
    }

    public function show()
    {
        $columns = [
            'empresas.id',
            'empresas.title',
            'empresas.city',
            'empresas.state',
            'contatos.name',
            'contatos.last_name',
            'contatos.email',
        ];

        $database_table = DB::connection(env('DB_CONNECTION'))->table('empresas');

        $model = $database_table->select($columns)->join('contatos', 'empresas.id', '=', 'contatos.id', "LEFT");

        $json_data = $model->get()->toArray();

        return view('empresas.todas', ['list' => $json_data]);


        //$url = 'https://b24-rglbgk.bitrix24.com.br/rest/1/170x89mkd55icjaq/crm.company.list.json';
        //$ch = curl_init($url);
        //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //$resultado = json_decode(curl_exec($ch));

        //return view('empresas.todas', ['resultado' => $resultado]);
    }

    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();

        $contato = Contato::findOrFail($id);
        $contato->delete();

        return redirect('/empresas/list');
    }

    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);
        $contato = Contato::findOrFail($id);
        return view('empresas.editar', ['empresa' => $empresa, 'contato' => $contato]);
    }

    public function update(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->update([
            'title' => $request->TITLE,
            'city' => $request->CITY,
            'state' => $request->ADDRESS_PROVINCE,
        ]);

        $contato = Contato::findOrFail($id);
        $contato->update([
            'name' => $request->NAME,
            'last_name' => $request->LAST_NAME,
            'email' => $request->EMAIL,
        ]);

        return redirect('/empresas/list');
    }
}
