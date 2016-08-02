<?php

namespace App\Employment;

class Position
{
    /**
     * @var string
     */
    protected $title;
    /**
     * @var \DatePeriod
     */
    protected $period;
    /**
     * @var string
     */
    protected $company;
    /**
     * @var array
     */
    protected $details;
    /**
     * @var array
     */
    protected $achievements;
    /**
     * @var array
     */
    protected $skills;

    /**
     * @param string $title
     * @param \DatePeriod $period
     * @param string $company
     * @param array $details
     * @param array $achievements
     * @param array $skills
     */
    public function __construct(
        $title,
        \DatePeriod $period,
        $company,
        array $details,
        array $achievements,
        array $skills
    ) {
        $this->title = $title;
        $this->period = $period;
        $this->company = $company;
        $this->details = $details;
        $this->achievements = $achievements;
        $this->skills = $skills;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return \DatePeriod
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return array
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @return array
     */
    public function getAchievements()
    {
        return $this->achievements;
    }

    /**
     * @return array
     */
    public function getSkills()
    {
        return $this->skills;
    }
}
