<?php
class CustomerModel extends Model
{
    public function __construct()
    {
        // echo "events model";
    }

    public function getAllCustomer()
    {
        $data = $this->Select("SELECT * FROM customers");
        return $data;
    }

    public function getAllCustomerWithCondition($condition)
    {
        $data = $this->Select("SELECT * FROM customers WHERE " . $condition);
        return $data;
    }

    public function detailCustomer($id)
    {
        $sql = 'SELECT * from customers WHERE  customer_id = ' . $id;
        $detail = $this->Select($sql);
        return $detail;
    }


    public function addCustomer()
    {
        $filterAll = filter();
        $filterAll['created_at'] = date('Y/m/d');
        $filterAll['updated_at'] = null;
        $addStatus = $this->Insert('customers', $filterAll);
        if ($addStatus)
            return true;
        return false;
    }

    public function deleteCustomer($id)
    {
        $condition = 'customer_id = ' . $id;
        $deleteStatus = $this->Delete('customers', $condition);
        if ($deleteStatus)
            return true;
        return false;
    }

    public function updateCustomer($id)
    {
        $filterAll = filter();
        $filterAll['updated_at'] = date('Y/m/d');
        $condition = 'customer_id = ' . $id;
        $updateStatus = $this->Update('customers', $filterAll, $condition);
        if ($updateStatus)
            return true;
        return false;
    }
}
?>