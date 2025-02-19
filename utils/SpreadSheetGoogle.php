<?php
require_once 'spread/write.php';

class SpreadSheetGoogle
{
    const RANGE = 'A1:R1';

    public static function write($idSpreadSheet, $user, $db)
    {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $values = array(
            array(
                date('h:i:s A'),
                date('d-m-Y'),
                $user['promotions'],
                $user['privacy'],
                $user['firstname'] . " ",
                $user['email'],
                $user['source_utm'] . " ",
                $user['medium_utm'] . " ",
                $user['campaign_utm'] . " ",
                $user['content_utm'] . " ",
                $user['term_utm'] . " ",
                $user['origin'] . " ",
                $user['country_ip'] . " ",
                $user['ecommerce'] . " ",
                $user['digital_trends'] . " ",
                $user['phone'] . " ",

            )
        );

        $stripeValues = self::getStripeValues($user);
        if ($stripeValues) {
            $values[0] = array_merge($values[0], $stripeValues);
        }
        write_to_sheet($idSpreadSheet, self::RANGE, $values, $db);
    }
    private static function getStripeValues($user)
    {
        if (!isset($user['stripe']) || !is_array($user['stripe'])) {
            return null;
        }

        return array(
            $user['stripe']['price'] . " ",
            $user['stripe']['discount'] . " ",
            $user['stripe']['final_price'] . " ",
            $user['stripe']['customer_name'] . " ",
            $user['stripe']['customer_email'] . " ",
            $user['stripe']['customer_country'] . " ",
            $user['stripe']['tax_id'] . " ",
            $user['stripe']['payment_status'] . " ",
            $user['stripe']['coupon_id'] . " ",
            $user['stripe']['coupon_name'] . " ",
            $user['stripe']['event_name'] . " ",
            $user['stripe']['event_phase']  . " ",
            $user['stripe']['ticket_name']  . " ",
            $user['stripe']['ticket_price_id']  . " ",
        );
    }
}
