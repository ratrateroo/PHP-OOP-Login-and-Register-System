<?php 
class User {
    private $_db,
            $_data,
            $_sessionName;

    public function __construct($user = null) {
        $this->_db = DB::getInstance();
        
        $this->_sessionName = Config::get('session/session_name');
    }

    public function create($fields = array()) {
        if(!$this->_db->insert('users',$fields)) {
            throw new Exception('There was a problem creating an account.');
        }
    }

    public function find($user = null) {
        if($user) {
            $field = (is_numeric($user)) ? 'id' : 'username';
            $data = $this->_db->get('users', array($field, '=', $user));

            if($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }
    public function login($username = null, $password = null) {
        $user = $this->find($username);
        print_r($this->_data);

        echo '<p> id: '.$this->data()->id . '</p><br>';
        echo '<p> username: '.$this->data()->username . '</p><br>';
        echo '<p> password: '.$this->data()->password . '</p><br>';
        echo '<p> salt: '.$this->data()->salt . '</p><br>';
        echo '<p> name: '.$this->data()->name . '</p><br>';
        echo '<p> joined: '.$this->data()->joined . '</p><br>';
        echo '<p> group: '.$this->data()->group . '</p><br>';
        echo '<p> Hash: '.Hash::make($password, $this->data()->salt) . '</p><br>';
        if($user) {
            if($this->data()->password === Hash::make($password, $this->data()->salt)) {
                Session::put($this->_sessionName, $this->data()->id);
                return true;
            }
        }
        return false;
    }

    private function data() {
        return $this->_data;
    }
}
?>