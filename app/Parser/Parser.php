<?php 

namespace App\Parser;
/**
 * Class Parser
 * @package Parser
 */
class Parser
{   
    /**
     * @var cURL resource
     */
    private $ch;
    /**
     * @var DOMDocument
     */
    private $dom;

    public function __construct($print = false)
    {
        $this->ch = curl_init();

        if(!$print) {
            $this->setOpt(CURLOPT_RETURNTRANSFER, true);
        }
    }

    public function setOpt($opt, $value)
    {
        curl_setopt($this->ch, $opt, $value);

        return $this;
    }

    public function exec($url)
    {
        $this->setOpt(CURLOPT_URL, $url);

        return curl_exec($this->ch);
    }

    public function __destruct()
    {
        curl_close($this->ch);
    }
}