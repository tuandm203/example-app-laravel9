<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\Menu;

use Illuminate\Support\Str;

use function GuzzleHttp\Promise\all;

use App\Components\MenuRecusive;

class MenuController extends Controller
{
    
    
    private $menuRecusive ;
    private $menu ;

    public function __construct(MenuRecusive $menuRecusive,Menu $menu)
    {
        $this->menuRecusive =  $menuRecusive;
        $this->menu =  $menu;
        
    }

    public function index()
    {
        $menus = $this->menu->paginate(10);
         return view('admin.menus.index', compact('menus'));
      
    }

    public function create()
    {  
       
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
       
        return view('admin.menus.add',compact('optionSelect'));
    }

    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' =>$request->parent_id,
            'slug'=>str::slug($request->name)
        ]);
        return redirect()->route('menus.index');
    }

    public function edit($id,Request $request )
    {
        $menuFollowIdEdit = $this->menu->find($id);
        $optionSelect = $this->menuRecusive->menuRecusiveEdit($menuFollowIdEdit -> parent_id);
        return view('admin.menus.edit',compact('optionSelect', 'menuFollowIdEdit'));
    }

    public function update($id,Request $request)
    {
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' =>$request->parent_id,
            'slug' => str::slug( $request->name)
        ]
        );
        return redirect()->route('menus.index');
    }

    public function delete($id)
    {
        $this->menu->find($id)->delete();
        return redirect()->route('menus.index');
    }
}
