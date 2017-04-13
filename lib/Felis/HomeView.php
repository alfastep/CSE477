<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 3/26/17
 * Time: 2:11 PM
 */

namespace Felis;


class HomeView extends View
{
    /**
     * Constructor
     * Sets the page title and any other settings.
     */
    public function __construct() {
        $this->setTitle("Felis Investigations");
        $this->addLink("login.php", "Log in");
    }

    /**
     * Add content to the header
     * @return string Any additional comment to put in the header
     */
    protected function headerAdditional() {
        return <<<HTML
<p>Welcome to Felis Investigations!</p>
<p>Domestic, divorce, and carousing investigations conducted without publicity. People and cats shadowed
	and investigated by expert inspectors. Katnapped kittons located. Missing cats and witnesses located.
	Accidents, furniture damage, losses by theft, blackmail, and murder investigations.</p>
<p><a href="">Learn more</a></p>
HTML;
    }

    public function testimonials(){
        $html = <<<HTML
<h2>TESTIMONIALS</h2>
HTML;

        $len = count($this->testimonials);
        $first_half = array_slice($this->testimonials, 0, $len/2);
        $second_half = array_slice($this->testimonials, $len/2);

        $html .= '<div class="left">';
        foreach($first_half as $testimonial){
            $html .= '<blockquote>' .
                '<p>' . $testimonial["quote"].'</p>'.
                '<p> <cite>'. $testimonial["author"].'</cite></p>'
                . '</blockquote>';

        }
        $html .= '</div>';

        $html .= '<div class="right">';
        foreach($second_half as $testimonial){
            $html .= '<blockquote>' .
                '<p>' . $testimonial["quote"].'</p>'.
                '<p> <cite>'. $testimonial["author"].'</cite></p>'
                . '</blockquote>';

        }
        $html .= '</div>';

        return $html;

    }

    public function addTestimonial($quote,$author){
        $this->testimonials[] = array("quote" => $quote, "author" => $author);
    }

    private $testimonials = array();


}