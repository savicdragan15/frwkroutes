<?php
class cartModuleController extends baseController{
    private $porudzbinaModel, $slikeModel, $mailer;
  /*  public function __construct() {
        Loader::loadModel($this, "proizvodi", "korpa");
        Loader::loadModel($this, "porudzbina","korpa");
        Loader::loadModel($this, "slike", "korpa");
        Loader::loadClass("Mailer");
        $this->proizvodiModel = $this->models['proizvodi'];
        $this->porudzbinaModel = $this->models['porudzbina'];
        $this->slikeModel = $this->models['slike'];
        $this->mailer = new Mailer();
    }*/
    /**
     * Metoda koja ubacuje i proverava da li proizvod postoji u korpi
     * @return json Vraca ukupnu cenu i koliko proizvoda je u korpi
     */  
    public function index() {
        //var_dump($_POST); die;
        if(isset($_POST['proizvod_id']) && !empty($_POST['proizvod_id'])){
          /*if(!empty($_SESSION['korpica']['ids_proizvoda'])){
              if(array_search($_POST['proizvod_id'], $_SESSION['korpica']['ids_proizvoda']) !== false){
                  $error = true;
                  $this->response(array("error"=>$error,"message"=>"Ovaj proizvod je već u korpi."));
                  die();
              }
          }*/
          
        $_SESSION['inicijalna_korpa'][$_POST['proizvod_id']][] = array(
                "proizvod_id"=>$_POST['proizvod_id'],
                "proizvod_cena"=>$_POST['proizvod_cena'],
                "proizvod_naziv"=>$_POST['proizvod_naziv']
        );
        
         $_SESSION['korpa'][$_POST['proizvod_id']] = array(
            "proizvod_id" => $_POST['proizvod_id'],
            "ukupna_cena" => $_POST['proizvod_cena'] * count($_SESSION['inicijalna_korpa'][$_POST['proizvod_id']]),
            "proizvod_naziv" => $_POST['proizvod_naziv'],
            "proizvod_kolicina" => count($_SESSION['inicijalna_korpa'][$_POST['proizvod_id']])
         );
           
         foreach($_SESSION['korpa'] as $proizvod){
           $cena[] = $proizvod['ukupna_cena'];
           $ukupan_broj_proizvoda[] = $proizvod['proizvod_kolicina'];
         }
         
         $_SESSION['korpa']['ukupna_cena_korpe'] = array_sum($cena);
         $_SESSION['korpa']['ukupno_proizvoda_u_korpi'] = count($_SESSION['inicijalna_korpa']);
         
         $error = false;
         $data = array(
             "data" => $_SESSION['korpa'],
             "error" => $error
         );
         var_dump($data);
         $this->response($data);
       }else{
         $this->response(array('error'=>true,"message"=>"Proizvod nije ubačen u korpu, pokusajte ponovo.","data"=>$_SESSION['korpica']));
       }   
    }
    
    /**
     * Get all product from cart ($_SESSIO)
     * @return json niz proizvoda
     */
    public function dobaviProizvodeZaKorpu(){
        $message = "Vaša korpa je prazna";
        $error = true;
        $results = '';
        if(isset($_SESSION['korpa'])){
            $message = 'ok';
            $error = false;
            $results = $_SESSION['korpa'];
            foreach($results as $uri){
                $results[$uri['proizvod_id']]['url'] = $uri['proizvod_naziv'] = $this->uri($uri['proizvod_naziv']);
            }
        }
        $data = array(
                'error' => $error,
                'message' => $message,
                'proizvodi' => $results,
                'ukupno' => isset($_SESSION['korpica']['cena']) ? $_SESSION['korpica']['cena'] : ''
            );
        $this->response($data);
    }
    
    public function prikaz(){
        Loader::loadView("korpa", "korpa");
    }
    
    public function naruci(){
         Loader::loadView("naruci", "korpa");
    }
    /**
     * Delete product from cart
     */
    public function obrisiProizvodIzKorpe(){
        if(!isset($_POST['id'])) die();
        $proizvod = $_SESSION['korpa'][$_POST['id']];
        $umanjena_cena = $_SESSION['korpica']['cena'] - $proizvod['proizvod_cena'];
        unset($_SESSION['korpa'][$_POST['id']]);
        $_SESSION['korpica']['cena'] = $umanjena_cena;
        $broj_proizvoda = count($_SESSION['korpa']);
        $trenutno_proizvoda  = $_SESSION['korpica']['broj_proizvoda'] - 1;
        $_SESSION['korpica']['broj_proizvoda'] = $trenutno_proizvoda;
        unset($_SESSION['poruceni_proizvodi'][$_POST['id']]);
        $data = array(
            'message' => 'ok',
            'ukupna_cena' => $_SESSION['korpica']['cena'],
            'broj_proizvoda' => $broj_proizvoda,
            'obrisan_proizvod_id' => $_POST['id']
        );
        $this->response($data);
        if($trenutno_proizvoda == 0){
            Session::unsetSession('korpa');
            Session::unsetSession('korpica');
        }
   }
   
   /**
    * 
    */
   public function poruci(){
       $data = $this->validate($_POST);
       $this->porudzbinaModel->ime = $data['ime'];
       $this->porudzbinaModel->prezime = $data['prezime'];
       $this->porudzbinaModel->email = $data['email'];
       $this->porudzbinaModel->telefon = $data['telefon'];
       $this->porudzbinaModel->adresa = $data['adresa'];
       $this->porudzbinaModel->grad = $data['grad'];
       $this->porudzbinaModel->komentar = $data['komentar'];
       $this->porudzbinaModel->postanski_broj = $data['postanski_broj'];
       $this->porudzbinaModel->proizvodi_id = json_encode(Session::get("korpa"));
       $this->porudzbinaModel->cena = $_SESSION['korpica']['cena'];
       $this->porudzbinaModel->postarina = _POSTARINA;
       
       if(is_int((int)$this->porudzbinaModel->insert())){
        $error = true;
        $message = "Doslo je do greske!!";
        $mail = $this->mailer->sendMail(
            "savicdragan2707@gmail",
            "savicdragan2707@gmail.com",
            "Uspesno ste narucili prozivod, kontaktiracemo vas u vezi porudzbine. Vas zenskiugao.com", 
            "Uspesna porudzbina"
        );
       if($mail){
            Session::stop();
            $error = false;
            $message = "Uspesno ste porucili proizvode."; 
       }
       }else{
           $error = true;
           $message = "Doslo je do greske!";
       }
       $data = array(
           "error" => $error,
           "message" => $message
       );
       $this->response($data);
    }
    
    public function test(){
        $porudzbine = $this->porudzbinaModel->getAll();
        //$this->proizvodiModel->select = "slike.id,slike.proizvod_id,slike.slika_naziv";
        $this->proizvodiModel->join = array(
            array("table"=>"kategorije","realtion"=>"proizvodi.kategorija_id = kategorije.id","join"=>"LEFT"),
            array("table"=>"podkategorije","realtion"=>"proizvodi.podkategorija_id = podkategorije.id"),
            array("table"=>"slike","realtion"=>"proizvodi.id = slike.proizvod_id")
        );
        //$this->proizvodiModel->where = "kategorije.id = 2";
        var_dump($this->proizvodiModel->join());
      
        foreach ($porudzbine as $porudzbina){
         // echo $porudzbina->ime."<br>";
          //echo $porudzbina->prezime."<br>";
          foreach (json_decode($porudzbina->proizvodi_id) as $proizvod){
             // var_dump($proizvod);
          }
        }
      
    }
}

