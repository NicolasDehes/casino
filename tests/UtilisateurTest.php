<?php

use modele\metier\Utilisateur;
use PHPUnit\Framework\TestCase;

final class UtilisateurTest extends TestCase
{
    // setUpBeforeClass
    public static function setUpBeforeClass(): void
    {
        require_once ('./modele/metier/Utilisateur.php');
    }

    // test instance of
    public function testInstanceOf(): void
    {
        $stub = $this->createMock(Utilisateur::class);
        $this->assertInstanceOf(Utilisateur::class, $stub);
    }

    public function testGetSoldeReturnSolde(): void
    {
        $stub = $this->createMock(Utilisateur::class);
        $stub->method('getSolde')->willReturn(50.0);
        $this->assertSame(50.0,  $stub->getSolde());
    }
}

