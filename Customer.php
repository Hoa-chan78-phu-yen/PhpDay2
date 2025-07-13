<?php
class Customer {
    public $id;
    public $username;
    public $password;
    public $fullname;
    public $address;
    public $phone;
    public $gender;
    public $birthday;

    public function __construct($id, $username, $password, $fullname, $address, $phone, $gender, $birthday) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->fullname = $fullname;
        $this->address = $address;
        $this->phone = $phone;
        $this->gender = $gender;
        $this->birthday = $birthday;
    }
}
?>
