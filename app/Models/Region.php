<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $table = 'region';
    public $timestamps = false;
   protected $fillable =['rg_id','rg_nom'];
   protected $primaryKey ='rg_id';

   public function comunas() {
          Return $this->hasMany(Comuna::class, 'Region_RG_ID','RG_ID');

   }
}