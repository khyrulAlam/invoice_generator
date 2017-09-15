<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 8/6/2017
 * Time: 9:47 PM
 */
class Welcome_Model extends CI_Model
{

    public function check_user($user, $pass){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_email',$user);
        $this->db->where('user_password',md5($pass));
        $query = $this->db->get();
        $result = $query->row();
        return $result;

    }


}