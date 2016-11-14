<?php

namespace App\Modules;

use App\Models\Click;

class ClickHandler {

    /**
     * @var
     */
    protected $user_agent;

    /**
     * @var
     */
    protected $ip;

    /**
     * @var
     */
    protected $ref;

    /**
     * @var
     */
    protected $param1;

    /**
     * @var
     */
    protected $param2;

    /**
     * @var
     */
    protected $clickID;

    /**
     * @var bool
     */
    protected $status = false;

    public function __construct(array $data){
        $this->user_agent = $data['user_agent'];
        $this->ip = $data['ip'];
        $this->ref = $data['ref'];
        $this->param1 = $data['param1'];
        $this->param2 = $data['param2'];
    }

    /**
     * When the data is ready, start the creation of a new clique.
     */
    public function run () {
        $this->newClick();
    }

    protected function newClick () {

        if(!$click = Click::getBunchOfUniqueData(get_object_vars($this))){

            //create a new entity
            $id = Click::getAutoIncrementValue();
            $newClick = new Click();
            $newClick->id = $id;
            $newClick->ua = $this->user_agent;
            $newClick->ip = $this->ip;
            $newClick->ref = $this->ref;
            $newClick->param1 = $this->param1;
            $newClick->param2 = $this->param2;

            $newClick->save();
            $this->setClickID($id);
            $this->setStatus(true);
        } else {
            $this->setClickID($click->id);
            $click->error++;
            $click->save();
        }
    }

    /**
     * @param $id
     */
    protected function setClickID ($id) {
        $this->clickID = $id;
    }

    /**
     * @param $status
     */
    protected function setStatus ($status) {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getClickID () {
        return $this->clickID;
    }

    /**
     * @return bool
     */
    public function getStatus () {
        return $this->status;
    }

}