<?php

namespace App\Repository;

class EmploymentRepo
{
    protected $positions = [
        [
            'title' => 'Support / Development Team Leader',
            'period' => 'January 2016 - Present',
            'company' => 'Interactive Investor',
            'details' => [
                'Ownership of the Trading team delivery, ensuring timely delivery of projects',
                'Scoping projects and breaking them down into tasks and estimates',
                'Initial escalation point for incidents and bugs',
                'Assist across business projects with technical discussions',
            ],
        ],
        [
            'title' => 'Senior Developer',
            'period' => 'December 2014 - Present',
            'company' => 'Interactive Investor',
            'details' => [
                'Ongoing planning and development of Trading platform',
                'Hold weekly workshops on various topics to improve knowledge base and coding standards',
                'Research and introduce new technologies and best practices that may benefit the company',
                'Perform regular code reviews to ensure coding standards are maintained',
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
        ],
        [
            'title' => 'Senior Developer',
            'period' => 'August 2009 - November 2014',
            'company' => 'WorldStores Ltd',
            'details' => [
                'Planning and development of CMS and E-commerce platform supporting 70+ sites',
                'Weekly workshops on various topics to improve knowledge base and coding standards',
                'Research new technologies and best practices that will benefit the company',
                'Regular code reviews to ensure coding standards are maintained',
            ],
        ],
        [
            'title' => 'Web Developer',
            'period' => 'April 2009 - July 2009',
            'company' => 'Oragon Ltd',
            'details' => [
                'Development and maintenance of customer sites',
            ],
        ],
        [
            'title' => 'Technical Consultant',
            'period' => 'August 2004 - April 2009',
            'company' => 'Swiftpro Ltd',
            'details' => [
                'Development and maintenance of help-desk system',
                'Customer technical support, telephonic and on-site training, network and desktop administration',
            ],
        ],
        [
            'title' => 'Technical Consultant',
            'period' => 'December 1997 - May 2004',
            'company' => 'The National Horse Racing Authority',
            'details' => [
                'Development and maintenance of company website',
                'Windows desktop support & network administration',
            ],
        ],
    ];

    public function all()
    {
        return $this->positions;
    }
}
