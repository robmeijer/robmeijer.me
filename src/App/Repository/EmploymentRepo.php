<?php

namespace App\Repository;

class EmploymentRepo
{
    protected $positions = [
        [
            'title' => 'Support Team Leader / Scrum Master',
            'period' => 'January 2016 - Present',
            'company' => 'INTERACTIVE INVESTOR',
            'details' => 'Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla
                consequat massa quis enim. Donec pede justo.
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                sunt explicabo.',
        ],
        [
            'title' => 'Senior Developer',
            'period' => 'December 2014 - Present',
            'company' => 'INTERACTIVE INVESTOR',
            'details' => 'Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',
        ],
        [
            'title' => 'Support Team Leader',
            'period' => 'February 2014 - November 2014',
            'company' => 'WORLDSTORES LTD',
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
            'company' => 'WORLDSTORES LTD',
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
            'company' => 'ORAGON LTD',
            'details' => [
                'Development and maintenance of customer sites',
            ],
        ],
        [
            'title' => 'Technical Consultant',
            'period' => 'August 2004 - April 2009',
            'company' => 'SWIFTPRO LTD',
            'details' => [
                'Development and maintenance of help-desk system',
                'Customer technical support, telephonic and on-site training, network and desktop administration',
            ],
        ],
        [
            'title' => 'Technical Consultant',
            'period' => 'December 1997 - May 2004',
            'company' => 'THE NATIONAL HORSE RACING AUTHORITY',
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
