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
                    private $dateOfBirth;
                    private $securyLvl;
                    public function __construct($name, $lastname, $dateOfBirth, $securyLvl) {
                        $this -> setName($name);
                        $this -> setLastname($lastname);
                        $this -> setDateOfBirth($dateOfBirth);
                        $this -> setSecuryLvl($securyLvl);
                    }
                    public function getName() {
                        return $this -> name;
                    }
                    public function setName($name) {
                        
                        if (strlen($name) <= 3) {
                            $e = new InvalidName('Name must have at least 4 characters');
                            throw $e;
                        }

                        $this -> name = $name;
                    }
                    public function getLastname() {
                        return $this -> lastname;
                    }
                    public function setLastname($lastname) {

                        if (strlen($lastname) <= 3) {
                            $e = new InvalidLastname('Lastname must have at least 4 characters');
                            throw $e;
                        }

                        $this -> lastname = $lastname;
                    }
                    public function getFullname() {
                        return $this -> getName() . ' ' . $this -> getLastname();
                    }
                    public function getDateOfBirth() {
                        return $this -> dateOfBirth;
                    }
                    public function setDateOfBirth($dateOfBirth) {
                        $this -> dateOfBirth = $dateOfBirth;
                    }
                    public function getSecuryLvl() {
                        return $this -> securyLvl;
                    }
                    public function setSecuryLvl($securyLvl) {

                        if ($securyLvl != 0) {
                            $e = new InvalidSecuryLvl('Person security level must be 0');
                            throw $e;
                        }

                        $this -> securyLvl = $securyLvl;
                    }
                    public function __toString() {
                        return 
                            'name: ' . $this -> getName() . '<br>'
                            . 'lastname: ' . $this -> getLastname() . '<br>'
                            . 'dateOfBirth: ' . $this -> getDateOfBirth() . '<br>'
                            . 'securyLvl: ' . $this -> getSecuryLvl() . '<br>';
                    }
                }
                // VERSIONE 1
                class Employee extends Person {
                    private $ral;
                    private $mainTask;
                    private $idCode;
                    private $dateOfHiring;
                    public function __construct($name, $lastname, $dateOfBirth, $securyLvl,
                                                $ral, $mainTask, $idCode, $dateOfHiring) {
                        parent::__construct($name, $lastname, $dateOfBirth, $securyLvl);
                        $this -> setRal($ral);
                        $this -> setMainTask($mainTask);
                        $this -> setIdCode($idCode);
                        $this -> setDateOfHiring($dateOfHiring);
                    }

                    public function setSecuryLvl($securyLvl){

                        if ($securyLvl < 1 || $securyLvl > 5) {
                            $e = new InvalidSecuryLvl('Employee security level must be between 1 and 5');
                            throw $e;
                        }

                        $this -> securyLvl = $securyLvl;
                    }

                    public function getRal() {
                        return $this -> $ral;
                    }
                    public function setRal($ral) {

                        if ($ral < 10000 || $ral > 100000) {
                            $e = new InvalidRal('ral must be between 10000 and 100000');
                            throw $e;
                        }

                        $this -> ral = $ral;
                    }
                    public function getMainTask() {
                        return $this -> $mainTask;
                    }
                    public function setMainTask($mainTask) {
                        $this -> mainTask = $mainTask;
                    }
                    public function getIdCode() {
                        return $this -> $idCode;
                    }
                    public function setIdCode($idCode) {
                        $this -> idCode = $idCode;
                    }
                    public function getDateOfHiring() {
                        return $this -> $dateOfHiring;
                    }
                    public function setDateOfHiring($dateOfHiring) {
                        $this -> dateOfHiring = $dateOfHiring;
                    }
                    public function __toString() {
                        return parent::__toString() . '<br>'
                            . 'ral: ' . $this -> ral . '<br>'
                            . 'mainTask: ' . $this -> mainTask . '<br>'
                            . 'idCode: ' . $this -> idCode . '<br>'
                            . 'dateOfHiring: ' . $this -> dateOfHiring . '<br>';
                    }
                
                }

                class Boss extends Employee {
                    private $profit;
                    private $vacancy;
                    private $sector;
                    private $employees;
                    public function __construct($name, $lastname, $dateOfBirth, $securyLvl,
                                                $ral, $mainTask, $idCode, $dateOfHiring,
                                                $profit, $vacancy, $sector, $employees = []) {
                        parent::__construct($name, $lastname, $dateOfBirth, $securyLvl,
                                            $ral, $mainTask, $idCode, $dateOfHiring);
                        $this -> setProfit($profit);
                        $this -> setVacancy($vacancy);
                        $this -> setSector($sector);
                        $this -> setEmployees($employees);
                    }

                    public function setSecuryLvl($securyLvl){

                        if ($securyLvl < 6 || $securyLvl > 10) {
                            $e = new InvalidSecuryLvl('Boss security level must be between 6 and 10');
                            throw $e;
                        }

                        $this -> securyLvl = $securyLvl;
                    }

                    public function getProfit() {
                        return $this -> profit;
                    }
                    public function setProfit($profit) {
                        $this -> profit = $profit;
                    }
                    public function getVacancy() {
                        return $this -> vacancy;
                    }
                    public function setVacancy($vacancy) {
                        $this -> vacancy = $vacancy;
                    }
                    public function getSector() {
                        return $this -> sector;
                    }
                    public function setSector($sector) {
                        $this -> sector = $sector;
                    }
                    public function getEmployees() {
                        return $this -> employees;
                    }

                    public function setEmployees($employees) {

                        if ($employees == [] || !is_array($employees)) {
                            $e = new NoEmployees('Boss must have employees');
                            throw $e;
                        }

                        $this -> employees = $employees;
                    }

                    public function __toString() {
                        return parent::__toString() . '<br>'
                                . 'profit: ' . $this -> getProfit() . '<br>'
                                . 'vacancy: ' . $this -> getVacancy() . '<br>'
                                . 'sector: ' . $this -> getSector() . '<br>'
                                . 'employees:<br>' . $this -> getEmpsStr() . '<br>';
                    }
                    private function getEmpsStr() {
                        $str = '';
                        for ($x=0;$x<count($this -> getEmployees());$x++) {
                            $emp = $this -> getEmployees()[$x];
                            $fullname = $emp -> getName() . ' ' . $emp -> getLastname();
                            $str .= ($x + 1) . ': ' . $fullname . '<br>';
                        }
                        return $str;
                    }                    
                }
                
                class InvalidName extends Exception {}
                class InvalidLastname extends Exception {}
                class InvalidSecuryLvl extends Exception {}
                class InvalidRal extends Exception{}
                class NoEmployees extends Exception {}

                // PERSON
                try {
                    echo 'Person: <br>';
                    $p1 = new Person(
                        '(p)name',
                        '(p)lastname',
                        '(p)dateOfBirth',
                        0, //security level
                    );
                    echo $p1;
                } catch (InvalidName $e) {
                    echo 'Error: Name is too short!<br>';
                } catch (InvalidLastname $e){
                    echo 'Error: Lastname is too short!<br>';
                } catch (InvalidSecuryLvl $e){
                    echo 'Error: Invalid security level!';
                } finally {
                    echo '<br><br>';
                }

                // EMPLOYEE
                try {
                    echo 'Employee: <br>';
                    $e1 = new Employee(
                        '(e)name',
                        '(e)lastname',
                        '(e)dateOfBirth',
                        4, //security level
                        220000, //ral
                        '(e)mainTask',
                        '(e)idCode',
                        '(e)dateOfHiring',
                    );
                    echo $e1;
                } catch (InvalidName $e) {
                    echo 'Error: ' . $e -> getMessage();
                } catch (InvalidLastname $e) {
                    echo 'Error: ' . $e -> getMessage();
                } catch (InvalidSecuryLvl $e) {
                    echo 'Error: ' . $e -> getMessage();
                } catch (InvalidRal $e) {
                    echo 'Error: ' . $e -> getMessage();
                } finally {
                    echo '<br><br>';
                }

                // BOSS
                try {
                    echo 'Boss: <br>';
                    $b1 = new Boss(
                        '(b)name',
                        '(b)lastname',
                        '(b)dateOfBirth',
                        8, //security Level
                        70000, //ral
                        '(b)mainTask',
                        '(b)idCode',
                        '(b)dateOfHiring',
                        '(b)profit',
                        '(b)vacancy',
                        '(b)sector',
                        [
                            $e1,
                            $e1,
                            $e1,
                            $e1
                        ]
                    );
                    echo $b1;
                } catch (InvalidName $e) {
                    echo 'Error: ' . $e -> getMessage();
                } catch (InvalidLastname $e) {
                    echo 'Error: ' . $e -> getMessage();
                } catch (InvalidSecuryLvl $e) {
                    echo 'Error: ' . $e -> getMessage();
                } catch (NoEmployees $e) {
                    echo 'Error: ' . $e -> getMessage();
                } finally {
                    echo '<br><br>';
                }

                

            ?>
        
        
        </h1>
    
    </div>



</body>
</html>