<?php

namespace App\Repository;

use App\Employment\Position;
use App\Repository\Contracts\Employment;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Collection;

class ArrayEmployment implements Employment
{
    /**
     * @var array
     */
    protected $positions = [
        [
            'title' => 'Development Team Lead / Scrum Master',
            'period' => 'January 2016 - Present',
            'company' => 'Interactive Investor',
            'details' => [
                'Ownership of the Trading team delivery, to ensure timely delivery of projects',
                'Scope projects and break them down into tasks and estimates',
                'Initial escalation point for incidents and bugs',
                'Assist across business projects with technical discussions',
                'Manage the release process to ensure progress of completed tasks through development, to UAT, and
                release',
            ],
            'achievements' => [
                'Introduced a number of automations that made the Contact Centre less reliant on IT and more
                self-sufficient',
            ],
            'skills' => [
                'Atlassian Suite (Jira, Bitbucket, Bamboo, Confluence)', 'Agile', 'Scrum',
            ],
        ],
        [
            'title' => 'Senior Developer',
            'period' => 'December 2014 - Present',
            'company' => 'Interactive Investor',
            'details' => [
                'Ongoing planning and development of Trading platform based on Zend1',
                'Planning and development of various micro-services based on Zend2 and Zend Expressive',
                'Perform code reviews as part of development process to ensure coding standards are maintained',
            ],
            'achievements' => [
                'Spearheaded an overhaul of PHPUnit test suite to separate tests out into unit, functional, and
                integration tests',
            ],
            'skills' => [
                'LAMP', 'HTML+CSS+JS', 'AJAX', 'Linux+Windows', 'OOP', 'MVC', 'Zend1', 'Zend2', 'Zend Expressive',
                'PHPUnit', 'Silex', 'JQuery', 'Bootstrap CSS', 'Redis', 'REST', 'Git', 'Composer',
            ],
        ],
        [
            'title' => 'Support Team Leader',
            'period' => 'February 2014 - November 2014',
            'company' => 'WorldStores Ltd',
            'details' => [
                'Perform maintenance development, and fix reported bugs',
                'Provide out of hours 2nd line support for any website issues',
                'Mentor new developers to familiarise them with the codebase and company processes',
                'Generate weekly reports to review support velocity and outstanding tickets',
            ],
            'achievements' => [
                'Reduced overall number of open support tickets by 65% within 6 months. 85% of tickets opened are closed
                within the same week, and all critical tickets are closed within a few hours at most'
            ],
            'skills' => [],
        ],
        [
            'title' => 'Senior Developer',
            'period' => 'August 2009 - November 2014',
            'company' => 'WorldStores Ltd',
            'details' => [
                'Planning and development of CMS and E-commerce platform supporting 70+ sites',
                'Hold weekly workshops on various topics to improve knowledge base and coding standards',
                'Research and introduce new technologies and best practices that may benefit the company',
                'Perform regular code reviews to ensure coding standards are maintained',
            ],
            'achievements' => [
                'Developed CSV driven data import system to handle bulk creation of new records, and to import, resize,
                and distribute product images',
                'Started holding weekly workshops that cover a range of technical topics to improve the developer
                knowledge base, and raise code quality and coding standards',
                'Introduced Redis caching and the Beanstalk queuing service to assist with the planning and development
                of a centralised CMS responsible for distributing data changes of products to all sites',
                'Implemented Markdown driven centralised documentation system to allow IT and business to document
                common processes. This was eventually migrated to Evernote',
            ],
            'skills' => [
                'LAMP', 'HTML+CSS+JS', 'AJAX', 'Linux+Windows+OS X', 'OOP', 'MVC', 'Symfony2', 'JQuery',
                'Bootstrap CSS', 'Redis', 'Beanstalkd', 'REST', 'Git', 'SVN', 'Composer',
            ],
        ],
        [
            'title' => 'Web Developer',
            'period' => 'April 2009 - July 2009',
            'company' => 'Oragon Ltd',
            'details' => [
                'Development and maintenance of customer sites',
            ],
            'achievements' => [],
            'skills' => ['PHP', 'MySQL', 'HTML+CSS+JS', 'Linux+Windows', 'PhotoShop'],
        ],
        [
            'title' => 'Technical Consultant',
            'period' => 'August 2004 - April 2009',
            'company' => 'Swiftpro Ltd',
            'details' => [
                'Development and maintenance of help-desk system',
                'Customer technical support, telephonic and on-site training, network and desktop administration',
            ],
            'achievements' => [],
            'skills' => ['PHP', 'MySQL', 'HTML+CSS', 'Linux+Windows'],
        ],
        [
            'title' => 'Technical Consultant',
            'period' => 'December 1997 - May 2004',
            'company' => 'The National Horse Racing Authority',
            'details' => [
                'Development and maintenance of company website',
                'Windows desktop support & network administration',
            ],
            'achievements' => [],
            'skills' => ['PHP', 'MySQL', 'HTML+CSS', 'Linux+Windows'],
        ],
    ];

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getPositions()
    {
        $allPositions = new Collection();
        foreach ($this->positions as $position) {
            $allPositions->push(new Position(
                $position['title'],
                $this->resolvePeriod($position['period']),
                $position['company'],
                $position['details'],
                $position['achievements'],
                $position['skills'])
            );
        }

        return $allPositions;
    }

    /**
     * @param string $period
     * @return \DatePeriod
     */
    protected function resolvePeriod($period)
    {
        $period = explode(' ', $period);
        $start = DateTime::createFromFormat('FYhi', $period[0] . $period[1] . '1200');
        if ($period[3] == 'Present') {
            $end = new DateTime();
        } else {
            $end = new DateTime($period[3] . ' ' . $period[4] . ' 12:00');
        }
        $interval = new DateInterval('P1M');

        return new DatePeriod($start, $interval, $end);
    }
}
