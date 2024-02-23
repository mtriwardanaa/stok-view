<?php

namespace App\Lib;

use GuzzleHttp\Client;

class ClientHttp
{
    private $uri;
    private $client;

    public function __construct()
    {
        $this->uri = config('http.app_api_url');
        $this->client = new Client();
    }

    public function postLogin($request)
    {
        $client = new Client;
        $content = array(
            'headers' => [
                'Accept'          => 'application/json',
                'Content-Type'    => 'application/json',
                'ip-address-view' => $_SERVER["REMOTE_ADDR"],
                'user-agent-view' => $_SERVER['HTTP_USER_AGENT'],
            ],
            'json'    => [
                'grant_type'    => 'password',
                'client_id'     => env('PASSWORD_CREDENTIAL_ID'),
                'client_secret' => env('PASSWORD_CREDENTIAL_SECRET'),
                'username'      => $request['username'],
                'password'      => $request['password'],
            ]
        );

        try {
            $response = $client->request('POST', $this->uri . 'api/v1/tokens', $content);
            return json_decode($response->getBody(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            try {
                if ($e->getResponse()) {
                    $response = $e->getResponse()->getBody()->getContents();
                    $error = json_decode($response, true);
                    if (!$error) {
                        return $e->getResponse()->getBody();
                    } else {
                        return ['status' => false, 'messages' => [0 => $error['message'] ?? $error]];
                    }
                } else {
                    return ['status' => false, 'messages' => [0 => 'Check your internet connection.']];
                }

            } catch (\Exception $e) {
                return ['status' => false, 'messages' => [0 => 'Check your internet connection.']];
            }
        }
    }

    public function get(string $url)
    {
        $client = new Client;
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5YjYzZWIxMS0yNTQ2LTQ0OWEtOWVlMi1jYzM2OTFjOTczNzQiLCJqdGkiOiIzMDRhYzBiYzQ4NTI5ODhjMjVlMzRlNTg1YjJiY2VkNjRiMjU5MWYyYTUwMjA2YjVlMTgxYWIzNmNlODI3MTQwMjUxMzczZTQyNDk1ZjYxMyIsImlhdCI6MTcwODY1NjI5Ny4yODU4NSwibmJmIjoxNzA4NjU2Mjk3LjI4NTg1NiwiZXhwIjoxNzA4NzQyNjk2Ljg3NTk4Miwic3ViIjoiMDFocTY1ZWpzZGt2MjBtY252M3lqbWd5d3oiLCJzY29wZXMiOlsiZ29vZHMuaW5kZXgiLCJnb29kcy5jcmVhdGUiLCJnb29kcy51cGRhdGUiLCJnb29kcy5kZWxldGUiLCJnb29kcy52aWV3Il19.Vl4hNx0bxSbTdJvV8cYTix1ssri_MX-4hsTp9fSTt0XqdtrfdvDkyBxyIwXsZEKTHxc-JrazzQT71Wjm1gkUqvT7tL6WpA4oLriHysRhiabcl2AFl7pHOpF-YgWftnCqUE9-oeJroY9lZDDJFSJhF5JHci5JwWF99F7cf5EoduJBmg27twzGB5MoqzR2AL6LpIRsGCIQC9kCZ-eosoHlFP9zuINzooc0jVqtieT1FTKQxYjHruVv8onnJJmk5J-znyzc7aVuf3zJZuS-VBAgmhicwyRiId1zMEhvOIIKIP4fOsfMxx6LLC_BMN1am3uxggswl9FWF2IL0HXE6asdcuaLRuskVuwIHRO4lOkZkVWc0-AhvOG7_NQ8mEIui0v3EpG2_1sFiLz1OUUFpEOMbCTUOjDk22_PVBRN3dEoD-zC106KxCOI7ikCHHbsd5gwe5atOF4vOjdL2rZrqxLnntlSl9_iM0TxFqXm8IypKVaW3EsvwgeOZt8Ms-6E6MaiKWO19DwFptv_kqDoGCaqrA6vq08MKuMuGOz_zAJKG1A_9567v7ogm125joaUORLdhjvRU5fyoR54LbxTcySQlK21gkfE3U-hB05wcQN6lq2EcYOlNttgdpWPE2ijZHwcFuzB7Z2CNCtfoADvOpYOjpvSCw5Mr_fkKk6iuxi-euQ';
        $content = array(
            'headers' => [
                'Authorization'   => 'Bearer ' . $token,
                'Accept'          => 'application/json',
                'Content-Type'    => 'application/json',
                'ip-address-view' => $_SERVER["REMOTE_ADDR"],
                'user-agent-view' => $_SERVER['HTTP_USER_AGENT'],
            ]
        );

        try {
            $response = $client->request('GET', $this->uri . 'api/' . $url, $content);
            return json_decode($response->getBody(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            try {
                if ($e->getResponse()) {
                    $response = $e->getResponse()->getBody()->getContents();
                    $error = json_decode($response, true);
                    if (!$error) {
                        return $e->getResponse()->getBody();
                    } else {
                        return ['status' => false, 'messages' => [0 => $error['message'] ?? $error]];
                    }
                } else {
                    return ['status' => false, 'messages' => [0 => 'Check your internet connection.']];
                }

            } catch (\Exception $e) {
                return ['status' => false, 'messages' => [0 => 'Check your internet connection.']];
            }
        }
    }

    public function post(string $url, array $payload)
    {
        $client = new Client;
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5YjYzZWIxMS0yNTQ2LTQ0OWEtOWVlMi1jYzM2OTFjOTczNzQiLCJqdGkiOiIzMDRhYzBiYzQ4NTI5ODhjMjVlMzRlNTg1YjJiY2VkNjRiMjU5MWYyYTUwMjA2YjVlMTgxYWIzNmNlODI3MTQwMjUxMzczZTQyNDk1ZjYxMyIsImlhdCI6MTcwODY1NjI5Ny4yODU4NSwibmJmIjoxNzA4NjU2Mjk3LjI4NTg1NiwiZXhwIjoxNzA4NzQyNjk2Ljg3NTk4Miwic3ViIjoiMDFocTY1ZWpzZGt2MjBtY252M3lqbWd5d3oiLCJzY29wZXMiOlsiZ29vZHMuaW5kZXgiLCJnb29kcy5jcmVhdGUiLCJnb29kcy51cGRhdGUiLCJnb29kcy5kZWxldGUiLCJnb29kcy52aWV3Il19.Vl4hNx0bxSbTdJvV8cYTix1ssri_MX-4hsTp9fSTt0XqdtrfdvDkyBxyIwXsZEKTHxc-JrazzQT71Wjm1gkUqvT7tL6WpA4oLriHysRhiabcl2AFl7pHOpF-YgWftnCqUE9-oeJroY9lZDDJFSJhF5JHci5JwWF99F7cf5EoduJBmg27twzGB5MoqzR2AL6LpIRsGCIQC9kCZ-eosoHlFP9zuINzooc0jVqtieT1FTKQxYjHruVv8onnJJmk5J-znyzc7aVuf3zJZuS-VBAgmhicwyRiId1zMEhvOIIKIP4fOsfMxx6LLC_BMN1am3uxggswl9FWF2IL0HXE6asdcuaLRuskVuwIHRO4lOkZkVWc0-AhvOG7_NQ8mEIui0v3EpG2_1sFiLz1OUUFpEOMbCTUOjDk22_PVBRN3dEoD-zC106KxCOI7ikCHHbsd5gwe5atOF4vOjdL2rZrqxLnntlSl9_iM0TxFqXm8IypKVaW3EsvwgeOZt8Ms-6E6MaiKWO19DwFptv_kqDoGCaqrA6vq08MKuMuGOz_zAJKG1A_9567v7ogm125joaUORLdhjvRU5fyoR54LbxTcySQlK21gkfE3U-hB05wcQN6lq2EcYOlNttgdpWPE2ijZHwcFuzB7Z2CNCtfoADvOpYOjpvSCw5Mr_fkKk6iuxi-euQ';
        $content = array(
            'headers' => [
                'Authorization'   => 'Bearer ' . $token,
                'Accept'          => 'application/json',
                'Content-Type'    => 'application/json',
                'ip-address-view' => $_SERVER["REMOTE_ADDR"],
                'user-agent-view' => $_SERVER['HTTP_USER_AGENT'],
            ],
            'json'    => (array) $payload
        );

        try {
            $response = $client->request('POST', $this->uri . 'api/' . $url, $content);
            return json_decode($response->getBody(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            try {
                if ($e->getResponse()) {
                    $response = $e->getResponse()->getBody()->getContents();
                    $error = json_decode($response, true);
                    if (!$error) {
                        return $e->getResponse()->getBody();
                    } else {
                        return ['status' => false, 'messages' => [0 => $error['message'] ?? $error]];
                    }
                } else {
                    return ['status' => false, 'messages' => [0 => 'Check your internet connection.']];
                }

            } catch (\Exception $e) {
                return ['status' => false, 'messages' => [0 => 'Check your internet connection.']];
            }
        }
    }

    public function put(string $url, array $payload)
    {
        $client = new Client;
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5YjYzZWIxMS0yNTQ2LTQ0OWEtOWVlMi1jYzM2OTFjOTczNzQiLCJqdGkiOiIzMDRhYzBiYzQ4NTI5ODhjMjVlMzRlNTg1YjJiY2VkNjRiMjU5MWYyYTUwMjA2YjVlMTgxYWIzNmNlODI3MTQwMjUxMzczZTQyNDk1ZjYxMyIsImlhdCI6MTcwODY1NjI5Ny4yODU4NSwibmJmIjoxNzA4NjU2Mjk3LjI4NTg1NiwiZXhwIjoxNzA4NzQyNjk2Ljg3NTk4Miwic3ViIjoiMDFocTY1ZWpzZGt2MjBtY252M3lqbWd5d3oiLCJzY29wZXMiOlsiZ29vZHMuaW5kZXgiLCJnb29kcy5jcmVhdGUiLCJnb29kcy51cGRhdGUiLCJnb29kcy5kZWxldGUiLCJnb29kcy52aWV3Il19.Vl4hNx0bxSbTdJvV8cYTix1ssri_MX-4hsTp9fSTt0XqdtrfdvDkyBxyIwXsZEKTHxc-JrazzQT71Wjm1gkUqvT7tL6WpA4oLriHysRhiabcl2AFl7pHOpF-YgWftnCqUE9-oeJroY9lZDDJFSJhF5JHci5JwWF99F7cf5EoduJBmg27twzGB5MoqzR2AL6LpIRsGCIQC9kCZ-eosoHlFP9zuINzooc0jVqtieT1FTKQxYjHruVv8onnJJmk5J-znyzc7aVuf3zJZuS-VBAgmhicwyRiId1zMEhvOIIKIP4fOsfMxx6LLC_BMN1am3uxggswl9FWF2IL0HXE6asdcuaLRuskVuwIHRO4lOkZkVWc0-AhvOG7_NQ8mEIui0v3EpG2_1sFiLz1OUUFpEOMbCTUOjDk22_PVBRN3dEoD-zC106KxCOI7ikCHHbsd5gwe5atOF4vOjdL2rZrqxLnntlSl9_iM0TxFqXm8IypKVaW3EsvwgeOZt8Ms-6E6MaiKWO19DwFptv_kqDoGCaqrA6vq08MKuMuGOz_zAJKG1A_9567v7ogm125joaUORLdhjvRU5fyoR54LbxTcySQlK21gkfE3U-hB05wcQN6lq2EcYOlNttgdpWPE2ijZHwcFuzB7Z2CNCtfoADvOpYOjpvSCw5Mr_fkKk6iuxi-euQ';
        $content = array(
            'headers' => [
                'Authorization'   => 'Bearer ' . $token,
                'Accept'          => 'application/json',
                'Content-Type'    => 'application/json',
                'ip-address-view' => $_SERVER["REMOTE_ADDR"],
                'user-agent-view' => $_SERVER['HTTP_USER_AGENT'],
            ],
            'json'    => (array) $payload
        );

        try {
            $response = $client->request('PUT', $this->uri . 'api/' . $url, $content);
            return json_decode($response->getBody(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            try {
                if ($e->getResponse()) {
                    $response = $e->getResponse()->getBody()->getContents();
                    $error = json_decode($response, true);
                    if (!$error) {
                        return $e->getResponse()->getBody();
                    } else {
                        return ['status' => false, 'messages' => [0 => $error['message'] ?? $error]];
                    }
                } else {
                    return ['status' => false, 'messages' => [0 => 'Check your internet connection.']];
                }

            } catch (\Exception $e) {
                return ['status' => false, 'messages' => [0 => 'Check your internet connection.']];
            }
        }
    }

    public function delete(string $url)
    {
        $client = new Client;
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5YjYzZWIxMS0yNTQ2LTQ0OWEtOWVlMi1jYzM2OTFjOTczNzQiLCJqdGkiOiIzMDRhYzBiYzQ4NTI5ODhjMjVlMzRlNTg1YjJiY2VkNjRiMjU5MWYyYTUwMjA2YjVlMTgxYWIzNmNlODI3MTQwMjUxMzczZTQyNDk1ZjYxMyIsImlhdCI6MTcwODY1NjI5Ny4yODU4NSwibmJmIjoxNzA4NjU2Mjk3LjI4NTg1NiwiZXhwIjoxNzA4NzQyNjk2Ljg3NTk4Miwic3ViIjoiMDFocTY1ZWpzZGt2MjBtY252M3lqbWd5d3oiLCJzY29wZXMiOlsiZ29vZHMuaW5kZXgiLCJnb29kcy5jcmVhdGUiLCJnb29kcy51cGRhdGUiLCJnb29kcy5kZWxldGUiLCJnb29kcy52aWV3Il19.Vl4hNx0bxSbTdJvV8cYTix1ssri_MX-4hsTp9fSTt0XqdtrfdvDkyBxyIwXsZEKTHxc-JrazzQT71Wjm1gkUqvT7tL6WpA4oLriHysRhiabcl2AFl7pHOpF-YgWftnCqUE9-oeJroY9lZDDJFSJhF5JHci5JwWF99F7cf5EoduJBmg27twzGB5MoqzR2AL6LpIRsGCIQC9kCZ-eosoHlFP9zuINzooc0jVqtieT1FTKQxYjHruVv8onnJJmk5J-znyzc7aVuf3zJZuS-VBAgmhicwyRiId1zMEhvOIIKIP4fOsfMxx6LLC_BMN1am3uxggswl9FWF2IL0HXE6asdcuaLRuskVuwIHRO4lOkZkVWc0-AhvOG7_NQ8mEIui0v3EpG2_1sFiLz1OUUFpEOMbCTUOjDk22_PVBRN3dEoD-zC106KxCOI7ikCHHbsd5gwe5atOF4vOjdL2rZrqxLnntlSl9_iM0TxFqXm8IypKVaW3EsvwgeOZt8Ms-6E6MaiKWO19DwFptv_kqDoGCaqrA6vq08MKuMuGOz_zAJKG1A_9567v7ogm125joaUORLdhjvRU5fyoR54LbxTcySQlK21gkfE3U-hB05wcQN6lq2EcYOlNttgdpWPE2ijZHwcFuzB7Z2CNCtfoADvOpYOjpvSCw5Mr_fkKk6iuxi-euQ';
        $content = array(
            'headers' => [
                'Authorization'   => 'Bearer ' . $token,
                'Accept'          => 'application/json',
                'Content-Type'    => 'application/json',
                'ip-address-view' => $_SERVER["REMOTE_ADDR"],
                'user-agent-view' => $_SERVER['HTTP_USER_AGENT'],
            ]
        );

        try {
            $response = $client->request('DELETE', $this->uri . 'api/' . $url, $content);
            return json_decode($response->getBody(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            try {
                if ($e->getResponse()) {
                    $response = $e->getResponse()->getBody()->getContents();
                    $error = json_decode($response, true);
                    if (!$error) {
                        return $e->getResponse()->getBody();
                    } else {
                        return ['status' => false, 'messages' => [0 => $error['message'] ?? $error]];
                    }
                } else {
                    return ['status' => false, 'messages' => [0 => 'Check your internet connection.']];
                }

            } catch (\Exception $e) {
                return ['status' => false, 'messages' => [0 => 'Check your internet connection.']];
            }
        }
    }
}
