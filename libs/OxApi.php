<?php
/**
 * Created by OxGroup.
 * User: Aliaxander
 * Date: 24.11.15
 * Time: 16:25
 */

namespace Ox\Api;

class OxApi
{
    protected $url;
    protected $email;
    protected $apiKey;

    /**
     * OxApi constructor.
     *
     * @param $url
     * @param $email
     * @param $apiKey
     */
    public function __construct($url, $email, $apiKey)
    {
        $this->url = $url;
        $this->email = $email;
        $this->apiKey = $apiKey;
    }

    /**
     * @param $method
     * @param $request
     *
     * @return mixed|object
     */
    protected function requestApi($method, $request)
    {
        $curl = curl_init();
        // Устанавливаем урл, к которому обратимся
        curl_setopt($curl, CURLOPT_URL, $this->url . $method);
        // максимальное время выполнения скрипта
        curl_setopt($curl, CURLOPT_TIMEOUT, 20);
        // передаем данные по методу post
        curl_setopt($curl, CURLOPT_POST, 1);
        // теперь curl вернет нам ответ, а не выведет
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        // переменные, которые будут переданные по методу post
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request + array("email" => $this->email, "apikey" => $this->apiKey));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // отправка запроса
        $result = curl_exec($curl);
        // закрываем соединение
        curl_close($curl);
        if ($result) {
            $result = json_decode($result, true);
        } else {
            $result = (object)array("result"=>array("error" => "Server is not responding"));
        }
        return $result;
    }

    /**
     * @param $array
     *
     * @return mixed|object
     */
    public function addOrder($array)
    {
        return $this->requestApi("addOrder", $array);
    }

    /**
     * @param $array
     *
     * @return mixed|object
     */
    public function getFlow($array)
    {
        return $this->requestApi("getFlow", $array);
    }

    /**
     * @param $array
     *
     * @return mixed|object
     */
    public function addTraffic($array)
    {
        return $this->requestApi("addTraffic", $array);
    }

    /**
     * @param $array
     *
     * @return mixed|object
     */
    public function getLandingConfig($array)
    {
        return $this->requestApi("getLandingConfig", $array);
    }

}