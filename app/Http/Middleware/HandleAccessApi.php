<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\HandleErrorApi;

class HandleAccessApi
{
    use HandleErrorApi;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $routerName = $request->route()->getName();
        switch ($routerName) {
            case 'api.admin.notify.create':
                if(!auth()->user()->can('create-notify')) {
                    return $this->respondErr('Forbidden', 403);
                }
                break;
            case 'api.admin.notify.list':
                if(!auth()->user()->can('list-notify')) {
                    return $this->respondErr('Forbidden', 403);
                }
                break;
            case 'api.admin.notify.store':
                if(!auth()->user()->can('store-notify')) {
                    return $this->respondErr('Forbidden', 403);
                }
                break;
            
            default:
                # code...
                break;
        }
        return $next($request);
    }
}
