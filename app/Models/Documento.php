<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $primaryKey = 'DOC_ID';
    protected $fillable = [
        'DOC_FOLIO',
        'DOC_TD',
        'DOC_NNC',
        'DOC_FC',
        'DOC_TMV',
        'DOC_RUTE',
        'DOC_NT',
        'Empresa_EMP_RUT',
    ];
    public $timestamps = false;
}
 
