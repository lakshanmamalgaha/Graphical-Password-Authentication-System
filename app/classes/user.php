<?php

class USER{

  private $_db,
    $_data,
    $_isLoggedIn;

public function __construct($user = null)
{
  $this->_db = DB::getInstance();
}


public function create($fields = array())
{
  if(!$this->_db->queryNormal($sql))
  {
    throw new Exception("Problem Creating customer Account");

  }
}

/*

public function login($email = null, $password = null)
{
  if(!$email && !$password && $this->exists())
  {
    Session::put($this->_sessionName, $this->data()->uid);
  }
  else{
    $customer = $this->find($email);

    if($customer)	{
      if(password_verify($password,$this->data()->password))	{
        Session::put($this->_sessionName, $this->data()->id);

        return true;
      }
    }
  }
  return false;
}


public function exists()
{
  return (!empty($this->_data)) ? true : false;
}

public function logout()
{
//	$this->_db->delete('customers_session', array('customer_id', '=', $this->data()->id));

  Session::delete($this->_sessionName);
  //Cookie::delete($this->_cookieName);
}

public function data()
{
  return $this->_data;
}

public function isLoggedIn()
{
  return $this->_isLoggedIn;
}
*/
}

 ?>
