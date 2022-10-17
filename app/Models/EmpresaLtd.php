<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Log;

class EmpresaLtd extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;


    /**
     * Agraga a la consulta los casos de negocio.
     *
     * 
         */

   protected static function boot(){
        parent::boot();        
        static::addGlobalScope('empresa_id', function (Builder $builder) {
            $builder->where('empresa_ltds.empresa_id', auth()->user()->empresa_id);
        });
    }

   public function scopeLtds($query) {
      Log::info(__CLASS__." ".__FUNCTION__);
      return $query->join('ltds', 'ltds.id', '=', 'ltd_id');
   }
}
