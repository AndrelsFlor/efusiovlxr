<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Nov 2017 16:27:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SimuladoQuestao
 * 
 * @property int $id_simulado
 * @property int $id_questao
 * @property string $acerto_erro
 * 
 * @property \App\Models\Questao $questao
 * @property \App\Models\Simulado $simulado
 *
 * @package App\Models
 */
class SimuladoQuestao extends Eloquent
{
	protected $table = 'simulado_questao';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_simulado' => 'int',
		'id_questao' => 'int'
	];

	protected $fillable = [
		'acerto_erro'
	];

	public function questao()
	{
		return $this->belongsTo(\App\Models\Questao::class, 'id_questao');
	}

	public function simulado()
	{
		return $this->belongsTo(\App\Models\Simulado::class, 'id_simulado');
	}
}
