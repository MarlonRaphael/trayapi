<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
  /**
   * Setup model event hooks
   * Boot function from laravel.
   */
  protected static function boot()
  {
    parent::boot();

    static::creating(function ($model) {
      $model->commission = ($model->price * .085);
    });
  }

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'user_id',
      'price',
      'commission',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    //
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'created_at' => 'datetime:d/m/Y H:i',
      'updated_at' => 'datetime:d/m/Y H:i',
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
