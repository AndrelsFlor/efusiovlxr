<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Nov 2017 16:27:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Banca
 * 
 * @property int $id
 * @property string $descricao
 * 
 * @property \Illuminate\Database\Eloquent\Collection $provas
 *
 * @package App\Models
 */
class Banca extends Eloquent
{
	protected $table = 'banca';
	public $timestamps = false;

	protected $fillable = [
		'descricao'
	];

	public function provas()
	{
		return $this->hasMany(\App\Models\Prova::class, 'id_banca');
	}
}
