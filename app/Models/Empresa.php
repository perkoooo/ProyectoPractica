<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'empresa';
    public $timestamps = false;
    protected $fillable =['emp_rut','emp_gr','emp_rs','emp_nf','emp_dr','emp_cm','emp_rg','emp_tl','emp_eml','Comuna_COM_ID'];
    protected $primaryKey ='emp_rut';

    public function comunas() 
    {
        Return $this->belongsTo(Comuna::class);
    }
}
