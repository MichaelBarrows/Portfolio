<?php

namespace Database\Seeders;

use App\Enums\TechStack;
use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    public function run()
    {
        Education::create([
            'institution_name' => 'Colchester Institute',
            'course_name' => 'BTEC Level 3 Extended Diploma in IT',
            'grade' => 'Distinction x3',
            'start_date' => 'September 2012',
            'end_date' => 'June 2014',
            'project_title' => null,
            'description' => '
                <h2 class="text-2xl text-gradient">Units studied:</h2>
                <ul class="list-disc list-outside marker:text-pacific-blue-600 ml-4">
                    <li>Communication and Employability Skills for IT</li>
                    <li>Computer Systems</li>
                    <li>Information Systems</li>
                    <li>Computer Networks</li>
                    <li>Procedural Programming</li>
                    <li>Computer Systems Architecture</li>
                    <li>Website Production</li>
                    <li>Computer Animation</li>
                    <li>Spreadsheet Modelling</li>
                    <li>Managing Networks</li>
                    <li>Systems Analysis &amp; Design</li>
                    <li>Event Driven Programming</li>
                    <li>Project Planning with IT</li>
                    <li>Database Design</li>
                    <li>Client-side Customisation of Web Pages</li>
                    <li>Developing Computer Games</li>
                    <li>Human Computer Interaction</li>
                    <li>Networked Systems Security</li>
                </ul>
            ',
        ]);

        Education::create([
            'institution_name' => 'Edge Hill University',
            'course_name' => 'MComp Web Design and Development',
            'grade' => '2.1',
            'start_date' => 'September 2015',
            'end_date' => 'July 2019',
            'project_title' => 'A chatbot to facilitate new undergraduate Computer Science students’ transition to university: is it technically feasible and would students find it useful?',
            'description' => '
                <p class="my-2">For my dissertation, I investigated the technical feasibilty of implementing a chatbot for new students within Edge Hill University\'s department of Computer Science. This was completed by evaluating two chatbot implementation methods (Chatterbot - a Python paackage and BotMan Studio - a PHP framework). I then implemented a chatbot (and a FAQ\'s mobile website) and conducted a usability evaluation with a questionnaire to evaluate and compare the perceived usefulness of a chatbot and a FAQ\'s mobile website for new students (with first year Computer Science students). Results show that the chatbot was perceived to be more useful than the FAQ\'s mobile website.</p>
                <div class="grid md:grid-cols-2">
                    <div>
                        <h2 class="text-2xl text-gradient">Undergraduate modules studied:</h2>
                        <ul class="list-disc list-outside marker:text-pacific-blue-600 ml-4">
                            <li>Forensic Computing</li>
                            <li>Legal, Social, Ethical and Professional Issues in Computing</li>
                            <li>Mobile Applications and Games Development</li>
                            <li>Professional Portfolio</li>
                            <li>Usability Testing and Data Analysis</li>
                            <li>Research Pro-Seminar</li>
                            <li>Research and Development Methods</li>
                            <li>Fundamentals of Web Coding</li>
                            <li>Server and Client-side Scripting</li>
                            <li>Web Application Development</li>
                            <li>Data Driven Design</li>
                            <li>Fundamentals of User Experience Design</li>
                        </ul>
                    </div>
                    <div class="small-12 medium-12 large-6 xlarge-6">
                        <h2 class="text-2xl text-gradient">Master\'s level modules studied include:</h2>
                        <ul class="list-disc list-outside marker:text-pacific-blue-600 ml-4">
                            <li>Advanced Data Analysis</li>
                            <li>Surveying the Field: Web Development
                            <li>Project Management</li>
                            <li>Research and Development Project</li>
                            <li>Research Methods</li>
                        </ul>
                    </div>
                </div>
            ',
            'tech_stack' => [
                TechStack::PHP,
                TechStack::LARAVEL,
                TechStack::JAVASCRIPT,
                TechStack::PYTHON,
                TechStack::ML,
                TechStack::NLP,
                TechStack::FLASK,
                TechStack::API,
            ],
        ]);

        Education::create([
            'institution_name' => 'University of Portsmouth',
            'course_name' => 'MRes Technology (Computer Science)',
            'grade' => 'Distinction',
            'start_date' => 'January 2020',
            'end_date' => 'January 2021',
            'project_title' => 'Iranian State-Sponsored Propaganda on Twitter: Exploring Methods for Automatic Classification and Analysis',
            'description' => '
                <p class="my-2">For my research project, I evaluated how well machine learning algorithms perform at identifying sentiment and emotion in Iranian state-sponsored propaganda on Twitter about the nuclear deal. This project has involved extracting the tweets using keywords, preprocessing the text of the tweets, labelling the tweets for sentiment and emotion automatically using a lexicon (SentiWordNet and NRC Emotion Lexicon) and evaluating five machine learning algorithms (K-Nearest Neighbours, Decision Tree, Random Forest, Linear SVM, and Naive Bayes) performance at sentiment analysis and emotion detection.</p>
                <h2 class="text-2xl text-gradient">Modules studied include:</h2>
                <ul class="list-disc list-outside marker:text-pacific-blue-600 ml-4">
                    <li>Research Preparation and Development</li>
                    <li>Research Project</li>
                </ul>
                <h2 class="text-2xl text-gradient">Outcomes</h2>
                <p class="my-2">As a result of this inter-disciplinary research, a journal article was published as a result of this project in IEEE Transactions on Computational Social Systems, titled "Sentiment and Objectivity in Iranian State-Sponsored Propaganda on Twitter".</p>
                <p class="my-2">It is co-authored by <a class="text-pacific-blue-600" href="https://researchportal.port.ac.uk/en/persons/ella-haig" target="_blank">Dr Ella Haig</a> (University of Portsmouth) and <a class="text-pacific-blue-600" href="https://findanexpert.unimelb.edu.au/profile/634284-dara-conduit" target="_blank">Dr Dara Conduit</a> (University of Melbourne).</p>
                <p class="my-2"><a class="text-pacific-blue-600" href="https://www.port.ac.uk/news-events-and-blogs/news/new-research-uses-ai-to-analyse-propaganda-tweets-on-iranian-nuclear-deal" target="_blank">Press release at University of Portsmouth</a></p>
                <p class="my-2"><a class="text-pacific-blue-600" href="https://doi.org/10.1109/TCSS.2023.3273729" target="_blank">Published paper at IEEE Transactions in Computational Social Systems</a></p>
                <p class="my-2"><a class="text-pacific-blue-600" href="https://researchportal.port.ac.uk/en/publications/sentiment-and-objectivity-in-iranian-state-sponsored-propaganda-o" target="_blank">Accepted author manuscript at University of Portsmouth Research Portal (Open Access)</a></p>
            ',
            'tech_stack' => [
                TechStack::PYTHON,
                TechStack::NLP,
                TechStack::ML,
            ],
        ]);
    }
}
