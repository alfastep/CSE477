<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 2/4/17
 * Time: 11:36 PM
 */

namespace Wumpus;


class WumpusView
{
    /**
     * Constructor
     * @param Wumpus $wumpus The Wumpus object
     */
    public function __construct(Wumpus $wumpus) {
        $this->wumpus = $wumpus;
    }

    /** Generate the HTML for the number of arrows remaining */
    public function presentArrows() {
        $numArrows = $this->wumpus->numArrows();
        $html = "<p>You have $numArrows arrows remaining.</p>";
        return $html;
    }

    public function presentStatus(){
        $room = $this->wumpus->getCurrent()->getNum();
        echo '<p class="gamefont">' . date("g:ia l, F j, Y") . '</p>';
        $html = "<p class='gamefont'>You are in room $room</p>";

        if($this->wumpus->feelDraft()){
            $html .= "<p class='gamefont'>You feel a draft!</p>";
        }

        if($this->wumpus->hearBirds()){
            $html .= "<p class='gamefont'>You hear birds!</p>";
        }

        if($this->wumpus->wasCarried()){
            $html .= "<p class='gamefont'>You were carried by the birds to room $room!</p>";
        }

        if($this->wumpus->smellWumpus()){
            $html .= "<p class='gamefont'>You smell a wumpus!</p>";
        }

        else{
            $html .= "<p>&nbsp;</p>";
        }

        return $html;

    }

    /** Present the links for a room
     * @param $ndx An index 0 to 2 for the three rooms */
    public function presentRoom($ndx) {
        $room = $this->wumpus->getCurrent()->getNeighbors()[$ndx];
        $roomnum = $room->getNum();
        $roomndx = $room->getNdx();
        $roomurl = "game-post.php?m=$roomndx";
        $shooturl = "game-post.php?s=$roomndx";

        $html = <<<HTML
<div class="room">
  <figure><img src="wumpus/cave2.jpg" width="180" height="135" alt=""/></figure>
  <p><a class="linkcolor" href="$roomurl">$roomnum</a></p>
<p><a class="linkcolor" href="$shooturl">Shoot Arrow</a></p><br>
</div>
HTML;

        return $html;
    }

    private $wumpus;    // The Wumpus object
}