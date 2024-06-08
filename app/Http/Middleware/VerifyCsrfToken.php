<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
        'https://aarashiddata.com.ng/webhook/rva-transfer?token=ase4f0f3612345327f3eb977b33ujhgtaab60oiu'
    ];
}
