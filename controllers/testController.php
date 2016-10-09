<?php

use duncan3dc\Laravel\BladeInstance;
use duncan3dc\Laravel\Blade;
use at\externet\eps_bank_transfer;
class testController extends baseController
{
    public function __construct()
    {
        parent::__construct();
        $this->_callMdl("products", "products");
        Loader::loadClass("Uploader");
    }
    
    public function index()
    {
      // Connection credentials. Override them for test mode. 
        $userID = 'RLNWATWWXXX_194892';            // Eps "Händler-ID"/UserID = epsp:UserId
        $pin    = '060CE533BF34484A';              // Secret for authentication / PIN = part of epsp:MD5Fingerprint
        $bic    = 'RLNWATWW';            // BIC code of receiving bank account = epi:BfiBicIdentifier
        $iban   = 'AT133200000112375028';   // IBAN code of receiving bank account = epi:BeneficiaryAccountIdentifier
        $targetUrl = 'https://routing.eps.or.at/appl/epsSO/transinit/eps/v2_5'; // Target URL to send TransferInitiatorDetails to. 'null' means: Use default URL. For test mode, insert: https://routing.eps.or.at/appl/epsSO-test/transinit/eps/v2_5
       
        // Return urls
        $transferMsgDetails = new eps_bank_transfer\TransferMsgDetails(
          'http://localhost:8888/all_shine_out/test/confirm', // The URL that the EPS Scheme Operator (=SO) will call before (= VitaliyCheck) and after payment = epsp:ConfirmationUrl. Use samples/eps_confirm.php as a starting point. You must include a unique query string (and parse it in samples/eps_confirm.php), since the matching of a confirmation to a payment is solely based on this URL!
          'http://localhost:8888/all_shine_out/test/thanks/1',   // The URL that the buyer will be redirected to on succesful payment = epsp:TransactionOkUrl
          'http://localhost:8888/all_shine_out/test/thanks/2'     // The URL that the buyer will be redirected to on cancel or failure = epsp:TransactionNokUrl
        );
       // var_dump($transferMsgDetails);
        
        $transferInitiatorDetails = new eps_bank_transfer\TransferInitiatorDetails(
            $userID,
            $pin,
            $bic,
            'John Q. Public',         // Name (and optional address) of the receiving account owner = epi:BeneficiaryNameAddressText. In theory, this can be 140 characters; but in practice, Austrian banks only guarantee 70 characters. Line breaks are not allowed (EPS-Pflichtenheft is ambiguous about this).
            $iban,
            '12345',                  // epi:ReferenceIdentifier. Mandatory but useless, since you will never (!) get to see this number again - not upon payment confirmation and not at the bank statement (Kontoauszug). It's also not displayed to the customer. Best guess: Use your order number, i.e. same as epi:RemittanceIdentifier.
            '1',                   // Total amount in EUR cent ≈ epi:InstructedAmount
            $transferMsgDetails
          );
          //var_dump($transferInitiatorDetails); die;
        
        // Optional: Include ONE (i.e. not both!) of the following two lines:
        //$transferInitiatorDetails->RemittanceIdentifier = 'Order123';             // "Zahlungsreferenz". Will be returned on payment confirmation = epi:RemittanceIdentifier
        $transferInitiatorDetails->UnstructuredRemittanceIdentifier = 'Order123'; // "Verwendungszweck". Will be returned on payment confirmation = epi:UnstructuredRemittanceIdentifier
        
        // Optional:
        $transferInitiatorDetails->SetExpirationMinutes(60);     // Sets ExpirationTimeout. Value must be between 5 and 60
        
        // Optional: Include information about one or more articles = epsp:WebshopDetails
        $article = new eps_bank_transfer\WebshopArticle(  // = epsp:WebshopArticle
          'ArticleName',  // Article name
          1,              // Quantity
          1            // Price in EUR cents
        );
        
        $transferInitiatorDetails->WebshopArticles[] = $article;
        
        // Send TransferInitiatorDetails to Scheme Operator
        $soCommunicator = new eps_bank_transfer\SoCommunicator();
        
        // Send transfer initiator details to $targetUrl
        $plain = $soCommunicator->SendTransferInitiatorDetails($transferInitiatorDetails, $targetUrl);
       
        $xml = new \SimpleXMLElement($plain);
        $soAnswer = $xml->children(eps_bank_transfer\XMLNS_epsp);
        var_dump($soAnswer); die;
        $errorDetails = $soAnswer->BankResponseDetails->ErrorDetails;
        if (('' . $errorDetails->ErrorCode) != '000')
        {
          $errorCode = '' . $errorDetails->ErrorCode;
          $errorMsg = '' . $errorDetails->ErrorMsg;
        }
        else
        {
          // This is the url you have to redirect the client to.
          $redirectUrl = $soAnswer->BankResponseDetails->ClientRedirectUrl;
          header('Location: ' . $redirectUrl);
        }
        
        
    }
    public function thanks($param){
        if($param ==  1){
            echo "OK OK";
        }else{
            echo "Otpo mi crep sa krova";
        }
    }
    
