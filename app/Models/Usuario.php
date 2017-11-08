<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Nov 2017 16:27:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Usuario
 * 
 * @property int $id
 * @property string $logon
 * @property string $nome_usuario
 * @property string $senha
 * @property string $email
 * @property int $xp
 * 
 * @property \Illuminate\Database\Eloquent\Collection $resposta_avaliacaos
 *
 * @package App\Models
 */
class Usuario extends Eloquent
{
	protected $table = 'usuario';
	public $timestamps = false;

	protected $casts = [
		'xp' => 'int'
	];

	protected $fillable = [
		'logon',
		'nome_usuario',
		'senha',
		'email',
		'xp'
	];

	public function resposta_avaliacaos()
	{
		return $this->hasMany(\App\Models\RespostaAvaliacao::class, 'id_usuario');
	}
}
