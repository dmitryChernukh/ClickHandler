<?php

namespace App\Traits;

trait GetRequestData {

    protected function obtainingNecessaryData ($request) {
        $user_agent = $request->server('HTTP_USER_AGENT');
        $ip = $request->server('REMOTE_ADDR');
        $ref = $request->server('HTTP_REFERER');
        $param1 = $request->get('param1');
        $param2 = $request->get('param2');
        return compact('user_agent', 'ip', 'ref', 'param1', 'param2');
    }
}