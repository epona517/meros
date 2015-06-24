<?php
App::uses('Component', 'Controller');

class MessageComponent extends Component {
    public $components = array('Session');

    public function setMessage($key, $message) {

        $this->Session->setFlash(
            $message
            // Elements file name
            , 'flash_message'
            , array('messageTitle' => $key)
            // key for call flashMessage
            , 'flashMessage'
        );
    }
}