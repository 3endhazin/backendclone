<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Channel;





class ChannelController extends Controller
{
    


public function show($id)
{
  $channel = new Channel();
  $channel->showchannel($id);
}



public function index(Request $request){
    $channel = new Channel();
    $channel -> indexchannel($request);
}



public function store(Request $request)
{
    $channel = new Channel();
    $channel->storechannel($request);

}



public function update(Request $request, $id){
    $channel = new Channel();
    $channel -> updatechannel($request, $id);
}



public function destroy($id){
    $channel= new Channel();
    $channel->destroychannel($id);
}
}