<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use SoapClient;
use SimpleXMLElement;
use stdClass;
use DOMDocument;
use Uhin\X12Parser\Parser\X12Parser;
use App\MiClase;
use WsdlToPhp\WsSecurity\WsSecurity;


class WsController extends Controller
{

    /**
     * @author Carlos Gutierrez
     * 
     */
    public function todosMetodos()
    {
        try 
        {
            $wsdl = "http://app26.susalud.gob.pe:27801/ServicePasarela?wsdl";

            $desPass = "cab5mCHslx5Kcx08IvT2t/edjtYPYEodtmshbW4cwS4wed65TOqRhHut5Z5Wx3KjqdluV2a40B5D92cFQ+SxUeBSYQKFQO+zXZG09OPnqLsGm0b80ktgUxe/OF7MmfAPGFvxEtNmNSknCNYDrBsMYgZb6e2MIcqRkVd85rNm55M=|uul55sasl229889362l086sul203863u26l94l058s45932su598sus426217983|d6L8aFv2q4Ju2lC9YFrybt1aycMq3SSrZIXKsf1kMsg=";
            $credenciales = [
                'Username' => "00009783",
                'Password' => $desPass
            ];

            $client         = new \SoapClient($wsdl, $credenciales);
            $aFuncionesWS   = $client->__getFunctions();
            $aEstructura    = $client->__getTypes(); 
            // var_dump($aEstructura);
            return view('osi', [
                'funcionesWs' => $aFuncionesWS, 
                'aEstructura' => $aEstructura
            ]);   
        } 
        catch (Exception $e) 
        {
            echo "<h2>Exception Error!</h2>";
            echo $e->getMessage();
        }
    }

    public function toX12N()
    {

        $request = "ISA*00*          *00*          *ZZ*00019049       *ZZ*40009          *190416*1204*|*00501*000000001*0*P*: ~GS*HS*00019049*40009*20190416*120408*1*X*005010~ST*270*0001~BHT*0022*13~HL*1**20*1~NM1*PR*2******PI*20501781291~PRV*OR**CN~HL*2*1*21*1~NM1*1P*2******FI*40009~HL*3*2*22*0~NM1*IL*1*RAMIREZ*LUIS****MI*  ***BACA~REF*DD*1~REF*4A* ~REF*PRT* * *ZZ:Revisión del Instalador 5.3~REF*D7* * *  : :: ~REF*D7* **ZZ: ~REF*8X* ~REF*S2* ~REF*ZZ* ~REF*18* **ZZ: ~REF*PRT* ~DTP*447*D8* ~NM1*P5* * * ******** ~REF*DD* **4A: ~SE*5*0001~GE*1*1~IEA*1*000000001~";

        $serializer = new X12Serializer($request);

        // Options for serializing:
        $serializer->addNewLineAfterSegment(true);
        $serializer->addNewLineAfterIEA(true);

        // Generate the raw X12 string
        $rawX12 = $serializer->serialize();
    }

    public function x12nToHuman($sX12N) 
    {
        // $responseIafas  = "ISA*00*          *00*          *ZZ*40009          *ZZ*00019049       *190416*07:3*|*00501*000000000*0*T*:~GS*HB*40009          *00019049       *20190416*07:33:24*016184393*X *00501       ~ST*271*40378679 *                                   ~BHT*0022*11~HL*1           *            *20*1~NM1*PR *2*                                                            *                                   *                         *          *          *PI*40009               *  *   *                                                            ~HL*2           *1           *21*1~NM1*1P *2*                                                            *                                   *                         *          *          *FI*20501781291         *  *   *                                                            ~HL*3           *2           *22*0~NM1*IL * *                                                            *                                   *                         *          *          *MI*                    *  *   *                                                            ~REF*ACC*                                                                                *                                                                                ~REF*DD *                                                                                *                                                                                *4A :                    :   :                    :   :                    ~REF*CT *                                                                                *                                                                                ~REF*PRT*                                                                                *                                                                                *ZZ :                    :   :                    :   :                    ~REF*ZZ *                                                                                *                                                                                ~REF*18 *                                                                                *                                                                                ~DMG*D8 *                                   * * *                    *  *   ~NM1*P5 * *                                                            *                                   *                         *          *          *  *                    *  *   *                                                            ~REF*DD *                                                                                *                                                                                *XX5:                    :   :                    :   :                    ~SE*19        *40378679 ~GE*1     *016184393~IEA*1    *000000000~";
        $parser         = new X12Parser($sX12N);
        $x12N            = $parser->parse();
        return $x12N;
    }

