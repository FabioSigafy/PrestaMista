<?php

namespace App\Http\Controllers;

use App\Exports\FormsExport;
use App\Models\form;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use League\CommonMark\Node\Block\Document;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(request $request)
    {



        $query = Form::query();

        if ($request->filled('search')) {
            $query->where('name', 'LIKE', "%{$request->search}%");

        }
        $form = $query->orderBy('created_at', 'DESC')->paginate(6);

        return view('forms.index', [

            'form' => $form
        ]);
    }
    public function auth(Request $request)
    {

        $data =  $request->all();
        $remmenber =  isset($data['lembrar']) ? true : false;

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']], $remmenber)){
            return redirect('/');
        }else{
            return redirect('/');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errors = [];

        $vall = $this->vall($request);


        //Validando as informações ou apresentando mensagens de erro

        if (!empty($vall)) {
            $errors = Arr::collapse([$errors, $vall]);
        }

        if (empty($errors)) {

            try {
                $form = Form::create([
                    'document' => $request->document,
                    'documentRegistry' =>$request->document,
                    'name' => $request->name,
                    'date' => $request->date,
                    'deathcover' => $request->deathcover,
                    'inactive' => 0
                ]);
            } catch (Exception $e) {
                $errors[] = 'Erro ao cadastrar'.$e->getMessage() ;
            }
        }
        if (!empty($errors)) {
            $return = [
                'status' => false,
                'errors' => $errors
            ];
        } else {
            $return = [
                'status' => true,
                'message' => 'Prestamista criada com sucesso!',
                'redirect' => route('forms.index', [$form->id]),


            ];
        }


        return response()->json($return);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(form $form)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\form  $form
     * @return \Illuminate\Http\Response
     */

    // public function inactive($id)
    // {
    //     $form = form::find($id);
    //     if(){}
    // }


    public function edit($id)
    {
        $form = form::find($id);

        return view('forms.edit', [

            'form' => $form

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, form $form)
    {
        $errors = [];

        $validation = $this->vall($request);

        if (!empty($validation)) {
            $errors = Arr::collapse([$errors, $validation]);
        }

        if (empty($errors)) {
            try {
                form::find($form->id)->update([
                    'document' => $request->document,
                    'documentRegistry' => $request->document,
                    'name' => $request->name,
                    'date' => $request->date,
                    'deathcover' =>$request->deathcover,
                    'inactive' => $request->inactive
                ]);
            } catch (Exception $e) {
                $errors[] = 'Erro ao alterar prestamista no banco de dados';
            }
        }

        if (!empty($errors)) {
            $return = [
                'status' => false,
                'errors' => $errors
            ];
        } else {
            $return = [
                'status' => true,
                'message' => 'Prestamista alterado com sucesso!',
                'redirect' => route('forms.index', [$form->id])
            ];
        }

        return response()->json($return);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(form $form)
    {
        //
    }

    private function vall($request)
    {


        //Configurando regras de incerção de dados
        $dataRules = [
            'document' => 'required|min:3',
            'name' => 'required',
            'date' => 'required',
            'deathcover' => 'required'
        ];

        //Configurando tratamento de erros dos dados
        $errorMsg = [
            'document.required' => 'CPF não inserido!',
            'name.required' => 'Insira o nome!',
            'date.required' => 'Data não selecionada!',
            'deathcover.required' => 'Capital não inserido!'
        ];


        $validator = Validator::make($request->all(), $dataRules, $errorMsg);

        if ($validator->fails()) {
            return $validator->errors()->all();
        } else {
            return [];
        }
        // Arr: classe que contem utilitarios para Arrays da linguagem PHP

    }

    public function export()
    {
        return Excel::download(new FormsExport, 'users.xlsx');
    }

}
