<?php 

namespace App\Parser;

class Parser
{   
    /**
     * @var cURL resource
     */
    private $ch;

    /**
     * Initializes a cURL session.
     *
     * @param  bool $print
     * @return void
     */
    public function __construct($print = false)
    {
        $this->ch = curl_init();

        if(!$print) {
            $this->setOpt(CURLOPT_RETURNTRANSFER, true);
        }
    }

    /**
     * Sets the parameter for cURL session.
     *
     * @param  int  $opt
     * @param  mixed  $value
     * @return Parser
     */
    public function setOpt($opt, $value)
    {
        curl_setopt($this->ch, $opt, $value);

        return $this;
    }

    /**
     * Binds the $url parameter to the current cURL session and executes the request.
     *
     * @param  string  $url
     * @return Response
     */
    public function exec($url)
    {
        $this->setOpt(CURLOPT_URL, $url);

        return curl_exec($this->ch);
    }

    /**
     * Ends a cURL session and free resources.
     *
     * @return void
     */
    public function __destruct()
    {
        curl_close($this->ch);
    }
}