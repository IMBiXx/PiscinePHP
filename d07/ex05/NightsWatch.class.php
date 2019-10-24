<?php
class NightsWatch implements IFighter {
    
    private $fighters;
    public function recruit( $char ) {
        if (is_a($char, "IFighter"))
            $this->fighters[] = $char;
    }
    public function fight() {
        foreach ($this->fighters as $fighter)
            $fighter->fight();
    }
}
?>