<?php

namespace App\Repository;

class SkillsRepo
{
    protected $skills = [
        [
            'type' => 'Technologies',
            'keywords' => 'LAMP, XML, JSON, Redis, Beanstalkd, Supervisord, Google Analytics, APIs',
        ],
        [
            'type' => 'Languages',
            'keywords' => 'PHP, SQL, HTML, CSS, JavaScript',
        ],
        [
            'type' => 'Frameworks / Libraries',
            'keywords' => 'Zend1, Zend2, Expressive, PHPUnit, Laravel, Lumen, Symfony2, Silex, CodeIgniter, JQuery,
                Bootstrap CSS',
        ],
        [
            'type' => 'Standards',
            'keywords' => 'MVC, SOA, OOP, PSR-x, HTTP, REST, AJAX, DocBlocks, GitFlow',
        ],
        [
            'type' => 'IDEs / Tools',
            'keywords' => 'NetBeans, PHPStorm, Sublime Text, MySQL Workbench, Sequel Pro, SourceTree, VirtualBox,
                Firebug, Trac, Vagrant, Composer, Atlassian Suite (Jira, Bitbucket, Bamboo, Confluence)',
        ],
        [
            'type' => 'Databases',
            'keywords' => 'MySQL5, Sqlite, MongoDB',
        ],
        [
            'type' => 'Web Servers',
            'keywords' => 'Apache',
        ],
        [
            'type' => 'Version Control',
            'keywords' => 'Git, SVN, Mercurial',
        ],
        [
            'type' => 'Operating Systems',
            'keywords' => 'Ubuntu Linux, Windows, Apple OS X',
        ],
        [
            'type' => 'Additional Skills',
            'keywords' => 'E-commerce, SEO, Scrum, Agile methodologies, Code reviews, Documentation,
                SOLID design principles, Unit testing',
        ],
    ];

    public function all()
    {
        return $this->skills;
    }
}
