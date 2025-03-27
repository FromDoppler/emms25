<?php

class RegisteredDatabase
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insertRegistered($registeredData)
    {
        try {
            $query = "INSERT INTO registered (register, phase, email, firstname, lastname, country, phone, company, jobPosition, ecommerce, `ecommerce-vip`, `digital-trends`, `digital-trends-vip`, source_utm, medium_utm, campaign_utm, content_utm, term_utm)
                VALUES (
                    '{$registeredData['register']}',
                    '{$registeredData['phase']}',
                    '{$registeredData['email']}',
                    '{$registeredData['firstname']}',
                    '{$registeredData['lastname']}',
                    '{$registeredData['country']}',
                    '{$registeredData['phone']}',
                    '{$registeredData['company']}',
                    '{$registeredData['jobPosition']}',
                    '{$registeredData['ecommerce']}',
                    '{$registeredData['ecommerce-vip']}',
                    '{$registeredData['digital-trends']}',
                    '{$registeredData['digital-trends-vip']}',
                    '{$registeredData['source_utm']}',
                    '{$registeredData['medium_utm']}',
                    '{$registeredData['campaign_utm']}',
                    '{$registeredData['content_utm']}',
                    '{$registeredData['term_utm']}'
                )";

            if ($this->db->query($query)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            $errorMessage = json_encode(["insertRegistered", $e->getMessage()]);
            http_response_code(500);
            throw new Exception($errorMessage);
        }
    }

    public function updateEcommerceVIPByEmail($email)
    {
        try {
            $query = "UPDATE registered SET `ecommerce-vip` = 1 WHERE email = '{$email}'";
            if ($this->db->query($query)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            $errorMessage = json_encode(["updateEcommerceVIPByEmail", $e->getMessage()]);
            http_response_code(500);
            throw new Exception($errorMessage);
        }
    }

    public function updateDTVIPByEmail($email)
    {
        try {
            $query = "UPDATE registered SET `digital-trends-vip` = 1 WHERE email = '{$email}'";
            if ($this->db->query($query)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            $errorMessage = json_encode(["updateDTVIPByEmail", $e->getMessage()]);
            http_response_code(500);
            throw new Exception($errorMessage);
        }
    }

    public function getRegisteredByEmail($email)
    {
        try {
            $query = "SELECT * FROM registered WHERE email = '{$email}'";
            $result = $this->db->query($query);
            return $result->fetchAll();
        } catch (Exception $e) {
            $errorMessage = json_encode(["getRegisteredByEmail", $e->getMessage()]);
            http_response_code(500);
            throw new Exception($errorMessage);
        }
    }

    public function insertAutomatedRegistered($registeredData)
    {
        try {
            $currentDate = date('Y-m-d h:i:s A');
            $ecommerceValue = ($registeredData['event_name'] === 'ecommerce') ? 1 : 0;
            $DTValue = ($registeredData['event_name'] === 'digital-trends') ? 1 : 0;
            $query = "INSERT INTO registered (register, phase, email, firstname, lastname, country, phone, company, jobPosition, ecommerce, `ecommerce-vip`, `digital-trends`, `digital-trends-vip`, source_utm, medium_utm, campaign_utm, content_utm, term_utm)
                VALUES (
                    '{$currentDate}',
                    '{$registeredData['event_phase']}',
                    '{$registeredData['customer_email']}',
                    '{$registeredData['customer_name']}',
                    '',
                    '{$registeredData['customer_country']}',
                    '',
                    '',
                    '',
                    '{$ecommerceValue}',
                    '{$ecommerceValue}',
                    '{$DTValue}',
                    '{$DTValue}',
                    'automated_stripe',
                    'automated_stripe',
                    'automated_stripe',
                    'automated_stripe',
                    'automated_stripe'
                )";

            if ($this->db->query($query)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            $errorMessage = json_encode(["insertRegistered", $e->getMessage()]);
            http_response_code(500);
            throw new Exception($errorMessage);
        }
    }
}
