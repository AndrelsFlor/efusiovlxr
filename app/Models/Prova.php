<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Nov 2017 16:27:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Prova
 * 
 * @property int $id
 * @property int $id_banca
 * @property string $descricao
 * @property int $ano
 * 
 * @property \App\Models\Banca $banca
 * @property \Illuminate\Database\Eloquent\Collection $questaos
 *
 * @package App\Models
 */
class Prova extends Eloquent
{
	protected $table = 'prova';
	public $timestamps = false;

	protected $casts = [
		'id_banca' => 'int',
		'ano' => 'int'
	];

	protected $fillable = [
		'id_banca',
		'descricao',
		'ano'
	];

	public function banca()
	{
		return $this->belongsTo(\App\Models\Banca::class, 'id_banca');
	}

	public function questaos()
	{
		return $this->hasMany(\App\Models\Questao::class, 'id_prova');
	}
}
