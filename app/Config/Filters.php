<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'adminfilter' => \App\Filters\AdminFilter::class,
		'petugasfilter' => \App\Filters\PetugasFilter::class,
		'siswafilter' => \App\Filters\SiswaFilter::class,
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			'adminfilter' => ['except' => [
				'auth', 'auth/*',
				'login', 'login/*'
			]],
			'petugasfilter' => ['except' => [
				'auth', 'auth/*',
				'login', 'login/*'
			]],
			'siswafilter' => ['except' => [
				'auth', 'auth/*',
				'login', 'login/*'
			]]

			// 'adminfilter' => ['except' => [
			// 	'auth', 'auth/*',
			// 	'login', 'login/*'
			// ]],
		],
		'after'  => [
			'adminfilter' => ['except' => [
				'home', 'home/*',
				'siswa', 'siswa/*',
				'kelas', 'kelas/*',
				'petugas', 'petugas/*',
				'spp', 'spp/*',
				'laporan', 'laporan/*',
				'history', 'history/*',
				'transaksi', 'transaksi/*',
				'profile', 'profile/*',
				'dashboard', 'dashboard/*',
				'logout', 'logout/*',
			]],
			'petugasfilter' => ['except' => [
				'home', 'home/*',
				'laporan', 'laporan/*',
				'history', 'history/*',
				'transaksi', 'transaksi/*',
				'profile', 'profile/*',
				'dashboard', 'dashboard/*',
				'logout', 'logout/*',
			]],
			'siswafilter' => ['except' => [
				'home', 'home/*',
				'history', 'history/*',
				'profile', 'profile/*',
				'logout', 'logout/*',
			]]
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [];
}
