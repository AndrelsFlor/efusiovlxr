<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Nov 2017 16:27:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Questao
 * 
 * @property int $id
 * @property string $enunciado
 * @property string $anexo
 * @property string $alternativa0
 * @property string $alternativa1
 * @property string $alternativa2
 * @property string $alternativa3
 * @property string $alternativa4
 * @property bool $resposta
 * @property int $id_categoria
 * @property int $id_topico
 * @property int $id_prova
 * @property int $id_natureza
 * 
 * @property \App\Models\Categorium $categorium
 * @property \App\Models\Natureza $natureza
 * @property \App\Models\Prova $prova
 * @property \App\Models\Topico $topico
 * @property \Illuminate\Database\Eloquent\Collection $simulados
 *
 * @package App\Models
 */
class Questao extends Eloquent
{
	protected $table = 'questao';
	public $timestamps = false;

	protected $casts = [
		'resposta' => 'bool',
		'id_categoria' => 'int',
		'id_topico' => 'int',
		'id_prova' => 'int',
		'id_natureza' => 'int'
	];

	protected $fillable = [
		'enunciado',
		'anexo',
		'alternativa0',
		'alternativa1',
		'alternativa2',
		'alternativa3',
		'alternativa4',
		'resposta',
		'id_categoria',
		'id_topico',
		'id_prova',
		'id_natureza'
	];

	public function categorium()
	{
		return $this->belongsTo(\App\Models\Categorium::class, 'id_categoria');
	}

	public function natureza()
	{
		return $this->belongsTo(\App\Models\Natureza::class, 'id_natureza');
	}

	public function prova()
	{
		return $this->belongsTo(\App\Models\Prova::class, 'id_prova');
	}

	public function topico()
	{
		return $this->belongsTo(\App\Models\Topico::class, 'id_topico');
	}

	public function simulados()
	{
		return $this->belongsToMany(\App\Models\Simulado::class, 'simulado_questao', 'id_questao', 'id_simulado')
					->withPivot('acerto_erro');
	}
}
