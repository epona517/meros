<?php
App::uses('Component', 'Controller');

class AccessComponent extends Component {


    public function isDirectAccess($that) {

        return !empty($that->request->url) && $that->referer() == '/';
    }

    public function isAccessTo($url, $accesses) {

        $ret = true;
        $accesses = is_array($accesses) ? $accesses : array($accesses);
        foreach ($accesses as $key => $val) {
            if (!$ret) {
                break;
            }
            $ret = preg_match('{' . $val . '*}i', $url);
        }
        return $ret;
    }
}