<?php

namespace App\Http\Middleware;
use App\Models\Click;
use App\Traits\GetRequestData;
use Illuminate\Support\Facades\Redirect;
use App\Models\BadDomain;
use Closure;

class HurdleBadDomain
{
    use GetRequestData;

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //first determine if the name on the black list
        if($domain = BadDomain::findBadDomain($this->obtainingNecessaryData($request)['ref'])){
            //then we find a bunch of unique values, if any =)
            if($click = Click::getBunchOfUniqueData($this->obtainingNecessaryData($request))){
                $click->error++;
                $click->bad_domain = true;
                $click->save();
                return Redirect::route('error', array('MESSAGE' => str_replace(' ','_','Blacklist-ban'),'ID_CLICK' => $click->id));
            }
        }
        return $next($request);
    }
}
