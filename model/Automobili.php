<?php 
	class automobili
	{
		public $naziv;
		public $opis_auta;
		public $broj_vrata;
		public $idauta;
		public $cijena;

		public function __construct($naziv, $opis_auta, $broj_vrata,$idauta,$cijena)
		{
			$this->naziv=$naziv;
			$this->opis_auta=$opis_auta;
			$this->broj_vrata=$broj_vrata;
			$this->idauta=$idauta;
			$this->cijena=$cijena;
		}
	}

	?>