<?php

 // include('email-services/src/services/Mailchimp.php');
namespace Jeeglo\EmailService;
use Jeeglo\EmailService\Drivers\Mailchimp as Mailchimp;
use Jeeglo\EmailService\Drivers\ActiveCampaign as ActiveCampaign;
use Jeeglo\EmailService\Drivers\GetResponse as GetResponse;
use Jeeglo\EmailService\Drivers\iContact as iContact;
use Jeeglo\EmailService\Drivers\Mailerlite as Mailerlite;
use Jeeglo\EmailService\Drivers\Mailvio;
use Jeeglo\EmailService\Drivers\Sendlane as Sendlane;
use Jeeglo\EmailService\Drivers\ConvertKit as ConvertKit;
use Jeeglo\EmailService\Drivers\Drip as Drip;
use Jeeglo\EmailService\Drivers\ConstantContact as ConstantContact;
use Jeeglo\EmailService\Drivers\Aweber as Aweber;
use Jeeglo\EmailService\Drivers\Kyvio as Kyvio;
use Jeeglo\EmailService\Drivers\Ontraport as Ontraport;
use Jeeglo\EmailService\Drivers\EmailOctopus as EmailOctopus;
use Jeeglo\EmailService\Drivers\Sendiio as Sendiio;


class EmailService {

	protected $driver;

	public function __construct($service, $credentials = []) {
        
        // $this->driver = $service;
    	switch ($service) {
    		case 'aweber':
                $this->driver = new Aweber($credentials);
                break;

            case 'activeCampaign':
                $this->driver = new ActiveCampaign($credentials);
                break;

            case 'constantContact':
                $this->driver = new ConstantContact($credentials);
                break;

            case 'getResponse':
                $this->driver = new GetResponse($credentials);
                break;

            case 'iContact':
                $this->driver = new iContact($credentials);
                break;

            case 'mailchimp':
                $this->driver = new Mailchimp($credentials);
                break;

            case 'sendlane':
                $this->driver = new Sendlane($credentials);
                break;

            case 'convertKit':
                $this->driver = new ConvertKit($credentials);
                break;

            case 'mailerlite':
                $this->driver = new Mailerlite($credentials);
                break;

            case 'drip':
                $this->driver = new Drip($credentials);
                break;

            case 'kyvio':
                $this->driver = new Kyvio($credentials);
    			break;

            case 'ontraport':
                $this->driver = new Ontraport($credentials);
                break;

            case 'emailOctopus':
                $this->driver = new EmailOctopus($credentials);
                break;

            case 'sendiio':
                $this->driver = new Sendiio($credentials);
                break;

            case 'mailvio':
                $this->driver = new Mailvio($credentials);
                break;

    		default:
    			return 'Not Found';
    			break;
    	}
   	}

	/**
     * [getLists for current driver]
     * @return [array] [key value]
     */
    public function getLists()
	{
        return $this->driver->getLists();
    }

    /**
     * [getTags for current driver]
     * @param array $data for mailchimp driver but null for other drivers
     * @return [array] [key value]
     */
    public function getTags($data = null)
    {
        if(!empty($data)){
            return $this->driver->getTags($data);
        }
        return $this->driver->getTags();
    }

    /**
     * [addContact for adding user to current driver]
     * @param [type] $data [description]
     */
    public function addContact($data, $remove_tags = [], $add_tags = [])
    {
		return $this->driver->addContact($data, $remove_tags, $add_tags);
    }

    /**
     * Connect Email service
     * @param [type] $data [description]
     */
    public function connect()
    {
        return $this->driver->connect();
    }

    /**
     * Get Connect Data from Email service
     * @param [type] $data [description]
     */
    public function getConnectData()
    {
        return $this->driver->getConnectData();
    }
 
}