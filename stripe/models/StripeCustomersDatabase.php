<?php
class StripeCustomersDatabase
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insertCustomer($customerData)
    {
        try {
            $query = "INSERT INTO stripe_customers (session_id, price, discount, final_price, customer_name, customer_email, customer_country, customer_tax, payment_status, coupon_id, coupon_name, event_name, event_phase, ticket_name, ticket_price_id)
                VALUES (
                    '{$customerData['session_id']}',
                    '{$customerData['price']}',
                    '{$customerData['discount']}',
                    '{$customerData['final_price']}',
                    '{$customerData['customer_name']}',
                    '{$customerData['customer_email']}',
                    '{$customerData['customer_country']}',
                    '{$customerData['tax_id']}',
                    '{$customerData['payment_status']}',
                    '{$customerData['coupon_id']}',
                    '{$customerData['coupon_name']}',
                    '{$customerData['event_name']}',
                    '{$customerData['event_phase']}',
                    '{$customerData['ticket_name']}',
                    '{$customerData['ticket_price_id']}'
                )";

            if ($this->db->query($query)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            $errorMessage = json_encode(["insertCustomer", $e->getMessage()]);
            http_response_code(500);
            throw new Exception($errorMessage);
        }
    }

    public function getCustomerByEmail($email)
    {
        try {
            $query = "SELECT * FROM stripe_customers WHERE customer_email = '{$email}' LIMIT 1";
            $result = $this->db->query($query);

            $customers = $result->fetchAll();

            if (!empty($customers)) {
                return $customers[0];
            } else {
                return null;
            }
        } catch (Exception $e) {
            $errorMessage = json_encode(["getCustomerByEmail", $e->getMessage()]);
            http_response_code(500);
            throw new Exception($errorMessage);
        }
    }
}