    public function callSoap()
    {
        $url = 'https://secure.softwarekey.com/solo/webservices/XmlCustomerService.asmx?WSDL';
        $client = new \SoapClient($url);
        $xmlr = new \SimpleXMLElement("<CustomerSearch></CustomerSearch>",  0, false, 'ws', true);
        $xmlr->addChild('AuthorID', 1);
        $xmlr->addChild('UserID', 'mchojrin');
        $xmlr->addChild('UserPassword', '1234');
        $xmlr->addChild('Email', 'mauro.chojrin@leewayweb.com');

        $params = new \stdClass();
        $params->xml = $xmlr->asXML();
        var_dump($params->xml);die;
        $result = new \SimpleXMLElement($client->CustomerSearchS($params)->CustomerSearchSResult->any);
        $r = current($result->xpath('/Customers/ResultCode'));
        if ( $r == '-1' ) {
                echo 'Fallo: '.$result->xpath('/Customers/ResultCode')[0];
        } else {
                echo 'Exito!';
        }
        echo PHP_EOL;

    }

    //Goo!!
    public function callSoap2()
    {
        $xmlTest = new SimpleXMLElement('<Test/>', 0, false, 'ws', true);
        $xmlTest->addChild("ws:somename2", "somevalue2", 'http://microsoft.com/wsdl/types/');
        $make = $xmlTest->addChild('ws:make', null, 'ws');
        #$make->addAttribute('name','Ford');
        $make->addChild('ws:model', 'foo', 'ws');
        $make->addChild('ws:model', 'bar', 'ws');
        header ("Content-Type:text/xml");
        print_r($xmlTest->asXML());
    }

    //Cuztmizada Header SOAP
    public function callSoapCustom()
    {
        $client = new SoapClient(null, array('location' => "http://localhost/soap.php",
        'uri'      => "http://test-uri/"));
        $header = new SoapHeader('http://soapinterop.org/echoheader/', 
        'echoMeStringRequest',
        'hello world');

        $client->__setSoapHeaders($header);

        $client->__soapCall("echoVoid", null);
    }

    public function getConsultaAsegNomResponse()
    {
        $wsdl = "http://app26.susalud.gob.pe:27801/ServicePasarela?wsdl";

        $desPass = "cab5mCHslx5Kcx08IvT2t/edjtYPYEodtmshbW4cwS4wed65TOqRhHut5Z5Wx3KjqdluV2a40B5D92cFQ+SxUeBSYQKFQO+zXZG09OPnqLsGm0b80ktgUxe/OF7MmfAPGFvxEtNmNSknCNYDrBsMYgZb6e2MIcqRkVd85rNm55M=|uul55sasl229889362l086sul203863u26l94l058s45932su598sus426217983|d6L8aFv2q4Ju2lC9YFrybt1aycMq3SSrZIXKsf1kMsg=";
        $userName = "00009783";
        $credenciales = [
            'Username' => "00009783",
            'Password' => $desPass
        ];

        $soapHeader = WsSecurity::createWsSecuritySoapHeader (
            $userName, $desPass, $passwordDigest = false, $addCreated = 0,
            $addExpires = 0, $returnSoapHeader = true, $mustunderstand = false, $actor = null, 
            $usernameId = null, $addNonce = true
        );

        $soapClient = new \SoapClient($wsdl);
        $aFunciones = $soapClient->__getFunctions();
        $soapClient->__setSoapHeaders($soapHeader);

        $desHeaders = $soapClient;

        $aElementos = $this->cuerpoRequest();
        $response   = $soapClient->__soapCall('getConsultaAsegNom', array($aElementos));
        $parser     = new X12Parser($response->txRespuesta);
        $x12N       = $parser->parse();
        
        return view('resconsultaws', [
            'funcionesWs' => $aFunciones,
            'resX12N' => $response->txRespuesta,
            'resX12NaHuman' => $x12N,
            'desHeaders' => $desHeaders
        ]);   
    }

