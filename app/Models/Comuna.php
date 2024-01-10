<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comuna extends Model
{
    use HasFactory;
    protected $table = 'comuna';
    public $timestamps = false;
   protected $fillable =['com_id','rg_id','COM_NOM','Region_RG_ID'];


   public function regiones() {
           Return $this->belongsTo(Region::class);

    
 }
 public function empresas () {
    Return $this->HasMany(Empresa::class,'Comuna_COM_ID','COM_ID');


}


}