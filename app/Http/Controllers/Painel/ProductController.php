<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Painel\ProductFormRequest;
use App\Models\Painel\Product;

class ProductController extends Controller {

    private $product;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function index() {
        
        $tittle = 'Listagem dos produtos';

        $products = $this->product->all();
        
       return view('painel.products.index', compact('products','tittle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
      
        
        $tittle = 'Formulario de Cadastro';
        
        $categories = ['eletronicos','cozinha','banho'];
        
        return view('painel.products.create', compact('tittle','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request) {
        
      //  dd($request);
        
       //dd($request->all()); //request all pega todos os dados do form
       //  dd($request->only(['name','number']));
      //dd($request->except('number'));
       // dd($request->input('name')); apenas o dado do inputtb
       
       
        $dataForm = $request->all();
        
        
        if(!isset($dataForm['active'])){
            $dataForm['active'] = 0;
        }
        
        // validação de dados
        
       // $this->validate($request, $this->product->rules);
            
        
        
        $insert = $this->product->create($dataForm);
        
        if ($insert)
        {
            return redirect()->route('produtos.index');
        } else {
        return redirect()->back() ;   
        }        
        
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
       
        $product = $this->product->find($id);
        
        $tittle = "Editar produto - $product->name";
        
        $categories = ['eletronicos','cozinha','banho'];
        
        
        return view('painel.products.create', compact('tittle','categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id) {
        
// recupera os dados do formulario
        
        $dataForm = $request->all();
        // recupera o item
        $product = $this->product->find($id);
        // faz a verficacao do ativo
        if(!isset($dataForm['active'])){
            $dataForm['active'] = 0;
        }
        
        $update = $product->update($dataForm);
        
        if($update)
            return redirect()->route('produtos.index');
        else 
            return redirect()->route('produtos.edit',$id)
                    ->with(['errors' => 'não foi possivel atualizar o item']);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
    
    public function testes(){
        
       /*
        * 
        * forma ruim...
        $prod = $this->product;
        $prod->name = 'nome do produto';
        $prod->number = 123456;
        $prod->image = 'abecdesdfs';
        $prod->active = true;
        $prod->categoria = 'eletornicos';
        $prod->description = 'description do produtos';
        
        $insert = $prod->save();
        
        if($insert)
        {
            return 'salvou ok';
        }
        else return 'falha ao inserir';
        
        /*/
      /* Melhor forma
        
      $insert = $this->product->create([
           'name' => 'nome do produto 2',
           'number' => 123456789,
           'active' => false,
           'image' => 'abcdesffs',
           'categoria' => 'cozinha',
           'description' => 'description aqui',
       ]);
       
      if($insert){
          return "inseriu blz id: {$insert->id}";
      }
      else 'não inseriu';
        */ 
        
        //atualiza menos produtivo
       /*
        $prod = $this->product->find(5);
        $prod->name = 'produto id 5';
        $prod->number = 123456;
        $prod->image = 'abecdesdfs';
        $prod->active = true;
        $prod->categoria = 'eletornicos';
        $prod->description = 'description do produtos';
        
         $update = $prod->save();
        
        if($update)
        {
            return 'atualizou ok';
        }
        else return 'falha ao atualizar';
        * 
        * o metodo dd() faz o dump.. e fino pq ja msotra o array
        */
       
        
        /*
        $prod = $this->product->find(6);
        $prod->update([
           'name'       => 'nome do update teste 2',
           'number'     => 123456789,
           'active'     => TRUE,
           'image'      => 'abcdesffs',
           'categoria'  => 'cozinha'
            
        ]);
        
       //  $update = $prod->save();
        
        if($update)
        {
            return 'atualizou ok';
        }
        else return 'falha ao atualizar';
      
     */ 
    //update com where no registro
   /*
        $update = $this->product
                ->where('number', 123456)
                // pode ter quantos where for necesssario
                ->update([
            'name' => 'nome do where',
            'active' => TRUE,
            'image' => 'abcdesffs'
        ]);


        if ($update) {
            return 'atualizou ok';
        } else
            return 'falha ao atualizar';  */
        
        /* delete por ID
        
        $prod = $this->product->find(3);
        $delete = $prod->delete();
        
         if ($delete) {
            return 'deletou ok';
        } else
            return 'falha ao deletar';
        */
         $delete = $this->product->where('number',123456)->delete();
          if ($delete) {
            return 'deletou ok';
        } else
            return 'falha ao deletar';
        
    }

}