    public function cuerpoRequest()
    {
        $aElementos = array (
            'coExcepcion' => "0000",
            'txNombre' => "270_CON_ASE",
            'coIafa' => "40009",
            'txPeticion' => 'ISA*00*          *00*          *ZZ*00019049       *ZZ*40009          *190416*1204*|*00501*000000001*0*P*: ~GS*HS*00019049*40009*20190416*120408*1*X*005010~ST*270*0001~BHT*0022*13~HL*1**20*1~NM1*PR*2******PI*20501781291~PRV*OR**CN~HL*2*1*21*1~NM1*1P*2******FI*40009~HL*3*2*22*0~NM1*IL*1*RAMIREZ*LUIS****MI*  ***BACA~REF*DD*1~REF*4A* ~REF*PRT* * *ZZ:Revisión del Instalador 5.3~REF*D7* * *  : :: ~REF*D7* **ZZ: ~REF*8X* ~REF*S2* ~REF*ZZ* ~REF*18* **ZZ: ~REF*PRT* ~DTP*447*D8* ~NM1*P5* * * ******** ~REF*DD* **4A: ~SE*5*0001~GE*1*1~IEA*1*000000001~'
        );
        return $aElementos;
    }

    public function detalleProceso()
    {
        $wsdl = "http://app26.susalud.gob.pe:27801/ServicePasarela?wsdl";

        $desPass = "cab5mCHslx5Kcx08IvT2t/edjtYPYEodtmshbW4cwS4wed65TOqRhHut5Z5Wx3KjqdluV2a40B5D92cFQ+SxUeBSYQKFQO+zXZG09OPnqLsGm0b80ktgUxe/OF7MmfAPGFvxEtNmNSknCNYDrBsMYgZb6e2MIcqRkVd85rNm55M=|uul55sasl229889362l086sul203863u26l94l058s45932su598sus426217983|d6L8aFv2q4Ju2lC9YFrybt1aycMq3SSrZIXKsf1kMsg=";
        $credenciales = [
            'Username' => "00009783",
            'Password' => $desPass
        ];

        $client         = new \SoapClient($wsdl, $credenciales);
        $aFuncionesWS   = $client->__getFunctions();
        $aTiposWS       = $client->__getTypes(); 

        return view('procesos', ['funcionesWs' => $aFuncionesWS]); 
    }

    public function herramientas()
    {

        $wsdl = "http://app26.susalud.gob.pe:27801/ServicePasarela?wsdl";

        $desPass = "cab5mCHslx5Kcx08IvT2t/edjtYPYEodtmshbW4cwS4wed65TOqRhHut5Z5Wx3KjqdluV2a40B5D92cFQ+SxUeBSYQKFQO+zXZG09OPnqLsGm0b80ktgUxe/OF7MmfAPGFvxEtNmNSknCNYDrBsMYgZb6e2MIcqRkVd85rNm55M=|uul55sasl229889362l086sul203863u26l94l058s45932su598sus426217983|d6L8aFv2q4Ju2lC9YFrybt1aycMq3SSrZIXKsf1kMsg=";
        $credenciales = [
            'Username' => "00009783",
            'Password' => $desPass
        ];

        $client         = new \SoapClient($wsdl, $credenciales);
        $aFuncionesWS   = $client->__getFunctions();
        $aTiposWS       = $client->__getTypes(); 

        return view('herramientas', ['funcionesWs' => $aFuncionesWS]); 
    }
}
    