<?php
date_default_timezone_set('Asia/Jakarta');
class database{
    var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "counting";
	var $koneksi = "";
	function __construct(){
        $host = "localhost";
        $dbname = "counting";
        $username = "root";
        $password = "";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
	}
 
	function add_users($name,$username,$password,$id)
	{
        $data = $this->db->prepare('INSERT INTO users (nama,username,password,insert_by,update_by,insert_at,update_at) VALUES (?, ?, ?,?, ?, ?,?)');
        $date = date('Y-m-d');
        $password = md5($password);
        $data->bindParam(1, $name);
        $data->bindParam(2, $username);
        $data->bindParam(3, $password);
        $data->bindParam(4, $id);
        $data->bindParam(5, $id);
        $data->bindParam(6, $date);
        $data->bindParam(7, $date);

        $data->execute();
        return $data->rowCount();
    }
    
    function Login($username,$password)
    {
        $password =md5($password);
        $query = $this->db->prepare("SELECT * FROM users WHERE username =? and password =?");
        $query->bindParam(1, $username);
        $query->bindParam(2, $password);
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    function createTrx($reference,$payment_method,$customer_name,$customer_email,$customer_phone,$amount,$fee,$is_customer_fee,
    $amount_received,$pay_code,$status,$expired_time,$order_items= array(),$insert_by,$update_by,$insert_at,$update_at)
    {
        $data = $this->db->prepare('INSERT INTO transaction(reference, payment_method, customer_name, customer_email, customer_phone, amount, fee, is_customer_fee, amount_received, pay_code, status, expired_time, order_items, insert_by, update_by, insert_at, update_at) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $date = date('Y-m-d');
        $data->bindParam(1, $reference);
        $data->bindParam(2, $payment_method);
        $data->bindParam(3, $customer_name);
        $data->bindParam(4, $customer_email);
        $data->bindParam(5, $customer_phone);
        $data->bindParam(6, $amount);
        $data->bindParam(7, $fee);
        $data->bindParam(8, $is_customer_fee);
        $data->bindParam(9, $amount_received);
        $data->bindParam(10, $pay_code);
        $data->bindParam(11, $status);
        $data->bindParam(12, $expired_time);
        $data->bindParam(13, $order_items);
        $data->bindParam(14, $insert_by);
        $data->bindParam(15, $update_by);
        $data->bindParam(16, $insert_at);
        $data->bindParam(17, $update_at);
        $data->execute();
        return $data->rowCount();
    }

    function getTrxUnpaid(Type $var = null)
    {
        $query = $this->db->prepare("select * FROM transaction WHERE insert_at >='".date('Y-m-d 00:00:00')."' and insert_at <='".date('Y-m-d 23:59:59')."'");
        $query->bindParam(1, $username);
        $query->bindParam(2, $password);
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    function updateStatusTrx($ref,$status)
    {
        $query = $this->db->prepare("update transaction set status=? where reference=?");
        
        $query->bindParam(1, $status);
        $query->bindParam(2, $ref);
        
 
        $query->execute();
        return $query->rowCount();
    }
    function getPenjualan()
    {
        $query = $this->db->prepare("select * FROM transaction WHERE status ='UNPAID'");
        $query->bindParam(1, $username);
        $query->bindParam(2, $password);
        $query->execute();
        $data = $query->fetchAll();
        date('Y-m', strtotime(date('Y-m') . ' -1 month'));
        $hasil = array();
        foreach ($data as $item) {
            if(substr($item['insert_at'],0,7) == date('Y-m', strtotime(date('Y-m') . ' -1 month'))){
                if(!isset($hasil['bKemarin'])){
                    $hasil['bKemarin'] = $item['amount_received'];
                }else{
                    $hasil['bKemarin'] = $hasil['bKemarin'] + $item['amount_received'];
                }
            }else{
                $hasil['bKemarin'] = 0;
            }
            if(substr($item['insert_at'],0,7) == date('Y-m')){
                if(!isset($hasil['bIni'])){
                    $hasil['bIni'] = $item['amount_received'];
                }else{
                    $hasil['bIni'] = $hasil['bIni'] + $item['amount_received'];
                }
            }else{
                $hasil['bIni'] = 0;
            }
            if(substr($item['insert_at'],0,10) == date('Y-m-d',strtotime(date('Y-m-d') . ' -1 days'))){
                if(!isset($hasil['hKemarin'])){
                    $hasil['hKemarin'] = $item['amount_received'];
                }else{
                    $hasil['hKemarin'] = $hasil['hKemarin'] + $item['amount_received'];
                }
            }else{
                $hasil['hKemarin'] = 0;
            }
            if(substr($item['insert_at'],0,10) == date('Y-m-d')){
                if(!isset($hasil['hIni'])){
                    $hasil['hIni'] = $item['amount_received'];
                }else{
                    $hasil['hIni'] = $hasil['hIni'] + $item['amount_received'];
                }
            }else{
                $hasil['hIni'] = 0;
            }
        }

        return $hasil;
    }
    
}


?>