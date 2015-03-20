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
            $s_name = "T";
            $id = 1;
            $test_stylist = new Stylist($s_name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "tony";
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
            $s_name = "T";
            $id = 1;
            $test_stylist = new Stylist($s_name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "yemin";
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
            $s_name = "T";
            $id = 1;
            $test_stylist = new Stylist($s_name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "tony";
            $test_client = new Client($name, $id, $stylist_id);

            //Act
            $test_client->setStylistId(324);
            $result = $test_client->getStylistId();

            //Assert
            $this->assertEquals(324, $result);

        }

        function test_save()
        {
            //Arrange
            $s_name = "Benny";
            $id = 1;
            $test_stylist = new Stylist($s_name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();


            $name = "JoAnn";
            $test_client = new Client($name, $id, $stylist_id);

            //Act

            $test_client->save();

            //Assert
            $result = Client::getAll();
            $this->assertEquals($test_client, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $s_name = "Benny";
            $id = 1;
            $test_stylist = new Stylist($s_name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "Annie";
            $test_client = new Client($name, $id, $stylist_id);
            $test_client->save();

            $name2 = "Frank";
            $id2 = 21;
            $test_client2 = new Client($name2, $id2, $stylist_id);
            $test_client2->save();

            //Act

            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $s_name = "Benny";
            $id = 1;
            $test_stylist = new Stylist($s_name, $id);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "Bobo";
            $test_client = new Client($name, $id, $stylist_id);
            $test_client->save();

            $name2 = "BeBe";
            $id2 = 21;
            $test_client2 = new Client($name2, $id2, $stylist_id);
            $test_client2->save();

            //Act
            Client::deleteAll();

            //Assert
            $result = Client::getAll();
            $this->assertEquals([], $result);
        }

    }


 ?>
