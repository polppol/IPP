<?php 

namespace obray\ipp;

/*
 * Operation Attributes
 * 
 * @property string $charset            This operation attribute identifies the charset (coded
                                        character set and encoding method) used by any ’text’ and
                                        ’name’ attributes that the client is supplying in this request
 * @property string $naturalLanguage    This operation attribute identifies the natural language used 
 *                                      by any ’text’ and ’name’ attributes that the client is supplying 
 *                                      in this request.
 * @property string $statusCode         
 * @property string $statusMessage
 * @property string $detailedStatusMessage
 * @property string $documentURI
 * @property string $target
 * @property string $userName
 * @property string $jobName
 * @property string $ippAttributeFidelity
 * @property string $documentName
 * @property string $compression
 * @peoperty string $documentType
 * @property string $naturalLanguage
 * @property string $jobKOctets
 * @property string $jobImpressions
 * @property string $jobMediaSheets
*/

class OperationAttributes
{
    private $attribute_group_tag = 0x01;

    public $charset;
    public $naturalLanguage = 'en';
    public $statusCode;
    public $statusMessage;
    public $detailedStatusMessage;
    public $documentAccessError;
    public $documentURI;
    public $target;
    public $userName;
    public $jobName;
    public $ippAttributeFidelity;
    public $documentName;
    public $compression;
    public $documentType;
    public $jobKOctets;
    public $jobImpressions;
    public $jobMediaSheets;

    public function __construct(){
        $this->charset = new \obray\ipp\types\Charset('utf-8');
    }

    public function __set(string $name, $value)
    {
        switch($name){
            case 'charset':
                $this->$name = new \obray\ipp\types\Charset($value);
                break;
            case 'naturalLanguage':
                break;
            case 'statusCode':
                break;
            case 'statusMessage':
                break;
            case 'detailedStatusMessage':
                break;
            case 'documentAccessError':
                break;
            case 'documentURI':
                break;
            case 'target':
                break;
            case 'userName':
                break;
            case 'jobName':
                break;
            case 'ippAttributeFidelity':
                break;
            case 'documentName':
                break;
            case 'compression':
                break;
            case 'documentType':
                break;
            case 'jobKOctets':
                break;
            case 'jobImpressions':
                break;
            case 'jobMediaSheets':
                break;

        }
    }

    public function validate(array $attributeKeys)
    {
        if(empty($charset) || $charset !== 'utf-8'){
            throw new obray\exceptions\ClientErrorCharsetNotSupported();
        }
        if(empty($natuarlLanguage) && $naturalLanguage !== 'en'){
            throw new \Exception("Invalid request.");
        }
    }

    public function encode()
    {
        $binary = pack('c', $this->attribute_group_tag);

        return $binary;
    }
}