<?php

namespace App\Form;

use Symfony\Component\Validator\Constraints as Assert;

class Note
{
   /**
    * @Assert\NotBlank
    */
    public ?string $message = '';


  public ?string $gender =null;

   /**
    * @Assert\NotBlank
    * @Assert\Type("\DateTime")
    */
    public ?\DateTime $created = null;



    public function __construct()
    {
        $this->created = new \DateTime();
    }
}