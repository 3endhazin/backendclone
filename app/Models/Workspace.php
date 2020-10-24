<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Channel;
use JWTAuth;

class Workspace extends Model
{
    use HasFactory;
     
    protected $table = 'workspaces';
    protected $user;

   
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    
    protected $guarded = [];


    public function indexWorkspace()
{
    $workspace = $this->user->workspaces()->get(['title'])->toArray();

    return $workspace;
}




public function showWorkspace($id)
{
    $workspaces = $this->user->workspaces()->find($id);

    if (!$workspaces) {
        return response()->json([
            'success' => false,
            'message' => 'Sorry, workspace with id ' . $id . ' cannot be found.'
        ], 400);
    }

    return $workspaces;
}





    public function storeWorkspace($request)
    {
    

    $workspace = new Workspace();
    $workspace->title = $request->title;
    // $workspace->description = $request->description;

    if ($this->user->workspaces()->save($workspace))
        return response()->json([
            'success' => true,
            'workspace' => $workspace
        ]);
    else
        return response()->json([
            'success' => false,
            'message' => 'Sorry, workspace could not be added.'
        ], 500);
}




public function updateWorkspace(Request $request, $id)
{
    $workspace = $this->user->workspaces()->find($id);

    if (!$workspace) {
        return response()->json([
            'success' => false,
            'message' => 'Sorry, wor$workspace with id ' . $id . ' cannot be found.'
        ], 400);
    }

    $updated = $workspace->fill($request->all())->save();

    if ($updated) {
        return response()->json([
            'success' => true
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Sorry, wor$workspace could not be updated.'
        ], 500);
    }
}




public function destroyWorkspace($id)
{
    $workspace = $this->user->workspaces()->find($id);

    if (!$workspace) {
        return response()->json([
            'success' => false,
            'message' => 'Sorry, wors$workspace with id ' . $id . ' cannot be found.'
        ], 400);
    }

    if ($workspace->delete()) {
        return response()->json([
            'success' => true
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'wors$workspace could not be deleted.'
        ], 500);
    }
}

public function channels()
{
    return $this->hasMany(Channel::class);
}

}
