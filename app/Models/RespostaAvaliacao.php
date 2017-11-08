<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Nov 2017 16:27:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RespostaAvaliacao
 * 
 * @property int $id_usuario
 * @property int $id_usuario_voto
 * @property string $up_down
 * 
 * @property \App\Models\Usuario $usuario
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class RespostaAvaliacao extends Eloquent
{
	protected $table = 'resposta_avaliacao';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_usuario_voto' => 'int'
	];

	protected $fillable = [
		'up_down'
	];

	public function usuario()
	{
		return $this->belongsTo(\App\Models\Usuario::class, 'id_usuario');
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'id_usuario_voto');
	}
}
