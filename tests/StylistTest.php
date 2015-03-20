<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once"src/Stylist.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

    class StylistTest extends PHPUnit_Framework_TestCase
    {

    // Clear the stylist database
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
            //Arrange
            $name = "Danny";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            //Act
            $test_stylist->setName('Fred');
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals('Fred', $result);
        }

        function test_setId()
        {
            //Arrange
            $name = "Judy";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            //Act
            $test_stylist->setId(4);
            $result = $test_stylist->getId();

            //Assert
            $this->assertEquals(4, $result);
        }

        function test_save()
        {
            //Arrange
            $name = "Amy";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            //Act
            $test_stylist->save();
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals($test_stylist, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name = "Franny";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $name2 = "Fruddy";
            $id2 = 2;
            $test_stylist2 = new Stylist($name2, $id2);
            $test_stylist2->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist, $test_stylist2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "Jimjim";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();


            //Act
            Stylist::deleteAll();
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_update()
        {
            //Arrange
            $name = "Wanda";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $new_name = "Wendy";

            //Act
            $test_stylist->update($new_name);

            //assert
            $this->assertEquals("Wendy", $test_stylist->getName());
        }

        function test_delete()
        {
            //Arrange
            $name = "Henry";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $name2 = "Homey";
            $id2 = 2;
            $test_cuisine2 = new Stylist($name2, $id2);
            $test_cuisine2->save();

            //Act
            $test_stylist->delete();

            //Assert
            $this->assertEquals([$test_cuisine2], Stylist::getAll());

        }

        function test_find()
        {
            $name = "Billy";
            $id = 4;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $result = Stylist::find($test_stylist->getId());

            $this->assertEquals($test_stylist, $result);
        }




    }

 ?>
