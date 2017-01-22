<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        $products = $this->product->all();
        
       return view('painel.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
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
               
    }       
 

}