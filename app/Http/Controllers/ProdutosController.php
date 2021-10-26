<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Produtos;
use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produtos::all();
        return view('produtos.index',['todosprodutos' => $produtos]);
        return view('produtos.create');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    public function search(Request $request, Produtos $produtos)
    {
        $query = Produtos::query();


        #filtro por nome
        if ($request->has('nome')) {
            $query->where('nome', 'LIKE', '%' . $request->nome . '%');
        }
        

        #filtro para hifens
        if ($request->has('hifen')) {
            $query->where('nome', 'not regexp', "[\d\-]");
        }


        #filtro para numeros
        if ($request->has('number')) {
            $query->where('nome', 'not regexp', "\d+"); 
        }
        


        #se foi selecionado o filtro


   if($request->has('filtro_minimo')){
                    $filtro_minimo =  $request->input('filtro_minimo');
                
                    $query->where(DB::raw('LENGTH(nome)'), '>' , "$filtro_minimo")->get();
                    
                    #https://stillat.com/blog/2016/11/16/laravel-string-helper-function-substr
                    #https://stackoverflow.com/questions/37410022/eloquent-query-the-length-of-field-in-laravel
                }

    if($request->has('filtro_maximo')){
        $filtro_maximo =  $request->input('filtro_maximo');
        $query->where(DB::raw('LENGTH(nome)'), '<' , "$filtro_maximo");
        
        
     /**   $urls = $query->where('nome');
      * where('nome', 'not regexp', ".*\/.com\/(.+?)\/.*")
        foreach($urls as $url){
            $corte_filtro = ('.*\/.com\/(.+?)\/.*', $url);
            $url->where('LENGTH(nome) > ?', [$filtro_maximo])->get();}
**/
        #$query->where('nome', 'not regexp', ".*\/.com\/(.+?)\/.*")
    }
 



        $produtos = $query->paginate();





        return view('produtos.search',['todosprodutos' => $produtos]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required',
        ]);
        
        $produtos = new Produtos;
        $produtos->nome = $request->nome;
        $produtos->descricao = $request->descricao;
        $produtos->save();
        return redirect('produtos')->with('message', 'Produto atualizado com sucesso!');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produtos = Produtos::find($id);
        if(!$produtos){
            abort(404);
        }
        return view('produtos.details')->with('detailpage', $produtos);        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produtos = Produtos::find($id);
        if(!$produtos){
            abort(404);
        }
        return view('produtos.edit')->with('detailpage', $produtos);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required',
        ]);
        
        $produtos = Produtos::find($id);
        $produtos->nome = $request->nome;
        $produtos->descricao = $request->descricao;
        $produtos->save();
        return redirect('produtos')->with('message', 'Produto editado com sucesso!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produtos = Produtos::find($id);
        $produtos->delete();
        return redirect('produtos')->with('message', 'Produto apagado com sucesso!');
    }



    public function delete()
    {
        $produtos = new Produtos;
        $produtos->truncate();
        return redirect('produtos')->with('message', 'Todos os produtos foram apagados com sucesso!');
    }
}