<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <div class="container">
    
        <h1>
        
            <?php

                class Person {

                    private $name;
                    private $lastname;
                    private $dateofbirth;

                    public function __construct($name, $lastname, $dateofbirth){
                        
                        $this -> setName($name);
                        $this -> setLastname($lastname);
                        $this -> setDateofbirth($dateofbirth);

                    }

                    public function getName(){

                        return $this -> name;
                        
                    }

                    public function setName($name){

                        $this -> name = $name;
                    }

                    public function getLastname(){

                        return $this -> lastname;

                    }

                    public function setLastname($lastname){

                        $this -> lastname = $lastname;

                    }

                    public function getDateofbirth(){

                        return $this -> dateofbirth;

                    }

                    public function setDateofbirth($dateofbirth){

                        $this -> dateofbirth = $dateofbirth;

                    }

                    public function __toString(){

                        return
                            'name: ' . $this -> getName() . '<br>'
                            . 'lastname: ' . $this -> getLastname() . '<br>'
                            . 'dateofbirth: ' . $this -> getDateofbirth();                          

                    }

                }

                class Employee extends Person {

                    public $position;
                    public $department;

                    public function __construct($name, $lastname, $dateofbirth, $position, $department){

                        parent:: __construct($name, $lastname, $dateofbirth);

                        $this -> position = $position;
                        $this -> department = $department;

                    }

                    public function __toString(){

                        return parent::__toString() . '<br>'
                            . 'position: ' . $this -> position . '<br>'
                            . 'department: ' . $this -> department;

                    }

                }

                class Boss extends Person {

                    public $sharing;
                    public $headoffice;

                    public function __construct($name, $lastname, $dateofbirth, $sharing, $headoffice){

                        parent:: __construct($name, $lastname, $dateofbirth);

                        $this -> sharing = $sharing;
                        $this -> headoffice = $headoffice;

                    }

                    public function __toString(){

                        return parent::__toString() . '<br>'
                            . 'sharing: ' . $this -> sharing . '<br>'
                            . 'headoffice: ' . $this -> headoffice;

                    }

                }


                $person = new Person('Anna', 'Rossi', '10-10-1960');
                $employee = new Employee('Marco', 'Verdi', '20-05-1980', 'clerk', 'sales');
                $boss = new Boss('Alessandro', 'Bianchi', '10-02-1970', '50%', 'Milano');

                echo $person . '<br><br>'
                    . $employee . '<br><br>'
                    . $boss;


            ?>
        
        
        
        </h1>

    
    </div>
</body>
</html>