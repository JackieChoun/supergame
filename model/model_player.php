<?php
//MODEL POUR LA TABLE JOUEURS
class ModelPlayer{
    //!ATTRIBUTS
    private ?int $id;
    private ?string $pseudo;
    private ?string $email;
    private ?string $password;
    private ?int $score;
    private ?PDO $bdd;
    
    //!CONSTRUCTEUR
    public function __construct(){
        $this->bdd = connect();
    }

    //!GETTER ET SETTER
    public function getId(): ?int{
        return $this->id;
    }
    public function setId(?int $newId):self{
        $this->id = $newId;
        return $this;
    }
    public function getPseudo(): ?string{
        return $this->pseudo;
    }
    public function setPseudo(?string $newPseudo):self{
        $this->pseudo = $newPseudo;
        return $this;
    }
    public function getEmail(): ?string{
        return $this->email;
    }
    public function setEmail(?string $newEmail):self{
        $this->email = $newEmail;
        return $this;
    }
    public function getPassword(): ?string{
        return $this->password;
    }
    public function setPassword(?string $newPassword):self{
        $this->password = $newPassword;
        return $this;
    }
    public function getScore(): ?int{
        return $this->score;
    }
    public function setScore(?int $newScore):self{
        $this->score = $newScore;
        return $this;
    }
    public function getBdd(): ?PDO{
        return $this->bdd;
    }
    public function setBdd(?PDO $newBdd):self{
        $this->bdd = $newBdd;
        return $this;
    }

    //!METHODS
    public function add():?string{
        try{
            $req = $this->getBdd()->prepare("INSERT INTO players(pseudo, psswrd, email, score) VALUES(?, ?, ?,?)");
    
            $nickname = $this->getPseudo();
            $psswrd = $this->getPassword();
            $email = $this->getEmail();	
            $score = $this->getScore();
            
            $req->bindParam(1, $this->pseudo, PDO::PARAM_STR);
            $req->bindParam(2, $this->psswrd, PDO::PARAM_STR);
            $req->bindParam(3, $this->email, PDO::PARAM_STR);
            $req->bindParam(4, $this->score, PDO::PARAM_INT);
            $req->execute();
            return "Inscription de $this->pseudo réussi.";
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }

    public function addPlayer():string{
        if(isset($_POST["inscription"])){
            //! 1er étape: vérifier les champs vides
            if(isset($_POST["pseudo"]) && !empty($_POST["pseudo"]) && isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["psswrd"]) && !empty($_POST["psswrd"]) && isset($_POST["score"]) && !empty($_POST["score"])){
                    //! 2eme étape: vérifier format
                    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                        //! 3eme étape: nettoyer les données
                        $nickname = sanitize($_POST["pseudo"]);
                        $email = sanitize($_POST["email"]);
                        $psswrd = sanitize($_POST["psswrd"]);
                        $score = sanitize($_POST["score"]);
                        //!chiffrage mdp
                        $psswrd = password_hash($psswrd, PASSWORD_BCRYPT);

                        //! 4eme étape: vérifier si l'email existe déjà
                        // $this->getModelPlayer()->setEmail($email);
                        // $data = $this->getModelPlayer()->getByEmail();

                        if(empty($data)){

                            $this->getModelPlayer()->setPseudo($pseudo);
                            $this->getModelPlayer()->setScore($score);
                            $this->getModelPlayer()->setPassword($psswrd);
                            $this->getModelPlayer()->setEmail($email);

                            $this->getModelUser()->add();

                            return "Inscription de $this->pseudo réussi.";
                        
                        }else{
                            return "Email déjà utilisé";
                        }

                    }else{
                        return "Email non valide";
                    }
                        
            }else{   
            return "Remplir tous les champs obligatoires svp";
            }
        }else{
            return "Appuyer sur le bouton pour vous inscrire";
        }
    }


}
?>