<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller {

    public function ___construct() {

       // $this . middleware('auth');
        
        $this.middleware('auth')
                ->only(
                        'contato',
                        'categoria');
    }

    public function index() {
        
        $teste = 123;
        
        $arrayData = [1,2,3,4,5,6,7,8,9];
        
        return view('site.index', compact('teste','arrayData'));
    }

    public function contato() {
        return 'pagina de contato';
    }

    public function categoria($id) {

        return "return cat id: {$id}";
    }

    public function categoriaop($id = null) {

        return "return cat id: {$id}";
    }

}
