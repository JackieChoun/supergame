<?php
//CONTROLER DE LA PAGE D'ACCUEIL
include "./utils/utils.php";
include "./model/model_player.php";
include "./model/model_manager_player.php";
include "./view/header.php";
include "./view/view_accueil.php";
include "./view/footer.php";


class Index{
  private ?ViewAccueil $viewAccueil;
  private ?ModelPlayer $modelPlayer;
  private ?ViewHeader $viewHeader;
  private ?ViewFooter $viewFooter;

  public function __construct(?ViewAccueil $newViewAccueil, ?ModelPlayer $newModelPlayer)
  {
    $this->viewAccueil = $newViewAccueil;
    $this->modelPlayer = $newModelPlayer;
    $this->viewHeader = new ViewHeader();
    $this->viewFooter = new ViewFooter();
  }


  public function getViewHeader(): ?ViewHeader
  {
    return $this->viewHeader;
  }

  public function setViewHeader(?ViewHeader $viewHeader): self
  {
    $this->viewHeader = $viewHeader;
    return $this;
  }

  public function getViewFooter(): ?ViewFooter
  {
    return $this->viewFooter;
  }

  public function setViewFooter(?ViewFooter $viewFooter): self
  {
    $this->viewFooter = $viewFooter;
    return $this;
  }

  public function getViewAccueil(): ?ViewAccueil
  {
    return $this->viewAccueil;
  }

  public function setViewAccueil(?ViewAccueil $viewAccueil): self
  {
    $this->viewAccueil = $viewAccueil;
    return $this;
  }

  public function getModelPlayer(): ?ModelPlayer
  {
    return $this->modelPlayer;
  }

  public function setModelPlayer(?ModelPlayer $modelPlayer): self
  {
    $this->modelPlayer = $modelPlayer;
    return $this;
  }

  public function render(): void
  {
    $this->getViewAccueil()->setMessage($this->getModelPlayer()->addPlayer());

    echo $this->getViewHeader()->displayView();

    echo $this->getViewAccueil()->displayView();

    echo $this->getViewFooter()->displayView();
  }

}

    $home = new Index(new ViewAccueil, new ModelPlayer);
    $home->render();
?>