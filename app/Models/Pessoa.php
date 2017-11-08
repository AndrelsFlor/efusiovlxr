<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Nov 2017 16:27:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Pessoa
 * 
 * @property int $id_usuario
 * @property string $nome
 * @property \Carbon\Carbon $dt_nascimento
 * @property string $sexo
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Pessoa extends Eloquent
{
	protected $table = 'pessoa';
	protected $primaryKey = 'id_usuario';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int'
	];

	protected $dates = [
		'dt_nascimento'
	];

	protected $fillable = [
		'nome',
		'dt_nascimento',
		'sexo'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'id_usuario');
	}
}
