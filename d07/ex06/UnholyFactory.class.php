<?php
class UnholyFactory {
    private $list = array();
    private $recrueType;
    public function absorb( $someone ) {
        if (is_a($someone, "Fighter")) {
            if (in_array($someone, $this->list))
                print("(Factory already absorbed a fighter of type ");
            else {
                $this->list[] = $someone;
                print("(Factory absorbed a fighter of type ");
            }
            print($someone->getType() . ")" . PHP_EOL);
        }
        else
            print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
    }

    public function defineType( $recrue ) {
        if ($recrue === "foot soldier")
            return ("Footsoldier");
        else if ($recrue === "llama")
            return ("Llama");
        else if ($recrue === "archer")
            return ("Archer");
        else if ($recrue === "assassin")
            return ("Assassin");
    }

    public function fabricate( $recrue ) {
        $this->recrueType = $this->defineType($recrue);
        foreach ($this->list as $key => $singleRecrue)
            if (get_class($singleRecrue) === $this->recrueType) {
                $fighter = clone $this->list[$key];
                print("(Factory fabricates a fighter of type " . $recrue . ")". PHP_EOL);
                return ($fighter);
            }
        print("(Factory hasn't absorbed any fighter of type ". $recrue . ")". PHP_EOL);
    }

    public function fight( $t ) {
		print_r($this->fabricate);
    }
}
?>