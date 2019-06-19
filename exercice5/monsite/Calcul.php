<?php
class Calcul {
    function fibonacci($nombreIteration) {
        $a = 0;
        $b = 1;
        for ($i = 0; $i < $nombreIteration - 1; $i ++) 
        {
            $c = $a + $b;
            $a = $b;
            $b = $c;
        }
	return $b;
    }

    function factorielle($nombre) {
	if ($nombre < 0) {
	     throw new \LogicException('Le nombre ne peut pas être négatif.');
	}
        $resultat = 1;
        for ($i = 1; $i <= $nombre; $i++) {
            $resultat *= $i;
        }
        return $resultat;
    }
}

