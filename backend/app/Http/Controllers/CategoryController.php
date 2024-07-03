<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Category;

use Illuminate\Support\Str;

use function GuzzleHttp\Promise\all;

use App\Components\Recusive;

class CategoryController extends Controller
{

    private $htmlSlelect;
    public function __construct()
    {
        $this->htmlSlelect = '';
    }

    public function create()
    {

        $htmlOption = $this->getCategory(0);
        return view(view: 'admin.category.add' , data : compact( var_name: 'htmlOption'));
   }


    public function index()
    {
        $categories = \App\Models\Category::;
        return view('admin.category.index', compact ('categories'));
    }


    public function store(Request $request)
    {  
      //  $request = new Category ();
        $request = Category::Create([
                'name' => $request ->name,
                'parent_id' => $request ->parent_id,
                'slug' => str::slug($request ->name)
        ]);
        return redirect() -> route( route: 'categories.index');
    }



    public function getCategory($parentID = "")
    {
        $data = \App\Models\Category::all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentID);
        return $htmlOption;
    }

    public function edit($id )
    {
        $category =  \App\Models\Category::find($id);
        $htmlOption = $this->getCategory( $category->parent_id );
        return view('admin.category.edit', compact( 'category',  'htmlOption'));

    }


    public function update($id, Request $request){
        \App\Models\Category::find($id) ->update([
                'name' => $request ->name,
                'parent_id' => $request ->parent_id,
                'slug' => str::slug($request ->name)
        ]);
        return redirect() -> route( route: 'categories.index');
    }

    public function delete($id)
    {
        \App\Models\Category::find($id) ->delete();
        
        return redirect() -> route( route: 'categories.index');
    }
}
