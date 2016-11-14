<?php

namespace App\Http\Controllers\Click;

use App\Models\Click;
use App\Traits\GetRequestData;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Modules\ClickHandler;
use Validator;

/**
 * Class ClickController
 * @package App\Http\Controllers\Click
 */
class ClickController extends Controller {

    use GetRequestData;

    /**
     * @var bool
     */
    public $errors = false;

    public $remote = null;

    public function mainHandler (Request $request) {

        $validator = Validator::make($request->all(), [
            'param1' => 'required',
            'param2' => 'required',
        ]);

        if ($validator->fails()) {
            $this->errors = $validator->errors();
            return view('helper', ['errors' => $this->errors->all()]);
        } else {
            $click = new ClickHandler($this->obtainingNecessaryData($request));

            $click->run();

            if($click->getStatus()){
                return Redirect::route('success', array('MESSAGE' => str_replace(' ','_','We have successfully clicked on the link.'),'ID_CLICK' => $click->getClickID()));
            } else {
                return Redirect::route('error', array('MESSAGE' => str_replace(' ','_','Unfortunately, you have already pressed on this link.'),'ID_CLICK' => $click->getClickID()));
            }
        }
    }

    public function success ($ID_CLICK, $MESSAGE) {
        return view('helper', ['success' => [ str_replace('_',' ',$MESSAGE) . 'ID - '.$ID_CLICK ]]);
    }

    /**
     * @param $ID_CLICK
     * @param $MESSAGE
     * @return mixed
     */
    public function error ($ID_CLICK, $MESSAGE) {
        $contents = view('helper', ['errors' => [ str_replace('_',' ',$MESSAGE) . 'ID - '.$ID_CLICK]]);
        $response = \Illuminate\Support\Facades\Response::make($contents, 200);
        if($MESSAGE == 'Blacklist-ban'){
            $response->header('refresh','5;url=http://google.com');
        };
        return $response;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function makeTable () {
        return view('table', ['clikers' => Click::all()]);
    }


}