    public function confirm(){
            /**
             * @param string $plainXml Raw XML message, according to "Abbildung 6-6: PaymentConfirmationDetails" (eps Pflichtenheft 2.5)
             * @param at\externet\eps_bank_transfer\BankConfirmationDetails $bankConfirmationDetails
             * @return true
             */
            $paymentConfirmationCallback = function($plainXml, $bankConfirmationDetails)
            {
              // Handle "eps:StatusCode": "OK" or "NOK" or "VOK" or "UNKNOWN"
              if ($bankConfirmationDetails->GetStatusCode() == 'OK')
              {
                // TODO: Do your payment completion handling here
                // You should use $bankConfirmationDetails->GetRemittanceIdentifier();
                  echo "OK OK";
              }else{
                  echo "Error";
                  return false;
              }
              // True is expected to be returned, otherwise the Scheme Operator will be informed that the server could not accept the payment confirmation
              return true; 
            };
            $soCommunicator = new eps_bank_transfer\SoCommunicator();
            $soCommunicator->HandleConfirmationUrl(
              $paymentConfirmationCallback,
              null,                 // Optional: a callback function which is called in case of Vitality-Check
              'php://input',        // This needs to be the raw post data received by the server. Change this only if you want to test this function with simulation data.
              'php://output'        // This needs to be the raw output stream which is sent to the Scheme Operator. Change this only if you want to test this function with simulation data.
            );
    }
    
    public function upload() {
        
        if(isset($_FILES['fileToUpload'])){
            $path = __DIR__ . "/uploads/";
            $this->uploader = new Uploader();
            $this->uploader->setPath($path);

            if($this->uploader->multipleUpload($_FILES['fileToUpload'])){
                echo "Lagano je proslo";
            }else{
                echo $this->uploader->message;
            }
            /*$path = __DIR__ . "/";
            $this->uploader = new Uploader();
            $this->uploader->setPath($path);
            $this->uploader->setFileName("test");
            if($this->uploader->uploadImage($_FILES['fileToUpload'])){
                echo "ok ok";
            }else{
               echo $this->uploader->message;
            }
            die;*/

            /*$path = __DIR__ . "/";
            if (isset($_FILES['fileToUpload'])) {
                $file_to_upload = $_FILES['fileToUpload'];
                $this->uploader = new Uploader($file_to_upload, $path);
                $this->uploader->setFileName("123");
                $this->uploader->setIvalidformatMessage("Neodgovarajuci format");

                if ($this->uploader->upload()) {
                    echo "ok";
                } else {
                    echo $this->uploader->message;
                }
            }*/
        }
    }

    public function test(){
        $condition = array(
          array("field" => "product_name", "condition" => "%12%")
        );
        
        echo $this->view->render("test", array(
            'name' => 'Dragan',
            "data" =>  $this->_productsMdl->like("*",$condition)[0]
        ));
        
      /*  $this->_callMdl("products", "products");
        var_dump($this->_productsMdl);
     */
    }
}

