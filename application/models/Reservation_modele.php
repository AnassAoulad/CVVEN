<?php

class Reservation_modele extends CI_Model {
    
    public function __construct(){
        $this->load->database();        
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    
    public function set_formulaire(){

        
        $data =array(
            'nom_client' => $this->input->post('nom'),
            'prenom_client'=> $this->input->post('prenom'),
            'adresse_client' => $this->input->post('adresse'),
            'tel_client' => $this->input->post('tel'),
            'id_connexion' => $this->input->post('mail'),
            'mdp_connexion' => $this->input->post('mdp')
        );
        
        return $this->db->insert('client', $data);
    }
    
    public function getId(){
        $this->db->select('*')
                 ->from('client')
                 ->where('id_connexion',$this->session->id);
        $query=$this->db->get();
        return $query->result_array();
    }
    
   
    public function getMdp(){
        $this->db->select('mdp_connexion')
                 ->from ('client') 
                 ->where ('id_connexion', $this->input->post('mail'));
        $query= $this->db->get();   
        return $query->result_array();
    }
    
    public function getAncienMdp(){
        $this->db->select('mdp_connexion')
                        ->from ('client') 
                        ->where ('id_connexion', $this->session->id);
        $query= $this->db->get();   
        return $query->result_array();
    }
    
    public function updatePassword(){
        $this->db->set('mdp_connexion',$this->input->post('newMdp'))
                  ->where('id_connexion',$this->session->id)
                  ->update('client');
    }
    
    public function getIdAdmin(){
        $this->db->select('*')
                 ->from('administrateur')
                 ->where('id_connexion',$this->session->idAdmin);
        $query=$this->db->get();
        return $query->result_array();
    }
   
    public function getMdpAdmin(){
        $this->db->select('mdp_connexion')
                 ->from ('administrateur') 
                 ->where ('id_connexion', $this->input->post('mailAdmin'));
        $query= $this->db->get();   
        return $query->result_array();
    }
    
    public function setReservation(){
        
        $data['numClient'] = $this->Reservation_modele->getId();
        $data['MenageReservation'] = 'menagereservation';
        
        
        $date_maintenant=date('Y-m-d');
        
        $data = array(       
        'datereservation'=> $date_maintenant,
        'nbpersonnes'=> $this->input->post('nbpersonnes'),
        'datevacances'=> $this->input->post('datevacances'),
        'typepension'=> $this->input->post('typepension'),
        'menagereservation'=> $this->input->post('menagereservation'),
        'etatreserv'=> "en attente",
        'idclient'=> $this->session->numClient
        );
                                    
        return $this->db->insert('verificationreservation', $data);                     
    }

    
    public function getReservation(){
      $this->db->select('*')
                   ->from('verificationreservation')
                    ->join ('client','verificationreservation.idclient = client.idclient')
                   ->where('id_connexion',$this->session->id);
        $query= $this->db->get();   
        return $query->result_array();
    }
    
    public function getReservConfirmer(){
        $this->db->select('*')
                ->from('reservation')
                ->join('client','reservation.idclient = client.idclient')
                ->where('id_connexion', $this->session->id);
        $query=$this->db->get();
        return $query->result_array();
    }
    
    public function getDemande() {
        $this->db->select('*')
                ->from('verificationreservation');
        $query=$this->db->get();
        return $query->result_array();
    }
    
    public function getModifDemande() {
        $this->db->select('*')
                ->from('reservation')
                ->where('idreserv',$this->input->post('idreservAccepter'));
        $query=$this->db->get();
        return $query->result_array();
    }
    
    public function getRecupInfoValider() {
        $this->db->select('*')
                ->from('verificationreservation')
                ->where('idreserv', $this->input->post('idreservAccepter'));
        $query=$this->db->get();
        return $query->result_array();
    }
    
    public function getRecupInfoRefuser() {
        $this->db->select('*')
                ->from('verificationreservation')
                ->where('idreserv', $this->input->post('idreservRefuser'));
        $query=$this->db->get();
        return $query->result_array();
    }
    
    public function setInsertInfo() {
        if ($this->input->post('menagereservation')==true){
            $data = array(   
                'idclient'=> $this->input->post('idclient'),
                'idreserv'=>$this->input->post('idreserv'),
                'datereservation'=> $this->input->post('datereservation'),
                'nbpersonnes'=> $this->input->post('nbpersonnes'),
                'datevacances'=> $this->input->post('datevacances'),
                'typepension'=> $this->input->post('typepension'),
                'menagereservation'=> 'true',
                'etatreserv'=> "Reserve",
        );
            return $this->db->insert('reservation', $data);
        }
        elseif($this->input->post('menagereservatio')==false){
            $data = array(   
                'idclient'=> $this->input->post('idclient'),
                'idreserv'=>$this->input->post('idreserv'),
                'datereservation'=> $this->input->post('datereservation'),
                'nbpersonnes'=> $this->input->post('nbpersonnes'),
                'datevacances'=> $this->input->post('datevacances'),
                'typepension'=> $this->input->post('typepension'),
                'menagereservation'=> 'false',
                'etatreserv'=> "Reserve",
            
            );
            return $this->db->insert('reservation', $data);
        };                        
                             
    }
    
    public function setSuppressionTempo() {
        $data = $this->input->post('idreserv'); 
        $this->db->where('idreserv', $data);
        return $this->db->delete('verificationreservation');
    }
    
    public function setUpdateReserv() {
        $data = array(  
            'datereservation'=> $this->input->post('datereservation'),
            'nbpersonnes'=> $this->input->post('nbpersonnes'),
            'datevacances'=> $this->input->post('datevacances'),
            'typepension'=> $this->input->post('typepension'),
            'menagereservation'=> 'false',
            'etatreserv'=> "Reserve",
        );
        $this->db->where('idreserv', $this->input->post('idreserv'));
        return $this->db->update('reservation',$data);
    }
    
}