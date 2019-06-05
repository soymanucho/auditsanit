<?php

namespace App\Http\Middleware;

use Closure;

class AuditDetailGateKeeper
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if ($request->user()->hasRole('Auditor') && !in_array($request->audit,$request->user()->AuditorAssignedAudits())) {
          abort(403, 'Access denied');
      }


      if (($request->user()->hasRole('Cliente') || $request->user()->hasRole('Cliente gerencial'))
          && !$request->user()->ClientAssignedAudits()->contains($request->audit)) {
          abort(403, 'Access denied');
      }

        return $next($request);
    }
}
