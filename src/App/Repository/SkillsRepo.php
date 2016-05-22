<?php

namespace App\Repository;

class SkillsRepo
{
    protected $skills = [
        [
            'type' => 'TECHNOLOGIES',
            'keywords' => 'LAMP, XML, JSON, Redis, Beanstalkd, Supervisord, Google Analytics, APIs',
        ],
        [
            'type' => 'LANGUAGES',
            'keywords' => 'PHP, SQL, HTML, CSS, JavaScript',
        ],
        [
            'type' => 'FRAMEWORKS / LIBRARIES',
            'keywords' => 'Zend1, Zend2, Expressive, Laravel, Lumen, Symfony2, Silex, CodeIgniter, JQuery,
                Bootstrap CSS',
        ],
        [
            'type' => 'STANDARDS',
            'keywords' => 'MVC, OOP, PSRx, HTTP, REST, AJAX, DocBlocks',
        ],
        [
            'type' => 'IDE / TOOLS',
            'keywords' => 'NetBeans, PHPStorm, Sublime Text, MySQL Workbench, Sequel Pro, SourceTree, VirtualBox,
                Firebug, Trac, Vagrant, Composer, Atlassian Suite (Jira, Bitbucket, Bamboo, Confluence)',
        ],
        [
            'type' => 'DATABASE',
            'keywords' => 'MySQL5, Sqlite, MongoDB',
        ],
        [
            'type' => 'WEB SERVERS',
            'keywords' => 'Apache',
        ],
        [
            'type' => 'VERSION CONTROL',
            'keywords' => 'Git, SVN, Mercurial',
        ],
        [
            'type' => 'OPERATING SYSTEMS',
            'keywords' => 'Ubuntu Linux, Windows, Apple OS X',
        ],
    ];

    public function all()
    {
        return $this->skills;
    }
}
