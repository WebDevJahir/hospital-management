<?php

namespace App\Services;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use InstallerErag\Main\EnvironmentManager as BaseEnvironmentManager;
use GuzzleHttp\Client;

class CustomEnvironmentManager extends BaseEnvironmentManager
{
    /**
     * @var string
     */
    private $envPath;

    /**
     * Set the .env and .env.example paths.
     */
    public function __construct()
    {
        $this->envPath = base_path('.env');
    }

    /**
     * Validate CodeCanyon username and purchase code.
     */
    // private function validateCodeCanyonCredentials($username, $purchaseCode)
    // {
    //     $client = new Client();
    //     try {
    //         $response = $client->request('GET', 'https://api.envato.com/v3/market/author/sale', [
    //             'headers' => [
    //                 'Authorization' => 'Bearer ' . env('ENVATO_API_TOKEN'),
    //             ],
    //             'query' => [
    //                 'code' => $purchaseCode,
    //             ],
    //         ]);

    //         $data = json_decode($response->getBody(), true);

    //         return $data && isset($data['buyer']) && $data['buyer'] === $username;
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }

    public function saveFileWizard(Request $request)
    {
        $results = 'Installer Successfully';

        // Validate CodeCanyon credentials
        // if (!$this->validateCodeCanyonCredentials($request->codecanyon_username, $request->purchase_code)) {
        //     return 'Invalid CodeCanyon username or purchase code.';
        // }

        // Get additional env variables from config
        $additionalEnv = config('install.env');

        $envFileData =
            'APP_NAME=\'' . $request->app_name . "'\n" .
            'APP_ENV=' . $request->environment . "\n" .
            'APP_KEY=' . 'base64:' . base64_encode(Str::random(32)) . "\n" .
            'APP_DEBUG=' . $request->app_debug . "\n" .
            'APP_LOG_LEVEL=' . $request->app_log_level . "\n" .
            'APP_URL=' . $request->app_url . "\n\n" .
            'DB_CONNECTION=' . $request->database_connection . "\n" .
            'DB_HOST=' . $request->database_hostname . "\n" .
            'DB_PORT=' . $request->database_port . "\n" .
            'DB_DATABASE=' . $request->database_name . "\n" .
            'DB_USERNAME=' . $request->database_username . "\n" .
            'DB_PASSWORD=' . $request->database_password . "\n\n" .
            $additionalEnv . "\n" .
            'CODECANYON_USERNAME=\'' . $request->codecanyon_username . "'\n" .
            'PURCHASE_CODE=\'' . $request->purchase_code . "'\n";

        try {
            file_put_contents($this->envPath, $envFileData);
        } catch (Exception $e) {
            $results = 'Installer Errors';
        }

        return $results;
    }
}