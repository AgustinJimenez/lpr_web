<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    //use WithoutMiddleware;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {

      $credentials = [
           'email'    => 'sramirez@zentcode.com',
           'password' => '123'
      ];

      $this->visit('/backend')
            ->submitForm('Entrar',  $credentials)
            ->see('Dashboard');
      $this->visit('/backend/accesos/accesos')->see('Accesos');
    }
}
