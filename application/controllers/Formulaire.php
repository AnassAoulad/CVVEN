<?php

class Formulaire extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
       
        
        $this->load->model('Reservation_modele');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }
    
    public function create(){
        
        $this->form_validation->set_rules('nom','Nom', 'required');
        $this->form_validation->set_rules('prenom','Prénom','required');
        $this->form_validation->set_rules('adresse','Adresse','required');
        $this->form_validation->set_rules('tel','Téléphone','required');
        $this->form_validation->set_rules('mail','Adresse mail','required');
        $this->form_validation->set_rules('mdp', 'Mot de passe','required');
        $this->form_validation->set_rules('confirmMdp', 'Mot de passe','required|matches[mdp]');
        
        if($this->form_validation->run()===FALSE){
            $this->load->view('formulaire/inscription');            
        }
        else {
            $this->Reservation_modele->set_formulaire();
            $this->load->view('formulaire/successInscription');
        }
    }
    
    
    public function testConnexionAdmin(){
        
        
        $this->form_validation->set_rules('mailAdmin',"Identifiant", 'required');
        $this->form_validation->set_rules('mdpAdmin','Mot de passe','required|callback_verifMdpAdmin');
        
        if($this->form_validation->run()===FALSE){
            $this->load->view('formulaire/connexionAdmin');
        
        }
        else{
            
            $idadmin=$this->input->post('mailAdmin');
            $this->session->id = $idadmin;
            $numAdmin= $this->Reservation_modele->getIdAdmin();
            $this->session->numAdmin = $numAdmin[0]['idadmin'];
            //$this->load->view('administration/accueilAdmin');
            redirect('formulaire/homeAdmin');
            
        }
    }
    
    public function homeAdmin(){
        $this->load->view('administration/accueilAdmin');
        //redirect('formulaire/gestionProfil');
    }
    
    public function verifMdpAdmin(){
        if(isset($this->Reservation_modele->getMdpAdmin()[0]['mdp_connexion'])){
            if($this->Reservation_modele->getMdpAdmin()[0]['mdp_connexion']==$this->input->post('mdpAdmin')){
                return TRUE;
            }
            else{
                $this->form_validation->set_message('verifMdp','Mauvais mot de passe');
            }
        }
        else{
            echo "error";
        }
    }
    
    public function gestionProfil(){
        $data['NumClient']=$this->Reservation_modele->getIdAdmin();
        $data['dataGestion']=$this->Reservation_modele->getDemande();
        echo ("Compte : ".$this->session->id."<br><br>");
        //echo ("num : ".$this->session->numClient."<br>");
        $this->load->view('administration/gestionAdmin',$data);
        
    }
    
    public function testConnexion(){
        
        $this->form_validation->set_rules('mail',"Identifiant", 'required');
        $this->form_validation->set_rules('mdp','Mot de passe','required|callback_verifMdp');
        
        if($this->form_validation->run()===FALSE){
            $this->load->view('formulaire/connexion');
        
        }
        else{
            
            $id=$this->input->post('mail');
            $this->session->id = $id;
            $numClient= $this->Reservation_modele->getId();
            $this->session->numClient = $numClient[0]['idclient'];
            redirect('formulaire/monProfil');
            
        }
    }

            
        
    public function verifMdp(){
        if(isset($this->Reservation_modele->getMdp()[0]['mdp_connexion'])){
            if($this->Reservation_modele->getMdp()[0]['mdp_connexion']==$this->input->post('mdp')){
                return TRUE;
        }
            else{
                $this->form_validation->set_message('verifMdp','Mauvais mot de passe');
            }
        }
        else{   
            echo("error");
        }    
        
    }
    
    public function verifAncienMdp(){
        if(isset($this->Reservation_modele->getAncienMdp()[0]['mdp_connexion'])){
            if($this->Reservation_modele->getAncienMdp()[0]['mdp_connexion']==$this->input->post('oldMdp')){
                return TRUE;
            }
            else{
                $this->form_validation->set_message('verifMdp','Mauvais mot de passe');
            }
        }
        else{   
            echo("error");
        
        }
    }
    
    public function modifierPassword(){
        $this->form_validation->set_rules('oldMdp','AncienMotDePasse', 'required|callback_verifAncienMdp');
        $this->form_validation->set_rules('newMdp','NouveauMotDePasse','required');
        $this->form_validation->set_rules('confirmNewMdp','ConfirmNewMotDePasse','required|matches[newMdp]');
        
         if($this->form_validation->run()===FALSE){
            $this->load->view('formulaire/modifPassword');            
        }
        else {
            $this->Reservation_modele->updatePassword();
            $this->load->view('formulaire/successInscription');
        }
    }
    
    public function monProfil(){
        if(isset($this->session->id)){
            $data['dataReservation']=$this->Reservation_modele->getReservation();
            $data['ReservConfirmer']=$this->Reservation_modele->getReservConfirmer();
            $data['dataNumClient']=$this->Reservation_modele->getId();
            echo ("Compte : ".$this->session->id."<br><br>");
            //echo ("num : ".$this->session->numClient."<br>");
            $this->load->view('formulaire/profil',$data);
       
        }
        
    }
    
    public function deconnexion(){
        $this->session->sess_destroy();
        $this->load->view('formulaire/pageDeconnexion');
    }
    
    
    public function formulaireReservation(){
        
        
        $this->form_validation->set_rules('nbpersonnes', 'nbpersonnes', 'required');
        $this->form_validation->set_rules('datevacances', 'datevacances','required');
        $this->form_validation->set_rules('typepension', 'typepension','required');
        $this->form_validation->set_rules('menagereservation', 'menagereservation');        
        
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('formulaire/reservation');
        }
        
        else
        {
            $this->Reservation_modele->setReservation();
            redirect('formulaire/monProfil');
        }
    
    }
    
    public function validerRecupReservation() {
        $this->form_validation->set_rules('idreservAccepter', 'idreservAccepter', 'required');
        if ($this->form_validation->run() === FALSE){
            redirect('formulaire/gestionProfil');
        }
        else {
            $data['affichageInfo']=$this->Reservation_modele->getRecupInfoValider();
            //echo ("Compte : ".$this->session->id."<br><br>");
            //echo ("num : ".$this->session->numClient."<br>");
            $this->load->view('administration/AccepterReservation',$data);
        }
    }
    
    public function refuserRecupReservation() {
        $this->form_validation->set_rules('idreservRefuser', 'idreservRefuser', 'required');
        if ($this->form_validation->run() === FALSE){
            redirect('formulaire/gestionProfil');
        }
        else {
            $data['affichageInfo']=$this->Reservation_modele->getRecupInfoRefuser();
            $this->load->view('administration/RefuserReservation',$data);
        }
    }
    
    public function enregistrement(){
        $this->Reservation_modele->setInsertInfo();
        $this->Reservation_modele->setSuppressionTempo();
        redirect('formulaire/gestionProfil');
    }
    
    public function suppression(){
        $this->Reservation_modele->setSuppressionTempo();
        redirect('formulaire/gestionProfil');
    }
    
    public function modifReservation(){
        $this->form_validation->set_rules('idreservAccepter', 'idreservAccepter', 'required');
        if ($this->form_validation->run() === FALSE){
            redirect('formulaire/homeAdmin');
        }
        else {
            $data['affichageInfo']=$this->Reservation_modele->getModifDemande();
            $this->load->view('administration/modifierReservation', $data);
        }
    }
    
    public function updateReservation() {
        $this->Reservation_modele->setUpdateReserv();
        redirect('formulaire/homeAdmin');
    }
    /*
    public function majValiderReservation() {
        $this->Reservation_modele->setmodificationReservation();
        redirect('administration/gestionAdmin');
    }*/
    
    
}
