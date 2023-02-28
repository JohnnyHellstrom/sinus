<?php


class Order{
  private $orderid;
  private $customerid;
  private $orderdate;
  private $shipped;

  public function __construct($orderid, $customerid, $orderdate, $shipped){
    $this->orderid = $orderid;
    $this->customerid = $customerid;
    $this->orderdate = new DateTime($orderdate);
    $this->shipped = $shipped;
  }
  public static function insertNewOrder($id){

    $conn = DB::connect();

    $sql = "INSERT INTO orders (customerid) VALUES (?) ";
   
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

      // selecting the scope_identity , last inputed into the vehiclearchive
    $lastId = $stmt->insert_id; 

    $stmt->close(); 
    $conn->close();

    return $lastId;
  }

  public static function insertIntoOrderDetails($productid, $orderid, $quantity){
    $conn = DB::connect();

    $sql = "INSERT INTO orderdetails(productid, orderid,quantity) VALUES (?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iii', $productid, $orderid, $quantity);
    $stmt->execute();

    $stmt->close();
    $conn->close();
  }

  public static function getAllOrders(){
    $conn = DB::connect();
    $result = $conn->query("SELECT * FROM orders");
    
    $allorders = array();
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $order = new Order($row['orderid'],$row['customerid'],$row['orderdate'],$row['shipped']);
        $allorders[] = $order;
      }
    }
    $conn->close();
    return $allorders;
  }

  public static function getOrdersDetails($orderid){
    $conn = DB::connect();
    $stmt = $conn->prepare("SELECT p.productid, p.title, c.colorname, od.quantity
                              From products as p
                              join colors as c on c.colorid = p.colorid
                              join orderdetails as od on od.orderdetailsid = p.productid
                              join orders as o on o.orderid = od.orderid
                              where o.orderid = ?"); 
                              
    $stmt->bind_param("i",$orderid);  
    $stmt->execute();
    $result = $stmt->get_result();                     

    $row = $result->fetch_assoc();      
    
    $conn->close();
    return $row;
  }

  public function getOrderid(){
    return $this->orderid;
  }
  public function getCustomerid(){
    return $this->customerid;
  }
  public function getOrderdate(){
    return $this->orderdate;
  }
  public function getShipped(){
    return $this->shipped;
  }

}