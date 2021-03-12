<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('education')->insert([
            [
                'id' => 1,
                'institution_name' => 'University of Portsmouth',
                'course_name' => 'MRes Technology (Computer Science)',
                'grade' => 'Distinction [to be awarded]',
                'start_date' => 'January 2020',
                'end_date' => 'January 2021',
                'project_title' => 'Iranian State-Sponsored Propaganda on Twitter: Exploring Methods for Automatic
                Classification and Analysis',
                'description' => '
                    <p>For my research project, I evaluated how well machine learning algorithms perform at identifying
                    sentiment and emotion in Iranian state-sponsored propaganda on Twitter about the nuclear deal. This
                    project has involved extracting the tweets using keywords, preprocessing the text of the tweets,
                    labelling the tweets for sentiment and emotion automatically using a lexicon (SentiWordNet and NRC
                    Emotion Lexicon) and evaluating five machine learning algorithms (K-Nearest Neighbours, Decision
                    Tree, Random Forest, Linear SVM, and Naive Bayes) performance at sentiment analysis and emotion
                    detection.</p>
                    <h4>Modules studied include:</h4>
                    <ul>
                        <li>Research Preparation and Development</li>
                        <li>Research Project</li>
                    </ul>
                ',
            ],
            [
                'id' => 2,
                'institution_name' => 'Edge Hill University',
                'course_name' => 'MComp Web Design and Development',
                'grade' => '2.1',
                'start_date' => 'September 2015',
                'end_date' => 'July 2019',
                'project_title' => 'A chatbot to facilitate new undergraduate Computer Science students’ transition to
                university: is it technically feasible and would students find it useful?',
                'description' => "
                    <p>For my dissertation, I investigated the technical feasibilty of implementing a chatbot for new
                    students within Edge Hill University's department of Computer Science. This was completed by
                    evaluating two chatbot implementation methods (Chatterbot - a Python paackage and BotMan Studio -
                    a PHP framework). I then implemented a chatbot (and a FAQ's mobile website) and conducted a
                    usability evaluation with a questionnaire to evaluate and compare the perceived usefulness of a
                    chatbot and a FAQ's mobile website for new students (with first year Computer Science students).
                    Results show that the chatbot was perceived to be more useful than the FAQ's mobile website.</p>
                    <div class=\"grid\">
                        <div class=\"small-12 medium-12 large-6 xlarge-6\">
                            <h4>Undergraduate modules studied:</h4>
                            <ul>
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
                        <div class=\"small-12 medium-12 large-6 xlarge-6\">
                            <h4>Master's level modules studied include:</h4>
                            <ul>
                                <li>Advanced Data Analysis</li>
                                <li>Surveying the Field: Web Development
                                <li>Project Management</li>
                                <li>Research and Development Project</li>
                                <li>Research Methods</li>
                            </ul>
                        </div>
                    </div>
                ",
            ],
            [   'id' => 3,
                'institution_name' => 'Colchester Institute',
                'course_name' => 'BTEC Level 3 Extended Diploma in IT',
                'grade' => 'Distinction x3',
                'start_date' => 'September 2012',
                'end_date' => 'June 2014',
                'project_title' => null,
                'description' => '
                    <h4>Units studied:</h4>
                    <ul>
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
            ],
        ]);
    }
}
