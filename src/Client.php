<?php

    Class Client
    {
        private $name;
        private $id;
        private $stylist_id;

    // Constructor for instantiation of stylist class

        function __construct($name, $id = null, $stylist_id)
        {
            $this->name = $name;
            $this->id = $id;
            $this->stylist_id = $stylist_id

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

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function setStylistId($new_id)
        {
            $this->stylist_id = (int) $new_id;
        }

    // Methods to interact with the database

        function save()
        {
            $statment = $GLOBALS['DB']->query("INSERT INTO clinet (name, stylist_id) VALUES ('{$this->getName()}', {$this->stylist_id}) RETURNING id;");
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
            $GLOBALS['DB']->exec("DELETE FROM client WHERE name = {$this->getName()};");
        }

        static function getAll()
        {
            $all_clients = $GLOBALS['DB']->query("SELECT * FROM client;");
            $return_clients = array();

            foreach($all_clients as $person)
            {
                $name = $person['name'];
                $id = $person['id'];
                $stylist_id = $person['id'];
                $client = new Client($name, $id, $stylist_id);
                array_push($return_clients, $client);
            }
            return $return_clients;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM client *;");
        }




    }


 ?>
