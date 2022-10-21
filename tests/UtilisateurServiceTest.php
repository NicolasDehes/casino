<?php

use modele\service\UtilisateurService;
use PHPUnit\Framework\TestCase;

final class UtilisateurServiceTest extends TestCase
{
    // setUpBeforeClass
    public static function setUpBeforeClass(): void
    {
        require_once ('./modele/service/UtilisateurService.php');
    }

    // test instance of
    public function testInstanceOf(): void
    {
        $stub = $this->createMock(UtilisateurService::class);
        $this->assertInstanceOf(UtilisateurService::class, $stub);
    }
}

