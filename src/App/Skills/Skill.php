<?php

namespace App\Skills;

class Skill
{
    /**
     * @var string
     */
    protected $type;
    /**
     * @var array
     */
    protected $keywords;

    /**
     * @param string $type
     * @param array $keywords
     */
    public function __construct($type, array $keywords)
    {
        $this->type = $type;
        $this->keywords = $keywords;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return array
     */
    public function getKeywords()
    {
        return $this->keywords;
    }
}
