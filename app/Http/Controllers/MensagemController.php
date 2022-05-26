<?php

namespace App\Http\Controllers;

use App\Mensagem;
use App\Atividade;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use \Illuminate\Support\Facades\Auth;

class MensagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::check() ){   
            //retorna somente as atividades cadastradas pelo usuário cadastrado
            $mensagens = Mensagem::where('user_id', Auth::id() )
                                                ->paginate(4);     
        }else
        {
            $mensagens = Mensagem::paginate(4);
        }
        return view('mensagem.list',['mensagens' => $mensagens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $atividades = Atividade::all();
        return view ('mensagem.create',['atividades' => $atividades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //faço as validações dos campos
        //vetor com as mensagens de erro
        $messages = array(
            'titulo.required' => 'É obrigatório um título para a mensagem',
            'texto.required' => 'É obrigatória uma descrição para a mensagem',
            'autor.required' => 'É obrigatório o cadastro do autor da mensagem',
            'atividade_id.required' => 'É obrigatória atividade da mensagem',
        );
        //vetor com as especificações de validações
        $regras = array(
            'titulo' => 'required|string|max:255',
            'texto' => 'required',
            'autor' => 'required',
            'atividade_id' => 'required',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect('mensagens/create')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_Mensagem = new Mensagem();
        $obj_Mensagem->titulo = $request['titulo'];
        $obj_Mensagem->texto = $request['texto'];
        $obj_Mensagem->autor = $request['autor'];
        $obj_Mensagem->user_id = Auth::id();
        $obj_Mensagem->atividade_id = $request['atividade_id'];
        $obj_Mensagem->save();
        return redirect('/mensagens')->with('success', 'Mensagem criada com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mensagem = Mensagem::where("id",$id);
        return view('mensagem.show',['mensagem'=>$mensagem]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //busco os dados do obj mensagem que o usuário deseja editar
        $obj_Mensagem = Mensagem::find($id);
        
        //verifico se o usuário logado é o dono da mensagem
        if( Auth::id() == $obj_Mensagem->user_id ){
            //retorno a tela para edição
            $atividades = Atividade::all();
            return view('mensagem.edit',['mensagem' => $obj_Mensagem], ['atividades' => $atividades]);    
        }else{
            //retorno para a rota /atividades com o erro
            return redirect('/mensagens')->withErrors("Você não tem permissão para editar essa mensagem");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //vetor com as mensagens de erro
        $messages = array(
            'titulo.required' => 'É obrigatório um título para a mensagem',
            'texto.required' => 'É obrigatória um texto para a mensagem',
            'autor.required' => 'É obrigatório o autor da mensagem',
            'atividade_id.required' => 'É obrigatório a atividade da mensagem',
        );

        //vetor com as especificações de validações
        $regras = array(
            'titulo' => 'required|string|max:255',
            'texto' => 'required',
            'autor' => 'required|string',
            'atividade_id' => 'required',
        );

        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);

        //executa as validações
        if ($validador->fails()) {
            return redirect('mensagens/$id/edit')
            ->withErrors($validador)
            ->withInput($request->all);
        }

        //se passou pelas validações, processa e salva no banco...
        $obj_Mensagem = Mensagem::findOrFail($id);
        $obj_Mensagem->titulo =       $request['titulo'];
        $obj_Mensagem->texto = $request['texto'];
        $obj_Mensagem->autor = $request['autor'];
        $obj_Mensagem->atividade_id = $request['atividade_id'];
        $obj_Mensagem->user_id     = Auth::id();
        $obj_Mensagem->save();

        return redirect('/mensagens')->with('success', 'Mensagem alterada com sucesso!!');
    
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Mensagem  $atividade
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $obj_Mensagem = Mensagem::find($id);
        
        //verifico se o usuário logado é o dono da Atividade
        if( Auth::id() == $obj_Mensagem->user_id ){
            //retorno o formulário questionando se ele tem certeza
            return view('mensagem.delete',['mensagem' => $obj_Mensagem]);    
        }else{
            //retorno para a rota /atividades com o erro
            return redirect('/mensagens')->withErrors("Você não tem permissão para deletar essa mensagem");
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mensagem  $atividade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj_Mensagem = Mensagem::findOrFail($id);
        $obj_Mensagem->delete($id);
        return redirect('/mensagens')->with('sucess','Mensagem excluída!');
    }
}
