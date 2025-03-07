<!-- VUE DE LA PAGE D'ACCUEIL -->
<?php

class ViewAccueil{
    //!ATTRIBUTS
  private ?string $message = '';
  private ?string $listeJoueurs = '';

    //!GETTER ET SETTER
  public function getMessage(): ?string
  {
    return $this->message;
  }

  public function setMessage(?string $newMessage): self
  {
    $this->message = $newMessage;
    return $this;
  }

  public function getListPlayer(): ?string
  {
    return $this->listeJoueurs;
  }

  public function setListPlayer(?string $newListeJoueurs): self
  {
    $this->listeJoueurs = $newListeJoueurs;
    return $this;
  }

    //!METHOD
    public function displayView(): string{
        return 
            '<main>
                <h1>Nouveau Joueur</h1>
                <section> 
                    <form method="post"> 
                        <label for="pseudo">Pseudo</label> <input type="text" name="pseudo" required> 
                        <label for="email">Email</label> <input type="email" name="email" required> 
                        <label for="score">Score</label> <input type="number" name="score">
                        <label for="psswrd">Mot de passe</label> <input type="password" name="psswrd" required> 
                        <input type="submit" name="inscription" value="Inscription"> 
                    </form> 
                    <p>'.$this->getMessage().'</p> 
                </section> 
                <h2>Liste des Joueurs</h2>
                <section> 
                    <ul> '.$this->getListPlayer().' </ul> 
                </section>
            </main>';
    }
}
?>
    
