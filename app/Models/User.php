<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Nov 2017 16:27:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $xp
 * 
 * @property \App\Models\Pessoa $pessoa
 * @property \Illuminate\Database\Eloquent\Collection $resposta
 * @property \Illuminate\Database\Eloquent\Collection $resposta_avaliacaos
 * @property \Illuminate\Database\Eloquent\Collection $simulados
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $casts = [
		'xp' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'remember_token',
		'xp'
	];

	public function pessoa()
	{
		return $this->hasOne(\App\Models\Pessoa::class, 'id_usuario');
	}

	public function resposta()
	{
		return $this->hasMany(\App\Models\Respostum::class, 'id_usuario');
	}

	public function resposta_avaliacaos()
	{
		return $this->hasMany(\App\Models\RespostaAvaliacao::class, 'id_usuario_voto');
	}

	public function simulados()
	{
		return $this->hasMany(\App\Models\Simulado::class, 'id_usuario');
	}
}
