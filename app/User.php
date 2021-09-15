<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use LogsActivity;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'role', 'pegawai_id'
    ];

    protected static $logAttributes = ['*'];
    protected static $logAttributesToIgnore = [ 'updated_at', 'created_at', 'password'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;
    protected static $logName = 'User';


    public function getDescriptionForEvent(string $eventName): string
    {
        return auth()->user()->username .' '. $eventName . ' data' ;
    }


    // Di model comment

    // protected $fillable = [
    //     'user_id', 'content', 'commentable_id', 'commentable_type'
    // ];

    // public function user()
    // {
    //     return $this->belongsTo('App\User');
    // }

    // public function commentable()
    // {
    //     return $this->morphTo();
    // }

    // Model Post dan Portofolio
    // public function comments()
    // {
    //     return $this->morphToMany(Comment::class, 'commentable');
    // }

    // controller create store comment
    // $post = Post::find(1);
    // $post->comments()->create([
    //     'user_id' => 2,
    //     'content' => 'this comment by users for post'
    // ]);

    // controller show
    // $post = Post::find(1);
    // $post->comments;

    // foreach ($post as $v) {
    //     echo $comment->user->name .'-'. $comment->content  .'-'. $comment->commentable->title;
    //  }

    // controller update
    // $post = Post::find(1);
        // $comment = $post->comments()->where('id', 1)->first();
        // $comment->update([
        //     'content' => 'komenter telah disunting'
        // ]);

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

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai');
    }
}
