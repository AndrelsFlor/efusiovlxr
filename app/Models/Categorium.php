<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Nov 2017 16:27:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Categorium
 * 
 * @property int $id
 * @property string $descricao
 * 
 * @property \Illuminate\Database\Eloquent\Collection $questaos
 *
 * @package App\Models
 */
class Categorium extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'descricao'
	];

	public function questaos()
	{
		return $this->hasMany(\App\Models\Questao::class, 'id_categoria');
	}
}
