<?php

    Class Stylist
    {
        private $name;
        private $id;

    // Constructor for instantiation of stylist class

        function __construct($name, $id = null)
        {
            $this->name = $name;
            $this->id = $id;

        }

    // Getters and Setters for private properties of the Stylist Class

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getId()
        {
            return $this->id;
        }

        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }

    // Methods to interact with the database

        function save()
        {
            $statment = $GLOBALS['DB']->query("INSERT INTO stylist (name) VALUES ('{$this->getName()}') RETURNING id;");
            $result = $statment->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE stylist SET name = {'$new_name'} WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylist WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM client WHERE stylist_id = {$this->getId()};");
        }

        static function getAll()
        {
            $all_stylists = $GLOBALS['DB']->query("SELECT * FROM stylist;");
            $return_stylists = array();

            foreach($all_stylists as $person)
            {
                $name = $person['name'];
                $id = $person['id'];
                $stylist = new Stylist($name, $id);
                array_push($return_stylists, $stylist);
            }
            return $return_stylists;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylist *;");
        }

        static function find($search_id)
        {
            $found_stylist = null;
            $stylists = Stylist::getAll();

            foreach($stylists as $person){
                if($person->getId() == $search_id){
                    $found_stylist = $person;
                }
            }
            return $found_stylist;
        }





    }


 ?>
