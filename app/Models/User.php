<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    /**
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function workspaces()
    {
        return $this->hasMany(Workspace::class);
    }
   public function channels()
    {
        return $this->hasMany(Channel::class);
    } 
    public function users()
    {
        return $this->hasMany(User::class);
    }
   public function users1(){
       return $this->belongsToMany(User::class, "sender_reciever", "sender_id", "reciever_id");
   }







    
    public function fetchMessages($idworkspace,$idchannel){
        $workspace = Workspace::find($idworkspace);
        $channel = Channel::find($idchannel);
        dd($this->user->workspaces[0]->channels->);
        $message = $user->$workspace->$channel->messages()->get(['message'])->toArray();
    
    return "message";
    }

    // public function sendMessage($request){

    // $message=$this->user->workspaces()->channels()->messages()->create(
    // [
    //     'message'=> $request->message
    // ]);
       
    // broadcast(new Message($message->load('user')))->toOthers();
    //    return ['status'=> 'success'];

    // }

 
}
