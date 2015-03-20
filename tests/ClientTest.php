<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

    class ClientTest extends PHPUnit_Framework_TestCase
    {

    // Clear both tables in the database after each test
        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }

        function test_setName()
        {
            //Arrange
            $name = "tony";
            $id = 1;
            $stylist_id = 5;
            $test_client = new Client($name, $id, $stylist_id);

            //Act
            $test_client->setName('Billy Bob');
            $result = $test_client->getName();

            //Assert
            $this->assertEquals('Billy Bob', $result);
        }

        function test_setId()
        {
            //Arrange
            $name = "yemin";
            $id = 1;
            $stylist_id = 5;
            $test_client = new Client($name, $id, $stylist_id);

            //Act
            $test_client->setId(44);
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(44, $result);
        }

        function test_setStylistId()
        {
            //Arrange
            $name = "tony";
            $id = 1;
            $stylist_id = 5;
            $test_client = new Client($name, $id, $stylist_id);

            //Act
            $test_client->setStylistId(324);
            $result = $test_client->getStylistId();

            //Assert
            $this->assertEquals(324, $result);
        
        }

    }


 ?>
