<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use App\Models\User;

use Illuminate\Http\Request;
use JWTAuth;



class WorkspaceController extends Controller
{
     
    

public function show($id)
{
  $workspace = new Workspace();
  $workspace->showWorkspace($id);
}



public function index(){
    $workspace = new Workspace();
    return $workspace -> indexWorkspace();
}



public function store(Request $request)
{

    $this->validate($request, [
        'title' => 'required',
    ]);

    $workspace = new Workspace();
    $workspace->storeWorkspace($request);

}



public function update(Request $request, $id){
    $workspace = new Workspace();
    $workspace -> updateWorkspace($request, $id);
}



public function destroy($id){
    $workspace= new Workspace();
    $workspace->destroyWorkspace($id);
}



}
