<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Nov 2017 16:27:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Simulado
 * 
 * @property int $id
 * @property int $id_usuario
 * @property \Carbon\Carbon $dt_geracao
 * @property string $descricao
 * @property \Carbon\Carbon $duracao
 * 
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $questaos
 *
 * @package App\Models
 */
class Simulado extends Eloquent
{
	protected $table = 'simulado';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int'
	];

	protected $dates = [
		'dt_geracao',
		'duracao'
	];

	protected $fillable = [
		'id_usuario',
		'dt_geracao',
		'descricao',
		'duracao'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'id_usuario');
	}

	public function questaos()
	{
		return $this->belongsToMany(\App\Models\Questao::class, 'simulado_questao', 'id_simulado', 'id_questao')
					->withPivot('acerto_erro');
	}
}
