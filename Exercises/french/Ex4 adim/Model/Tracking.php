<?php

class Track
{
    private $categorie;
    private $compteur;

    public function __construct($categorie)
    {
        $this->categorie = $categorie;
        $this->compteur = 1;
    }

    public function incrementer()
    {
        $this->compteur++;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function getCompteur()
    {
        return $this->compteur;
    }
}

class Tracking
{
    private $tracks;
    private $question;
    private $reponse;

    public function __construct()
    {
        $this->tracks = [];
        $question = false;
        $reponse = false;
    }

    public function questionPosee()
    {
        return $this->question;
    }

    public function poserQuestion()
    {
        $this->question = true;
    }

    public function trackingActive()
    {
        return $this->reponse;
    }

    public function activerTracking()
    {
        $this->reponse = true;
    }

    public function add_track($categorie)
    {
        $index = $this->find_categorie($categorie);
        if ($index == -1)
            $this->tracks[] = new Track($categorie);
        else  $this->tracks[$index]->incrementer();
    }

    private function find_categorie($categorie)
    {
        for ($i = 0; $i < count($this->tracks); $i++) {
            if ($this->tracks[$i]->getCategorie() == $categorie)
                return $i;
        }
        return -1;
    }

    public function get_tracks()
    {
        return $this->tracks;
    }

    function calcul_tracking()
    {
        if (count($this->tracks) == 0)
            return "";
        $max = 0;
        foreach ($this->tracks as $track) {
            if ($track->getCompteur() > $max) {
                $max = $track->getCompteur();
                $catmax = $track->getCategorie();
            }
        }
        return $catmax;
    }
}
