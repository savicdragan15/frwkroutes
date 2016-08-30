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
       
        if(isset($_POST['proizvod_id']) && !empty($_POST['proizvod_id'])){
          
       /* $_SESSION['inicijalna_korpa'][$_POST['proizvod_id']][] = array(
                "proizvod_id"=>$_POST['proizvod_id'],
                "proizvod_cena"=>(float)$_POST['proizvod_cena'],
                "proizvod_naziv"=>$_POST['proizvod_naziv'],
                "proizvod_slika" => $_POST['proizvod_slika']
        );*/
        $kolicina = $_POST['proizvod_kolicina'];
        $cena =  $kolicina * $_POST['proizvod_cena'];
        
        if(isset($_SESSION['korpa'][$_POST['proizvod_id']])){
            $kolicina += $_SESSION['korpa'][$_POST['proizvod_id']]['proizvod_kolicina'];
            $cena = $_SESSION['korpa'][$_POST['proizvod_id']]['ukupna_cena'] + $_POST['proizvod_kolicina'] * $_POST['proizvod_cena'];
        }
         
         $_SESSION['korpa'][$_POST['proizvod_id']] = array(
            "proizvod_id" => $_POST['proizvod_id'],
            "ukupna_cena" => $cena,
            "proizvod_naziv" => $_POST['proizvod_naziv'],
            "proizvod_slika" => $_POST['proizvod_slika'],
            "proizvod_kolicina" => $kolicina * $_POST['proizvod_kolicina'],
            "proizvod_cena" => (float)$_POST['proizvod_cena']
         );
         
         $ukupno_proizvoda_u_korpi = 0;
         foreach($_SESSION['korpa'] as $proizvod){
           $cena_korpe[] = $proizvod['ukupna_cena'];
           $ukupno_proizvoda_u_korpi += $proizvod['proizvod_kolicina'];
         }
         
         $_SESSION['korpa']["ukupna_cena_korpe"] = array_sum($cena_korpe);
         $_SESSION['korpa']["ukupno_proizvoda_u_korpi"] = $ukupno_proizvoda_u_korpi;
         
         $error = false;
         $data = array(
             "data" => $_SESSION['korpa'],
             "error" => $error
         );
         //var_dump($_SESSION['korpa']); die;
         $this->response($data);
       }
    }
    
    public function cartDialog(){
        
        $this->template['products'] = Session::get('korpa');
        
        Loader::loadPartialView('_cartdialog', 'cart', false, $this->template);
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
    public function removeFromCart(){
        //var_dump($_POST,$_SESSION['korpa']); die;
       if(isset($_POST['proizvod_id'])){
            $id = $this->filter_input($_POST['proizvod_id']);
            $_SESSION['korpa']['ukupna_cena_korpe'] = $_SESSION['korpa']['ukupna_cena_korpe'] - $_SESSION['korpa'][$id]['ukupna_cena'];
            //unset($_SESSION['inicijalna_korpa'][$id]);
            unset($_SESSION['korpa'][$id]);
            $broj_proizvoda_u_korpi = $_POST['izbaceno_proizvoda'];
            $_SESSION['korpa']['ukupno_proizvoda_u_korpi'] =  $_SESSION['korpa']['ukupno_proizvoda_u_korpi'] - $broj_proizvoda_u_korpi;
            
            $data = array(
                "proizvod_id" => $id,
                "broj_proizvoda_u_korpi" => $_SESSION['korpa']['ukupno_proizvoda_u_korpi'],
                "ukupna_cena_korpe" => $_SESSION['korpa']['ukupna_cena_korpe'] 
            );
            
            $this->response($data);
            
            if($_SESSION['korpa']['ukupno_proizvoda_u_korpi'] <= 0){
                 unset($_SESSION['korpa']);
                // unset($_SESSION['inicijalna_korpa']);
            }
            
       }
       
   }
   
   public function updateCart(){
       
       /*var_dump($_SESSION['korpa']);
       die;*/
       
        $proizvod_id = $_POST['proizvod_id'];
        $kolicina = $_POST['kolicina'];
        $_SESSION['korpa'][$proizvod_id]['ukupna_cena'] = $kolicina * $_SESSION['korpa'][$proizvod_id]['proizvod_cena']; 
       // $predhodna_kolicina = $_POST['kolicina']-$_SESSION['korpa'][$proizvod_id]['proizvod_kolicina'];
        $_SESSION['korpa'][$proizvod_id]['proizvod_kolicina'] = $kolicina;
        
        //$_SESSION['korpa']['ukupno_proizvoda_u_korpi'] = $kolicina;
        foreach($_SESSION['korpa'] as $proizvod){
           $cena_korpe[] = $proizvod['ukupna_cena'];
           $kolicina_korpe[] = $proizvod['proizvod_kolicina'];
         }
        $_SESSION['korpa']['ukupna_cena_korpe'] = array_sum($cena_korpe);
        $_SESSION['korpa']['ukupno_proizvoda_u_korpi'] = array_sum($kolicina_korpe);
       /* var_dump($_SESSION['korpa']);
       die;*/
        $data = array(
            "proizvod_id" => $proizvod_id,
            "ukupna_cena_korpe" => $_SESSION['korpa']['ukupna_cena_korpe'],
            "cena_proizvoda" => $_SESSION['korpa'][$proizvod_id]['ukupna_cena'],
            "ukupno_proizvoda_u_korpi" => $_SESSION['korpa']['ukupno_proizvoda_u_korpi']
        );
        $this->response($data);
       // var_dump($_SESSION['korpa']);
       
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

