<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Nov 2017 16:27:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Respostum
 * 
 * @property int $id
 * @property int $id_usuario
 * @property string $resposta
 * @property string $anexo
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Respostum extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int'
	];

	protected $fillable = [
		'id_usuario',
		'resposta',
		'anexo'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'id_usuario');
	}
}
