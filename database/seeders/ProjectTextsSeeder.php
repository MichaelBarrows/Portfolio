<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTextsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_texts')->insert([
            [
                'project_id' => 6,
                'format' => 'h3',
                'order' => 1,
                'text' => "Summary",
            ],
            [
                'project_id' => 6,
                'format' => 'p',
                'order' => 2,
                'text' => "A chatbot and FAQ's mobile website were created for new students within Edge Hill University's Department of Computer Science to aid their transition to university. The two applications were evaluated using a task-based usability evaluation and a questionnaire (usefulness, satisfaction and ease of use). The usability evaluation identified some issues to be rectified in both applications and the questionnaire was used to evaluate the perceived usefulness of the applications. First year Computer Science students completed the evaluation as new Computer Science students were not available due to the time of year that this project took place.",
            ],
            [
                'project_id' => 6,
                'format' => 'h3',
                'order' => 3,
                'text' => "Problem",
            ],
            [
                'project_id' => 6,
                'format' => 'p',
                'order' => 4,
                'text' => "When starting university, new students require information so that they can make a successful transition to higher education (Tinto, 1975; Billing, 1997; Wilcox et al., 2005; Briggs et al., 2012). Freshers' week provides the opportunity for new students to connect with their peers and to get used to what is expected of them at university. This period is crucial to ensure that students successfully integrate into university life (Tinto and Russo, 1994; Gale and Parker, 2012; Harley et al., 2007; Wilcox et al., 2005). Students can experience information overload (Billing, 1997) as the communication of information is one way (lecturer to students) and the information is dull (Laing et al., 2005). Information overload can lead to a student being unable to successfully integrate into university life, which can in turn lead to their withdrawal from the university or impact upon their successes during their course. Technology can be used to improve the induction process, by making information more interactive, students may be more engaged with the information which could resolve the problem of one-way communication. Chatbots can be considered to be a novelty and research has shown that users may be more likely to engage with novel technologies. (Fryer et al., 2017; Yim et al., 2017).",
            ],
            [
                'project_id' => 6,
                'format' => 'h3',
                'order' => 5,
                'text' => "Research",
            ],
            [
                'project_id' => 6,
                'format' => 'p',
                'order' => 6,
                'text' => "The title of this dissertation was 'A chatbot to facilitate new undergraduate Computer Science students' transition to university: is it technically feasible and would students find it useful?'. The research covered two aspects: the technical implementation of a chatbot and the perceived usefulness of a chatbot for new Computer Science students. The technical implementation aspect was completed by comparing two chatbot implementation methods: chatterbot (a Python package) and BotMan Studio (a PHP framework). The perceived usefulness evaluation was completed by implementing a chatbot and a FAQ's website and having first year Computer Science students conduct a usability evaluation and complete a questionnaire (usefulness, satisfaction and ease of use (Lund, 2001)) afterwards.",
            ],
            [
                'project_id' => 6,
                'format' => 'h3',
                'order' => 7,
                'text' => "Findings",
            ],
            [
                'project_id' => 6,
                'format' => 'p',
                'order' => 8,
                'text' => "The findings revealed that the chatterbot package would be a better method for implementing the chatbot, because it can learn from its conversations with users and had corpora for general conversations. Whilst the chatbot being able to learn from its conversations with users is an advantage, it is also a drawback, as the chatbot could be taught responses which are inappropriate (e.g. racism and xenophobia). Other disadvantages included the steep learning curve and narrow time frame. The BotMan Studio framework was found to have a less steep learning curve as I have used PHP extensively throughout my degree as well as the Laravel framework. Given more time, the chatbot would have been developed using the chatterbot package.",
            ],
            [
                'project_id' => 6,
                'format' => 'p',
                'order' => 9,
                'text' => "The findings from the user studies revealed various usability issues in both applications, including the users' thinking they had an answer to their question and moving on to the next as well as issues with the categorisation of the questions. The chatbot was rated more highly for all questions in the questionnaire with the exception of one. It was therefore concluded that the users perceived the chatbot to be more useful than the FAQ's website.",
            ],
            [
                'project_id' => 6,
                'format' => 'h3',
                'order' => 10,
                'text' => "The Applications",
            ],
            [
                'project_id' => 6,
                'format' => 'p',
                'order' => 11,
                'text' => "The applications had a shared database and used the same data, so that the data was consistent across both applications. Both applications were created within the same project and both used Behaviour Driven Development.",
            ],
            [
                'project_id' => 6,
                'format' => 'h3',
                'order' => 12,
                'text' => "Chatbot",
            ],
            [
                'project_id' => 6,
                'format' => 'p',
                'order' => 13,
                'text' => "The chatbot works by matching the words in a user's query to those contained in the pre-defined questions – the more words matched, the more likely that the question is a match. When the question matched was very broad, a follow up question would be returned with pre-defined follow up options so that the response returned would be more focussed and specific to the information required to the user. The response provided could also contain links to external information if this was more appropriate than displaying the information within the application. Initially, the chatbot would compare every word in the users query with every word in each question, meaning that the chatbot would be considering words such as 'and', 'of' and 'can' which did not help to identify the correct question. To improve the accuracy and performance of the chatbot, the Keyword Extractor API was created which extracted and stored keywords from questions and extracted keywords from the user's query. This meant that the chatbot could compare the keywords, which reduced processing time and returned more accurate results. The chatbot can be used without the Keyword Extractor API, however the accuracy and performance are diminished.",
            ],
            [
                'project_id' => 6,
                'format' => 'h3',
                'order' => 14,
                'text' => "FAQ's Mobile Website",
            ],
            [
                'project_id' => 6,
                'format' => 'p',
                'order' => 15,
                'text' => "The FAQ's mobile website was created so that the results from the research with the chatbot could be compared. The FAQ's mobile website was created using Laravel and inside the same project as the chatbot as BotMan Studio is a framework built on top of Laravel. No aspect of BotMan Studio was used for the FAQ's mobile website. The information was structured in topics, and inside a topic contained the individual questions, which would expand when clicked to show the answer or a follow up question with follow up options. When a follow up option was selected, the answer would be revealed to the user.",
            ],
            [
                'project_id' => 6,
                'format' => 'h3',
                'order' => 16,
                'text' => "Testing",
            ],
            [
                'project_id' => 6,
                'format' => 'p',
                'order' => 17,
                'text' => "Behaviour Driven Development (BDD) was used to test the applications using CodeCeption. The BDD tests were created prior to development of the applications so that coding would start with a collection of failing tests. The applications were coded according to the stage of the test that needed to be passed. The BDD tests had to be adapted due to issues with JavaScript functionality in the chatbot. The affected tests were modified to test the backend functionality and more tests created to test the data being returned from the BotMan API rather than test it being displayed to the user. This was felt to be an acceptable compromise as the displaying of chatbot responses was completed manually.",
            ],
        ]);
    }
}
