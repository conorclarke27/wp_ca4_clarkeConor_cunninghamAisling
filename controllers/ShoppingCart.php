<?php 
class ShoppingCart extends CI_Controller {

    function add() {
        $this->load->library("cart");
        $data = array(
            "id" => $_POST["product_id"],
            "name" => $_POST["product_name"],
            "price" => $_POST["product_price"],
            "qty" => $_POST["quantity"]
        );

        
        $alert($data);
        $this->cart->insert($data);
        echo $this->view();
    }

    function view() {
        $this->load->library("cart");
        $output = '';
        $output .= '
  <h3>Shopping Cart</h3><br />
  <div class="table-responsive">
   <div align="right">
    <button type="button" id="clear_cart" class="btn btn-warning">Clear Cart</button>
   </div>
   <br />
   <table class="table table-bordered">
    <tr>
     <th width="40%">Name</th>
     <th width="15%">Quantity</th>
     <th width="15%">Price</th>
     <th width="15%">Total</th>
     <th width="15%">Action</th>
    </tr> 
    ';

        $count = 0;

        foreach ($this->cart->contents() as $items) {
            $count++;
            $output .= '
                    <tr> 
                        <td>' . $items["name"] . '</td>
                        <td>' . $items["qty"] . '</td>
                        <td>' . $items["price"] . '</td>
                        <td>' . $items["subtotal"] . '</td>
                        <td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="' . $items["rowid"] . '">Remove</button></td>
                    </tr>
                    ';                  
        }
        $output .= '
                    <tr>
                        <td colspan="4" align="right">Total</td>
                        <td>' . $this->cart->total() . '</td>
                    </tr>
                    </table>

                    </div>';

        if ($count == 0) {
            $output = '<h3 align="center">Cart is Empty</h3>';
        }
        return $output;
    }

}
?>