<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once"src/Stylist.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

    class StylistTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Stylist::deleteAll();
        }

        function test_getName()
        {
            //Arrange
            $name = "Johnny";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            //Act
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_setName()
        {
            $name = "Danny";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            //Act
            $test_stylist->setName('Fred');
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals('Fred', $result);
        }



    }

 ?>
