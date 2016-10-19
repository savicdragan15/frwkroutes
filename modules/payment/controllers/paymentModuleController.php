<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of paymentModuleController
 *
 * @author Dragan
 */
use at\externet\eps_bank_transfer;

class paymentModuleController extends baseController{
    //put your code here
    
    public function __construct() {
        Loader::loadClass("User");
    }
    
    public function index() {
        
    }
    
    /**
     * Select payment option
     */
    public function paymentOption($login = 0){
        
        if($login == 1){
          Loader::loadView("payment_option", "payment");
          die;
        }
        
        if(User::isLogin())
          Loader::loadView("payment_option", "payment");
        else
            $this->redirect (_WEB_PATH."login");
    }
    
    public function processPayment() {
       
        if(isset($_POST['submit']) && isset($_POST['type'])){
            
            switch ($_POST['type']) {
                case 'eps':
                  $this->epsPayment(); 
                 break;
                default:
                   $this->redirect(_WEB_PATH);
                break;
            }
            
        }else{
            $this->redirect(_WEB_PATH);
        }
        
    }
    
    /**
     * 
     */
    private function setMerchantData(){
        $this->userID    = _userID;            // Eps "Händler-ID"/UserID = epsp:UserId
        $this->pin       = _pin;              // Secret for authentication / PIN = part of epsp:MD5Fingerprint
        $this->bic       = _bic;            // BIC code of receiving bank account = epi:BfiBicIdentifier
        $this->iban      = _iban;   // IBAN code of receiving bank account = epi:BeneficiaryAccountIdentifier
        $this->targetUrl = _targetUrl;
    }
    
    /**
     * 
     * @return \at\externet\eps_bank_transfer\TransferMsgDetails
     */
    private function getTransferMsgDetails(){
        // Return urls
        $transferMsgDetails = new eps_bank_transfer\TransferMsgDetails(
          _confirmUrl, // The URL that the EPS Scheme Operator (=SO) will call before (= VitaliyCheck) and after payment = epsp:ConfirmationUrl. Use samples/eps_confirm.php as a starting point. You must include a unique query string (and parse it in samples/eps_confirm.php), since the matching of a confirmation to a payment is solely based on this URL!
          _successUrl,   // The URL that the buyer will be redirected to on succesful payment = epsp:TransactionOkUrl
          _errorUrl     // The URL that the buyer will be redirected to on cancel or failure = epsp:TransactionNokUrl
        );
        return $transferMsgDetails;
    }

    private function getTransferInitiatorDetails($totalAmount, $transferMsgDetails){
        $transferInitiatorDetails = new eps_bank_transfer\TransferInitiatorDetails(
            $this->userID,
            $this->pin,
            $this->bic,
            'All out shine',         // Name (and optional address) of the receiving account owner = epi:BeneficiaryNameAddressText. In theory, this can be 140 characters; but in practice, Austrian banks only guarantee 70 characters. Line breaks are not allowed (EPS-Pflichtenheft is ambiguous about this).
            $this->iban,
            uniqid(),                  // epi:ReferenceIdentifier. Mandatory but useless, since you will never (!) get to see this number again - not upon payment confirmation and not at the bank statement (Kontoauszug). It's also not displayed to the customer. Best guess: Use your order number, i.e. same as epi:RemittanceIdentifier.
            (int)$totalAmount,                   // Total amount in EUR cent ≈ epi:InstructedAmount
            $transferMsgDetails
        );
        
        return $transferInitiatorDetails;
    }
    
    public function epsPayment(){
        
        $this->setMerchantData();
        
        $transferMsgDetails = $this->getTransferMsgDetails();
        
      
        $totalAmount = $_SESSION['korpa']['ukupna_cena_korpe'] * 100;
        
        $transferInitiatorDetails = $this->getTransferInitiatorDetails($totalAmount, $transferMsgDetails);
         
        
        // Optional: Include ONE (i.e. not both!) of the following two lines:
        //$transferInitiatorDetails->RemittanceIdentifier = 'Order123';             // "Zahlungsreferenz". Will be returned on payment confirmation = epi:RemittanceIdentifier
        $transferInitiatorDetails->UnstructuredRemittanceIdentifier = 'Order - ' .  uniqid(); // "Verwendungszweck". Will be returned on payment confirmation = epi:UnstructuredRemittanceIdentifier
        
        // Optional:
        $transferInitiatorDetails->SetExpirationMinutes(60);     // Sets ExpirationTimeout. Value must be between 5 and 60
        
        // Optional: Include information about one or more articles = epsp:WebshopDetails
       
        unset($_SESSION['korpa']['ukupna_cena_korpe']);
        unset($_SESSION['korpa']['ukupno_proizvoda_u_korpi']);
        
        foreach ($_SESSION['korpa'] as $key => $value) {
            
            $article = new eps_bank_transfer\WebshopArticle(  // = epsp:WebshopArticle
                  $value['proizvod_naziv'],  // Article name
                  $value['proizvod_kolicina'], // Quantity
                  (int)$value['proizvod_cena'] * 100    // Price in EUR cents
            );

            $transferInitiatorDetails->WebshopArticles[] = $article;
          
        }
        
        // Send TransferInitiatorDetails to Scheme Operator
        $soCommunicator = new eps_bank_transfer\SoCommunicator();
        
        // Send transfer initiator details to $targetUrl
        $plain = $soCommunicator->SendTransferInitiatorDetails($transferInitiatorDetails, $this->targetUrl);
       
        $xml = new \SimpleXMLElement($plain);
        $soAnswer = $xml->children(eps_bank_transfer\XMLNS_epsp);
        
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
          
          $this->redirect($redirectUrl);
       }
    }
    
}