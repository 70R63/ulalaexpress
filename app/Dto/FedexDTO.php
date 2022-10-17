<?php

namespace App\Dto;

use App\Dto\Fedex\Etiqueta;
use App\Dto\Fedex\RequestedShipment;
use App\Dto\Fedex\AccountNumber;
use App\Dto\Fedex\Shipper;
use App\Dto\Fedex\Recipients;
use App\Dto\Fedex\Contact;
use App\Dto\Fedex\Address;
use App\Dto\Fedex\RequestedPackageLineItems;
use App\Dto\Fedex\DeclaredValue;
use App\Dto\Fedex\Weight;

use Log;

/**
 * 
 */
class FedexDTO 
{
	/**
     * Insert , array que conse usara para insertar como si fura un request
     *
     * @var nombre
     */
    public $insert;
	
	function __construct()
	{
		// code...
	}

	/**
	 * Metodo para asignar los valores del request a una etiqueta 
	 * para generar el venvio a la api de Fedex
	 * https://developer.fedex.com/api/en-ph/guides/api-reference.html
	 * 
	 * @param \Illuminate\Http\Request $request
	 * @return App\Dto\Fedex\Etiqueta Etiqueta
	 */

	public function parser($request){
        Log::info(__CLASS__." ".__FUNCTION__);
		
		
		$weight = new Weight(array('value'=> $request['peso']));

		$contactShipper = New Contact( 
			array("personName" 	=> $request['contacto']
				,"phoneNumber"	=> $request['celular']
				,"companyName"	=> $request['nombre']) 
			);
		$addressShipper = New Address(
			array("streetLines"	=> array($request['direccion'],"")
				,"city"	=> $request['colonia']
				,"stateOrProvinceCode"	=> $request['entidad_federativa']
				,"postalCode"	=> $request['cp']
			));

		$contactRecipients = New Contact( 
			array("personName" 	=> $request['contacto_d']
				,"phoneNumber"	=> $request['celular_d']
				,"companyName"	=> $request['nombre_d']) 
			);

		$addressRecipients = New Address(
			array("streetLines"	=> array($request['direccion_d'],"")
				,"city"	=> $request['colonia_d']
				,"stateOrProvinceCode"	=> $request['entidad_federativa_d']
				,"postalCode"	=> $request['cp_d']
			));

		$shipper = new Shipper(array('contact' => $contactShipper, 'address' => $addressShipper ));

		$recipients = New Recipients(array('contact' => $contactRecipients, 'address' => $addressRecipients ));

		$declaredValueWeight = array('declaredValue' => new DeclaredValue()
                                    ,'weight' => $weight);

		$requestedPackageLineItems = New RequestedPackageLineItems($declaredValueWeight);

        $requestedShipment = 
            array('shipper' => $shipper
            ,'recipients' => array($recipients)
            ,'requestedPackageLineItems' => array($requestedPackageLineItems));


        $init = array('requestedShipment'   => new RequestedShipment($requestedShipment)
	                    ,'accountNumber'    => new AccountNumber() );
        
        return new Etiqueta($init);

	}
}