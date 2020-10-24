<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use JWTAuth;


class Channel extends Model
{
    use HasFactory;
    protected $table = 'channels';
    protected $user;

   
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    
    protected $guarded = [];


    public function indexchannel()
{
    $channel = $this->user->workspaces()->channels()->get(['title'])->toArray();

    return $channel;
}




public function showchannel($id)
{
    $channels = $this->user->workspaces()->channels()->find($id);

    if (!$channels) {
        return response()->json([
            'success' => false,
            'message' => 'Sorry, channel with id ' . $id . ' cannot be found.'
        ], 400);
    }

    return $channels;
}





    public function storechannel($request)
    {
    $this->validate($request, [
        'title' => 'required',
    ]);

    $channel = new channel();
    $channel->title = $request->title;
    $channel->description = $request->description;

    if ($this->user->workspaces()->channels()->save($channel))
        return response()->json([
            'success' => true,
            'channel' => $channel
        ]);
    else
        return response()->json([
            'success' => false,
            'message' => 'Sorry, channel could not be added.'
        ], 500);
}




public function updatechannel(Request $request, $id)
{
    $channel = $this->user->workspaces()->channels()->find($id);

    if (!$channel) {
        return response()->json([
            'success' => false,
            'message' => 'Sorry, wor$channel with id ' . $id . ' cannot be found.'
        ], 400);
    }

    $updated = $channel->fill($request->all())->save();

    if ($updated) {
        return response()->json([
            'success' => true
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Sorry, wor$channel could not be updated.'
        ], 500);
    }
}




public function destroychannel($id)
{
    $channel = $this->user->workspaces()->channels()->find($id);

    if (!$channel) {
        return response()->json([
            'success' => false,
            'message' => 'Sorry, wors$channel with id ' . $id . ' cannot be found.'
        ], 400);
    }

    if ($channel->delete()) {
        return response()->json([
            'success' => true
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'wors$channel could not be deleted.'
        ], 500);
    }
}
public function workspace(){ 
    return $this->belongsTo(Workspace::class);
}
}
