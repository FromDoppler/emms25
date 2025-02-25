<?php


function write_to_sheet($spreadsheetId, $range, $values, $db) {

    require_once ('config.php');
    $arr_token = (array) $db->google_oauth_get_access_token();
    $accessToken = array(
        'access_token' => $arr_token['access_token'],
        'expires_in' => $arr_token['expires_in'],
    );
    $client = new Google_Client();
    $client->setAccessToken($accessToken);
    $service = new Google_Service_Sheets($client);

    try {

        $body = new Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);
        $params = [
            'valueInputOption' => 'USER_ENTERED'
        ];

        $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);
    } catch (Exception $e) {
        if (401 == $e->getCode()) {
            $refresh_token = $db->google_oauth_get_refersh_token();
            $client = new GuzzleHttp\Client(['base_uri' => 'https://accounts.google.com']);
            $response = $client->request('POST', '/o/oauth2/token', [
                'form_params' => [
                    "grant_type" => "refresh_token",
                    "refresh_token" => $refresh_token,
                    "client_id" => $GOOGLE_CLIENT_ID,
                    "client_secret" => $GOOGLE_CLIENT_SECRET,
                ],
            ]);

            $data = (array) json_decode($response->getBody());
            $data['refresh_token'] = $refresh_token;
            $db->google_oauth_update_access_token(json_encode($data));
            write_to_sheet($spreadsheetId, $range, $values, $db);
        } else {
            $error = json_decode($e->getMessage()); //print the error just in case your data is not added.
            throw new Exception($error->error->message);

        }
    }
}
