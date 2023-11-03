<?php

namespace MichaelBarrows\Portfolio\Database\Seeders;

use MichaelBarrows\Portfolio\Enums\TechStack;
use MichaelBarrows\Portfolio\Models\Employment;

class EmploymentSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employment::create([
            'title' => 'Junior PHP Developer',
            'company' => 'Accu',
            'start_date' => 'March 2021',
            'end_date' => 'December 2021',
            'description' => '
                <h2 class="text-2xl text-gradient">About Accu</h2>
                <p class="my-2">Accu is an e-commerce supplier of precision-engineered components.</p>

                <h2 class="text-2xl text-gradient">My Role</h2>
                <p class="my-2">As part of my time at Accu, I primarily worked on their back-of-house systems (Laravel) which encompassed areas such as merchandising, order processing, and warehouse operations.</p>
                <p class="my-2">I delivered new functionality and bug fixes to these systems, with particular attention to performance and accuracy.</p>

                <h2 class="text-2xl text-gradient">Highlights</h2>
                <p class="my-2">Highlights from my time at Accu include:</p>
                <ul class="list-disc list-outside marker:text-pacific-blue-600 ml-4">
                    <li>Delivered a complex, far-reaching overhaul of the stock management system to improve accuracy, future proof, and reduce delays and costs.</li>
                    <li>Created a tool for the IT team that automatically corrected order data when things went wrong, reducing the need for IT to perform manual data fixes which reduced human error.</li>
                    <li>Delivered a brand new product picking feature which improved the efficiency of warehouse operations.</li>
                </ul>
            ',
            'tech_stack' => [
                TechStack::PHP,
                TechStack::LARAVEL,
                TechStack::JAVASCRIPT,
                TechStack::JQUERY,
                TechStack::REACT,
                TechStack::API,
            ],
        ]);

        Employment::create([
            'title' => 'Software Engineer',
            'company' => 'Accu',
            'start_date' => 'December 2021',
            'end_date' => 'August 2022',
            'description' => '
                <h2 class="text-2xl text-gradient">About Accu</h2>
                <p class="my-2">Accu is an e-commerce supplier of precision-engineered components.</p>

                <h2 class="text-2xl text-gradient">My Role</h2>
                <p class="my-2">As part of my time at Accu, I primarily worked on their back-of-house systems (Laravel) which encompassed areas such as merchandising, order processing, and warehouse operations.</p>
                <p class="my-2">I delivered new functionality and bug fixes to these systems, with particular attention to performance and accuracy.</p>

                <h2 class="text-2xl text-gradient">Highlights</h2>
                <p class="my-2">Highlights from my time at Accu include:</p>
                <ul class="list-disc list-outside marker:text-pacific-blue-600 ml-4">
                    <li>Delivered a complex, far-reaching overhaul of the stock management system to improve accuracy, future proof, and reduce delays and costs.</li>
                    <li>Created a tool for the IT team that automatically corrected order data when things went wrong, reducing the need for IT to perform manual data fixes which reduced human error.</li>
                    <li>Delivered a brand new product picking feature which improved the efficiency of warehouse operations.</li>
                </ul>
            ',
            'tech_stack' => [
                TechStack::PHP,
                TechStack::LARAVEL,
                TechStack::JAVASCRIPT,
                TechStack::JQUERY,
                TechStack::REACT,
                TechStack::API,
            ],
        ]);

        Employment::create([
            'title' => 'PHP Developer',
            'company' => 'Toolstation',
            'start_date' => 'August 2022',
            'end_date' => 'March 2023',
            'description' => '
                <h2 class="text-2xl text-gradient">About Toolstation</h2>
                <p class="my-2">Toolstation is a leading supplier of tools, accessories and building supplies for DIY and trade.</p>

                <h2 class="text-2xl text-gradient">My Role</h2>
                <p class="my-2">As part of my time at Toolstation within the Front of House team, I primarily worked on their in-store EPOS system (Laravel API and React front-end), fixing bugs and creating new features.</p>
                <p class="my-2">This team had responsibility for multiple features in other systems, spanning the e-commerce website and back-of-house systems. As part of this team, I worked across multiple projects and systems.</p>

                <h2 class="text-2xl text-gradient">Highlights</h2>
                <p class="my-2">Highlights from my time at Toolstation include:</p>
                <ul class="list-disc list-outside marker:text-pacific-blue-600 ml-4">
                    <li>Implementing significant improvements to the click-and-collect service to improve resilience.</li>
                    <li>Developing trade credit functionality on the e-commerce website using Nuxt.</li>
                    <li>Working flexibly across teams to deliver functionality as and when required.</li>
                </ul>
            ',
            'tech_stack' => [
                TechStack::PHP,
                TechStack::LARAVEL,
                TechStack::JAVASCRIPT,
                TechStack::REACT,
                TechStack::VUE,
                TechStack::NUXT,
                TechStack::API,
            ],
        ]);

        Employment::create([
            'title' => 'Software Engineer',
            'company' => 'Wonde',
            'start_date' => 'March 2023',
            'end_date' => 'Present',
            'description' => '
                <h2 class="text-2xl text-gradient">About Wonde</h2>
                <p class="my-2">Wonde provides a data-syncing solution for schools and apps.</p>

                <h2 class="text-2xl text-gradient">My Role</h2>
                <p class="my-2">My role at Wonde focuses on the API and Integrations. I primarily develop features for the API and integrate the data for those features with the various MIS\', which can be tricky, given that we standardise the standardise the data presented in the API.</p>
            ',
            'tech_stack' => [
                TechStack::PHP,
                TechStack::LARAVEL,
                TechStack::API,
            ],
        ]);
    }
}
