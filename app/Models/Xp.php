<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Nov 2017 16:27:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Xp
 * 
 * @property int $nivel
 * @property int $xp
 * @property string $descricao
 *
 * @package App\Models
 */
class Xp extends Eloquent
{
	protected $table = 'xp';
	protected $primaryKey = 'nivel';
	public $timestamps = false;

	protected $casts = [
		'xp' => 'int'
	];

	protected $fillable = [
		'xp',
		'descricao'
	];
}
