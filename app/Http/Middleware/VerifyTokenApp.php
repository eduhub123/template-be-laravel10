<?php

namespace App\Http\Middleware;

// use App\Models\Globals\Users;
use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
use Illuminate\Http\Request;
// use App\Services\RedisService;
use App\Http\Responses\ApiResponse;

class VerifyTokenApp
{
    private $redisService;

    // public function __construct(
    //     RedisService $redisService
    // ) {
    //     $this->redisService = $redisService;
    // }

    public function handle($request, Closure $next, $guard = null)
    {
        $user = $this->verifyToken($request);

        if (!$user) {
            return ApiResponse::unAuthenticated(null, 'Permission denied');
        }

        $request->attributes->add(['user' => $user]);
        $request->auth = $user;

        return $next($request);
    }

    // private function hasExpiredToken($user, $token)
    // {
    //     $keyExpired       = Users::KEY_REDIS_USER_REGISTER_TIME_EXPIRED . $user['id'];
    //     $keyFirstLogin    = Users::KEY_REDIS_FIRST_LOGIN . $token;
    //     $timeDuringSystem = $user['time_during_system'] ?? 60;

    //     if (!$this->redisService->get($keyFirstLogin)) {
    //         $this->redisService->set($keyFirstLogin, ['loggedIn' => true], 60 * 60 * 24);
    //         $this->redisService->set($keyExpired, ['active' => true], $timeDuringSystem * 60);
    //         return false;
    //     }
    //     if (!$this->redisService->get($keyExpired)) {
    //         return true;
    //     }
    //     $this->redisService->set($keyExpired, ['active' => true], $timeDuringSystem * 60);
    //     return false;
    // }

    public function verifyToken(Request $request)
    {
        $token = $request->header('token');

        if (!$token) {
            $token = $request->input('token');
        }

        if (!$token || $token == 'null') {
            return false;
        }
        if ($token === env('TOKEN_TO_SERVER')) {
            return true;
        }

        try {
            $decode_token = JWT::decode($token, new Key(env('KEY_TOKEN'), 'HS256'));
        } catch (ExpiredException $e) {
            return false;
        } catch (Exception $e) {
            dd($e);
            return false;
        }
        $user = (array) $decode_token;

        // if ($this->hasExpiredToken($user, $token) && $token !== env('TOKEN_TO_SERVER')) {
        //     return false;
        // }
        return $user;
    }
}
