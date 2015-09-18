<?php
namespace Taiga;
use GuzzleHttp\Client;
use  GuzzleHttp\Psr7\Response;
class Api
{
    const LOGIN_URL = '/api/v1/auth';
    const ISSUE_URL = '/api/v1/issues';
    const PROJECT_GET_URL = 'api/v1/projects/by_slug?slug=';

    /**
     * _client
     *
     * @var Client
     */
    private $_client;

    /**
     * _token
     *
     * @var string
     */
    private $_token;

    /**
     * _authString
     *
     * @var string
     */
    private $_authString;

    /**
     * __construct
     *
     * @param string $taigaUrl
     * @return void
     */
    public function __construct($taigaUrl)
    {
        $this->_client = new Client(['base_uri' => $taigaUrl]);
    }

    /**
     * sendRequest
     *
     * @param string $url
     * @param array $data
     * @param array $headers = array
     * @return Response
     */
    public function sendRequest($url, array $data, $failMessage, array $headers = [], $method = 'POST')
    {
        try{
            $response = $this->_client->request($method, $url, [
                'headers' => $headers,
                'json' => $data 
            ]);
        } catch (\Exception $e) {
            throw new \Exception($failMessage . ':' . $response->getBody());
        }

        return $response;
    }

    /**
     * sendAuthRequest
     *
     * @param string $url
     * @param array $data
     * @param array $headers = array
     * @return Response
     */
    public function sendAuthRequest($url, array $data, $failMessage, array $headers = [], $method = 'POST')
    {
        return $this->sendRequest(
            $url,
            $data,
            $failMessage,
            array_merge(
                $headers,
                [
                    'Authorization' => $this->_authString
                ]
            ),
            $method
        );
    }
    /**
     * login
     *
     * @param string $user
     * @param string $pass
     * @return void
     */
    public function login($user, $pass)
    {
        $response = $this->sendRequest(self::LOGIN_URL, [
            'type' => 'normal',
            'username' => $user, 
            'password' => $pass
        ], 'Не удалось авторизоваться');

        $data = $this->json($response);
        $this->_token = $data->auth_token;
        $this->_authString = 'Bearer ' . $this->_token;
    }



    /**
     * getProjectId
     *
     * @param string $slug
     * @return int
     */
    public function getProjectId($slug)
    {
        $response = $this->sendAuthRequest(
            self::PROJECT_GET_URL . $slug,
            [],
            'Не удалось получить id проекта',
            [],
            'GET'
        );


        return $this->json($response)->id;
    }

    /**
     * json
     *
     * @param Response $response
     * @return array
     */
    private function json(Response $response)
    {
        return json_decode($response->getBody());
    }


    /**
     * createIssue
     *
     * @param string $userId
     * @param string $projectId
     * @param string $subject
     * @param string $type
     * @param string $desc
     * @return int
     */
    public function createIssue($userId, $projectId, $subject, $type, $desc)
    {
        $response = $this->sendAuthRequest(
            self::ISSUE_URL, 
            [
                'assigned_to' => $userId,
                'project' => $projectId,
                'subject' => $subject,
                'type' => $type,
                'description' => $desc, 
            ],
            'Не удалось создать задачу'
        );

        return $this->json($response)->id;

    }

}
