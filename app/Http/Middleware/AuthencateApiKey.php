<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Chrisbjr\ApiGuard\Events\ApiKeyAuthenticated;
use Chrisbjr\ApiGuard\Models\Device;
use Closure;

/**
 * Class AuthencateApiKey
 *
 * @package App\Http\Middleware
 */
class AuthencateApiKey
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
        $apiKeyValue = $request->header(config('apiguard.header_key', 'X-Authorization'));

        $apiKey = app(config('apiguard.models.api_key', 'Chrisbjr\ApiGuard\Models\ApiKey'))
            ->where('key', $apiKeyValue)
            ->where('blocked', 'N')
            ->first();

        if (empty($apiKey)) {
            return $this->unauthorizedResponse();
        }

        // Update this api key's last_used_at and last_ip_address
        $apiKey->update([
            'last_used_at'    => Carbon::now(),
            'last_ip_address' => $request->ip(),
        ]);

        $apikeyable = $apiKey->apikeyable;

        // Bind the user or object to the request
        // By doing this, we can now get the specified user through the request object in the controller using:
        // $request->user()
        $request->setUserResolver(function () use ($apikeyable) {
            return $apikeyable;
        });

        // Attach the apikey object to the request
        $request->apiKey = $apiKey;

        event(new ApiKeyAuthenticated($request, $apiKey));
        return $next($request);
    }

    /**
     * The response when the request is unauthorized.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    protected function unauthorizedResponse()
    {
        return response([
            'error' => [
                'code'      => '401',
                'http_code' => 'GEN-UNAUTHORIZED',
                'message'   => 'Unauthorized.',
            ],
        ], 401);
    }
}
