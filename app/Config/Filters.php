<?php namespace Config;

use App\Filters\AuthFilter;
use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
        'auth'     => AuthFilter::class
	];

	// Always applied before every request
	public $globals = [
		'before' => [
            'auth' => ['except' => ['Auth/*', 'Auth']]
		],
		'after'  => [
			'toolbar',
		],
	];

	public $methods = [];

	public $filters = [];
}
