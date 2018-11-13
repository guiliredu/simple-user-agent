<?php
/**
 * @author     Guilherme Redü <guiliredu@gmail.com>
 * @copyright  2018 Guilherme Redü
 * @license    New BSD License
 * @version    1.0.0
 */
namespace SimpleUserAgent;

/**
 * Simple PHP FTP class
 */
class UserAgent
{
    protected $agent;
    protected $platform;
    protected $browser;
    protected $prefix;
    protected $version;

    protected $platforms = [
        'Android' => ['Android'],
        'Linux' => ['linux'],
        'iPhone' => ['iPhone'],
        'Macintosh' => ['macintosh', 'mac os x'],
        'Windows' => ['windows', 'win32'],
    ];
    protected $browsers = [
        'Internet Explorer' => ['MSIE'],
        'Mozilla Firefox' => ['Firefox'],
        'Google Chrome' => ['Chrome'],
        'Apple Safari' => ['Safari'],
        'Opera' => ['Opera'],
        'Netscape' => ['Netscape'],
    ];

    public function __construct($agent = null)
    {
        if (!$agent && isset($_SERVER['HTTP_USER_AGENT'])) {
            $agent = $_SERVER['HTTP_USER_AGENT'];
        }

        $this->agent = $agent;

        $this->parse();
    }

    public function parse()
    {
        // Find plartform
        foreach ($this->platforms as $platform => $patterns) {
            foreach ($patterns as $pattern) {
                if (strpos($this->agent, $pattern) !== false) {
                    $this->platform = $platform;
                    break;
                }
            }
        }

        // Find browser
        foreach ($this->browsers as $browser => $patterns) {
            foreach ($patterns as $pattern) {
                if (strpos($this->agent, $pattern) !== false) {
                    $this->browser = $browser;
                    $this->prefix = $pattern;
                    break;
                }
            }
        }

        // Browser version
        $pattern = '#(?<browser>' . join('|', ['Version', $this->prefix, 'other']) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        preg_match_all($pattern, $this->agent, $matches);

        $this->version = $matches['version'][0];

        if (count($matches['browser']) != 1) {
            $this->version = strripos($this->agent, "Version") < strripos($this->agent, $this->prefix) ? $matches['version'][0] : $matches['version'][1];
        }
    }

    public function setAgent($agent)
    {
        $this->agent = $agent;
        $this->parse();
    }

    public function getInfo()
    {
        return [
            'agent' => $this->getAgent(),
            'platform' => $this->getPlatform(),
            'browser' => $this->getBrowser(),
            'prefix' => $this->getPrefix(),
            'version' => $this->getVersion(),
        ];
    }

    public function getAgent()
    {
        return $this->agent;
    }

    public function getPlatform()
    {
        return $this->platform;
    }

    public function getBrowser()
    {
        return $this->browser;
    }

    public function getPrefix()
    {
        return $this->prefix;
    }

    public function getVersion()
    {
        return $this->version;
    }
}
