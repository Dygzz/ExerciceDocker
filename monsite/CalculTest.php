<?php
use PHPUnit\Framework\TestCase;
class CalculTest extends TestCase
{
    public function testfactorielleNegative()
    {
        $Calcul = new Calcul();
        $this->expectException('LogicException');
	$Calcul->factorielle(-5);
    }

    /**
     * @dataProvider numberFibonnacci
     */
    public function testfibonacci($iterration, $result)
    {
        $Calcul = new Calcul();
        $this->assertSame($result, $Calcul->fibonacci($iterration));
    }

    /**
     * @dataProvider numberFactorielle
     */
    public function testfactorielle($nombre, $result)
    {
        $Calcul = new Calcul();
        $this->assertSame($result, $Calcul->factorielle($nombre));
    }

    public function numberFibonnacci() {
        return [
            [5,5],
            [8,21],
            [12,144]
        ];
    }

    public function numberFactorielle() {
        return [
            [5,120],
            [8,40320],
            [12,479001600]
        ];
    }
}

