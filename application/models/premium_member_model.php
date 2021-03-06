<?php
/**
* Class and Function List:
* Function list:
* - __construct()
* - registerPremiumUser()
* - isPremiumUser()
* Classes list:
* - Premium_Member_Model extends CI_Model
*/
class Premium_Member_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model(array('auth_model'));
    }

    public function registerPremiumUser($userId)
    {
        return $this->db->query('UPDATE `users` SET `premium`=1 WHERE `id`=?', array($userId));
    }

    public function isPremiumUser($userId)
    {
        return (count($this->db->query('SELECT * FROM `users` WHERE `id`=? AND `premium`=1 LIMIT 1', array($userId))->result()) > 0);
    }
}
?>
