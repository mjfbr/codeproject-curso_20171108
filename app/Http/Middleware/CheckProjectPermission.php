<?php

namespace CodeProject\Http\Middleware;

use Closure;
use CodeProject\Services\ProjectService;
use Illuminate\Support\Facades\Response;

class CheckProjectPermission {

	/**
	 * @var ProjectService
	 */
	private $service;

	public function __construct(ProjectService $service) {

		$this->service = $service;
	}

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */	
    public function handle($request, Closure $next) {

    	//$projectId = $request->route('id');
    	$projectId = $request->route('id') ? $request->route('id') : $request->route('project');
    	if ($this->service->checkProjectPermissions($projectId) == false) {
    		return ['error' => 'You have no permission to access this project'];
    	}
    	return $next($request);
    }
}