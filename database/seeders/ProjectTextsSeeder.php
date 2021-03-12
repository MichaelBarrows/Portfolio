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
                'project_id' => 1,
                'format' => 'p class="all-12"',
                'order' => 1,
                'text' => "Content coming soon.",
            ],
            [
                'project_id' => 2,
                'format' => 'p class="all-12"',
                'order' => 1,
                'text' => "This project was completed as part of the MRes
                Technology (Computer Science) course at the University of Portsmouth.",
            ],
            [
                'project_id' => 2,
                'format' => 'h3 class="all-12"',
                'order' => 2,
                'text' => "Summary",
            ],
            [
                'project_id' => 2,
                'format' => 'p class="all-12"',
                'order' => 3,
                'text' => "This project labelled Iranian state-sponsored propaganda tweets for their emotion
                automatically and evaluated the ability for five machine learning algorithms to accurately classify the
                emotion in the tweets.",
            ],
            [
                'project_id' => 2,
                'format' => 'h3 class="all-12"',
                'order' => 4,
                'text' => "The Data",
            ],
            [
                'project_id' => 2,
                'format' => 'p class="all-12"',
                'order' => 5,
                'text' => "This project used tweets from Twitter's election integrity datasets. These datasets consist
                of tweets from accounts that have been permanently suspended from the Twitter platform as they were
                identified as belonging to state-sponsored actors and pushed narratives on their behalf.",
            ],
            [
                'project_id' => 2,
                'format' => 'h3 class="all-12"',
                'order' => 6,
                'text' => "Data Extraction",
            ],
            [
                'project_id' => 2,
                'format' => 'p class="all-12"',
                'order' => 7,
                'text' => "This project was performed on tweets about the Iranian nuclear deal (JCPOA) as it was an
                internationally controversial issue, that Iran would likely be spreading propaganda about. To extract
                tweets about the nuclear deal, several keyterms were used (see <a href=
                \"https://github.com/MichaelBarrows/NuclearDealTweetExtraction/blob/master/original_keywords.csv\"
                target=\"_blank\">here</a>).",
            ],
            [
                'project_id' => 2,
                'format' => 'p class="all-12"',
                'order' => 8,
                'text' => "These keyterms were chosen after analysting the most frequent terms per month across the
                three (at the time) Iranian releases. Additionally, the extracted tweets were restricted to English
                and published between August 2013 and December 2018. Retweets were excluded to prevent the machine
                learning algorithms from developing a bias towards tweets that appear often as retweets.",
            ],
            [
                'project_id' => 2,
                'format' => 'h3 class="all-12"',
                'order' => 9,
                'text' => "Preprocessing",
            ],
            [
                'project_id' => 2,
                'format' => 'p class="all-12"',
                'order' => 10,
                'text' => "To prepare the tweets for labelling, steps were taken to transform the text in order to
                achieve the best possible results. These steps included: lowercase conversion, normalising accented
                letters, removing usernames, transforming hashtags, removing URL's, expanding contractions, removing
                special characters and removing stopwords. These steps were taken to improve the chance of matching
                words between the lexicon and the tweets, and to speed up processing.",
            ],
            [
                'project_id' => 2,
                'format' => 'h3 class="all-12"',
                'order' => 11,
                'text' => "Emotion Labelling",
            ],
            [
                'project_id' => 2,
                'format' => 'p class="all-12"',
                'order' => 12,
                'text' => "To label the tweets for their emotions, the
                <a href=\"https://saifmohammad.com/WebPages/NRC-Emotion-Lexicon.htm\" target=\"_blank\">
                NRC Emotion Lexicon</a> was used. This lexicon covers 8 emotions: anger, anticipation, disgust, fear,
                joy, sadness, surprise and trust.",
            ],
            [
                'project_id' => 2,
                'format' => 'h3 class="all-12"',
                'order' => 13,
                'text' => "Emotion Detection (Machine Learning Task)",
            ],
            [
                'project_id' => 2,
                'format' => 'p class="all-12"',
                'order' => 14,
                'text' => "The machine learning task of emotion detection was split into a series of binary tasks.
                This meant that experiments were conducted to detect the presence or absence of a specific emotion.
                The machine learning tasks were performed on all emotions and across 5 features: unigrams, bigrams,
                trigrams, unigrams + bigrams, unigrams + bigrams + trigrams. The 5 algorithms used for these
                experiments were: K-Nearest Neighbours, Decision Tree, Naive Bayes, Support Vector Machine
                (with a linear kernel), and Random Forest.",
            ],
            [
                'project_id' => 2,
                'format' => 'h3 class="all-12"',
                'order' => 15,
                'text' => "Results",
            ],
            [
                'project_id' => 2,
                'format' => 'p class="all-12"',
                'order' => 16,
                'text' => "Not yet available.",
            ],
            [
                'project_id' => 3,
                'format' => 'p class="all-12"',
                'order' => 1,
                'text' => "This project was completed as part of the MRes Technology (Computer Science) course at the
                University of Portsmouth.",
            ],
            [
                'project_id' => 3,
                'format' => 'h3 class="all-12"',
                'order' => 2,
                'text' => "Summary",
            ],
            [
                'project_id' => 3,
                'format' => 'p class="all-12"',
                'order' => 3,
                'text' => "This project labelled Iranian state-sponsored propaganda tweets for their sentiment
                automatically and evaluated the performance of five supervised machine learning algorithms for their
                ability to accurately classify the sentiment contained in the tweets.",
            ],
            [
                'project_id' => 3,
                'format' => 'h3 class="all-12"',
                'order' => 4,
                'text' => "The Data",
            ],
            [
                'project_id' => 3,
                'format' => 'p class="all-12"',
                'order' => 5,
                'text' => "This project used tweets from Twitter's election integrity datasets. These datasets consist
                of tweets from accounts that have been permanently suspended from the Twitter platform as they were
                identified as belonging to state-sponsored actors and pushed narratives on their behalf.",
            ],
            [
                'project_id' => 3,
                'format' => 'h3 class="all-12"',
                'order' => 6,
                'text' => "Data Extraction",
            ],
            [
                'project_id' => 3,
                'format' => 'p class="all-12"',
                'order' => 7,
                'text' => "This project was performed on tweets about the Iranian nuclear deal (JCPOA) as it was an
                internationally controversial issue, that Iran would likely be spreading propaganda about. To extract
                tweets about the nuclear deal, several keyterms were used (see <a href=
                \"https://github.com/MichaelBarrows/NuclearDealTweetExtraction/blob/master/original_keywords.csv\"
                target=\"_blank\">here</a>).",
            ],
            [
                'project_id' => 3,
                'format' => 'p class="all-12"',
                'order' => 8,
                'text' => "These keyterms were chosen after analysting the most frequent terms per month across the
                three (at the time) Iranian releases. Additionally, the extracted tweets were restricted to English
                and published between August 2013 and December 2018. Retweets were excluded to prevent the machine
                learning algorithms from developing a bias towards tweets that appear often as retweets.",
            ],
            [
                'project_id' => 3,
                'format' => 'h3 class="all-12"',
                'order' => 9,
                'text' => "Preprocessing",
            ],
            [
                'project_id' => 3,
                'format' => 'p class="all-12"',
                'order' => 10,
                'text' => "To prepare the tweets for labelling, steps were taken to transform the text in order to
                achieve the best possible results. These steps included: lowercase conversion, normalising accented
                letters, removing usernames, transforming hashtags, removing URL's, expanding contractions, removing
                special characters and removing stopwords. These steps were taken to improve the chance of matching
                words between the lexicon and the tweets, and to speed up processing.",
            ],
            [
                'project_id' => 3,
                'format' => 'h3 class="all-12"',
                'order' => 11,
                'text' => "Sentiment Labelling",
            ],
            [
                'project_id' => 3,
                'format' => 'p class="all-12"',
                'order' => 12,
                'text' => "To label the tweets for their sentiment, the SentiWordNet Lexicon was used. This lexicon
                provides a score between 0 and 1 for both positive and negative sentiments. The lexicon also provides
                a score between 0 and 1 for objectivity. The sentiment of the tweet was determined by averaging the
                positive and negative sentiment scores, and identifying which score was higher. If the scores were
                equal, the tweet was considered neutral.",
            ],
            [
                'project_id' => 3,
                'format' => 'h3 class="all-12"',
                'order' => 13,
                'text' => "Sentiment Analysis (Machine Learning Task)",
            ],
            [
                'project_id' => 3,
                'format' => 'p class="all-12"',
                'order' => 14,
                'text' => "The machine learning task of sentiment analysis was completed using a metric called Match
                Percentage Threshold (MPT); this metric represents the number of matches between the tweet and the
                lexicon as a percentage, with a higher percentage indicating a higher number of matched words. The
                machine learning tasks were performed across 5 features: unigrams, bigrams, trigrams, unigrams +
                bigrams, unigrams + bigrams + trigrams. The 5 algorithms used for these experiments were: K-Nearest
                Neighbours, Decision Tree, Naive Bayes, Support Vector Machine (with a linear kernel), and Random
                Forest.",
            ],
            [
                'project_id' => 3,
                'format' => 'h3 class="all-12"',
                'order' => 15,
                'text' => "Results",
            ],
            [
                'project_id' => 3,
                'format' => 'p class="all-12"',
                'order' => 16,
                'text' => "Not yet available.",
            ],
            [
                'project_id' => 4,
                'format' => 'h3 class="all-12"',
                'order' => 1,
                'text' => "Summary",
            ],
            [
                'project_id' => 4,
                'format' => 'p class="all-12"',
                'order' => 2,
                'text' => "A website for calculating university grades (module, year, undergraduate degree, integrated
                master's degree, and master's degree).",
            ],
            [
                'project_id' => 4,
                'format' => 'h3 class="all-12"',
                'order' => 3,
                'text' => "Why?",
            ],
            [
                'project_id' => 4,
                'format' => 'p class="all-12"',
                'order' => 4,
                'text' => "This grade calculator was created to make calculating university grades easier. Weighted
                grades are difficult to calculate mentally, and the formula for performing the calculations can be
                difficult to remember.",
            ],
            [
                'project_id' => 4,
                'format' => 'h3 class="all-12"',
                'order' => 5,
                'text' => "Version 1",
            ],
            [
                'project_id' => 4,
                'format' => 'p class="all-12"',
                'order' => 6,
                'text' => "Version 1 was created between my second and third years of university (2017). The initial
                version used a small portion of the screen on desktop, and included calculators for module and year.",
            ],
            [
                'project_id' => 4,
                'format' => 'h3 class="all-12"',
                'order' => 7,
                'text' => "Version 2",
            ],
            [
                'project_id' => 4,
                'format' => 'p class="all-12"',
                'order' => 8,
                'text' => "Version 2 was created in 2020 and uses much of the same code as version 1. Version 2 was
                developed using Laravel to allow for future expansion.",
            ],
            [
                'project_id' => 4,
                'format' => 'p class="all-12"',
                'order' => 9,
                'text' => "Changes in version 2 included: calculators for degree grades (undergraduate, master's and
                integrated master's), a better user interface and prefilled values (can be modified) for the credits
                with the degree calculators.",
            ],
            [
                'project_id' => 4,
                'format' => 'h3 class="all-12"',
                'order' => 10,
                'text' => "Future Development.",
            ],
            [
                'project_id' => 4,
                'format' => 'p class="all-12"',
                'order' => 11,
                'text' => "Future development of the website will hopefully allow users to store their grades so that
                they don't have to re-enter them every time.",
            ],
            [
                'project_id' => 4,
                'format' => 'p class="all-12"',
                'order' => 12,
                'text' => "Other potential features include links to individual university grading guidelines (possibly
                user submitted) and potentially implementing these guidelines into the application (e.g. MComp courses
                at one university may be weighted 20:30:50, whereas another university may use 20:20:60).",
            ],
            [
                'project_id' => 5,
                'format' => 'p class="all-12"',
                'order' => 1,
                'text' => "Content coming soon.",
            ],
            [
                'project_id' => 6,
                'format' => 'p class="all-12"',
                'order' => 1,
                'text' => "This project was completed as part of the MComp Web Design and Development course at Edge
                Hill University.",
            ],
            [
                'project_id' => 6,
                'format' => 'h3 class="all-12"',
                'order' => 2,
                'text' => "Summary",
            ],
            [
                'project_id' => 6,
                'format' => 'p class="all-12"',
                'order' => 3,
                'text' => "A chatbot and FAQ's mobile website were created for new students within Edge Hill
                University's Department of Computer Science to aid their transition to university. The two applications
                were evaluated using a task-based usability evaluation and a questionnaire (usefulness, satisfaction
                and ease of use). The usability evaluation identified some issues to be rectified in both applications
                and the questionnaire was used to evaluate the perceived usefulness of the applications. First year
                Computer Science students completed the evaluation as new Computer Science students were not available
                due to the time of year that this project took place.",
            ],
            [
                'project_id' => 6,
                'format' => 'h3 class="all-12"',
                'order' => 4,
                'text' => "Problem",
            ],
            [
                'project_id' => 6,
                'format' => 'p class="all-12"',
                'order' => 5,
                'text' => "When starting university, new students require information so that they can make a
                successful transition to higher education. Freshers' week provides the opportunity for new students
                to connect with their peers and to get used to what is expected of them at university. This period is
                crucial to ensure that students successfully integrate into university life. Students can experience
                information overload as the communication of information is one way and the information is dull.
                Information overload can lead to a student being unable to successfully integrate into university
                life, which can in turn lead to their withdrawal from the university or impact upon their successes
                during their course. Technology can be used to improve the induction process, by making information
                more interactive, students may be more engaged with the information which could resolve the problem
                of one-way communication. Chatbots can be considered to be a novelty and research has shown that users
                may be more likely to engage with novel technologies.",
            ],
            [
                'project_id' => 6,
                'format' => 'h3 class="all-12"',
                'order' => 6,
                'text' => "Research",
            ],
            [
                'project_id' => 6,
                'format' => 'p class="all-12"',
                'order' => 7,
                'text' => "The title of this dissertation was 'A chatbot to facilitate new undergraduate Computer
                Science students' transition to university: is it technically feasible and would students find it
                useful?'. The research covered two aspects: the technical implementation of a chatbot and the perceived
                usefulness of a chatbot for new Computer Science students. The technical implementation aspect was
                completed by comparing two chatbot implementation methods: chatterbot (a Python package) and BotMan
                Studio (a PHP framework). The perceived usefulness evaluation was completed by implementing a chatbot
                and a FAQ's website and having first year Computer Science students conduct a usability evaluation and
                complete a questionnaire (usefulness, satisfaction and ease of use) afterwards.",
            ],
            [
                'project_id' => 6,
                'format' => 'h3 class="all-12"',
                'order' => 8,
                'text' => "Findings",
            ],
            [
                'project_id' => 6,
                'format' => 'p class="all-12"',
                'order' => 9,
                'text' => "The findings revealed that the chatterbot package would be a better method for implementing
                the chatbot, because it can learn from its conversations with users and had corpora for general
                conversations. Whilst the chatbot being able to learn from its conversations with users is an advantage,
                it is also a drawback, as the chatbot could be taught responses which are inappropriate (e.g. racism and
                xenophobia). Other disadvantages included the steep learning curve and narrow time frame. The BotMan
                Studio framework was found to have a less steep learning curve as I have used PHP extensively
                throughout my degree as well as the Laravel framework. Given more time, the chatbot would have been
                developed using the chatterbot package.",
            ],
            [
                'project_id' => 6,
                'format' => 'p class="all-12"',
                'order' => 10,
                'text' => "The findings from the user studies revealed various usability issues in both applications,
                including the users' thinking they had an answer to their question and moving on to the next as well
                as issues with the categorisation of the questions. The chatbot was rated more highly for all questions
                in the questionnaire with the exception of one. It was therefore concluded that the users perceived
                the chatbot to be more useful than the FAQ's website.",
            ],
            [
                'project_id' => 6,
                'format' => 'h3 class="all-12"',
                'order' => 11,
                'text' => "The Applications",
            ],
            [
                'project_id' => 6,
                'format' => 'p class="all-12"',
                'order' => 12,
                'text' => "The applications had a shared database and used the same data, so that the data was
                consistent across both applications. Both applications were created within the same project and both
                used Behaviour Driven Development.",
            ],
            [
                'project_id' => 6,
                'format' => 'h3 class="all-12"',
                'order' => 13,
                'text' => "Chatbot",
            ],
            [
                'project_id' => 6,
                'format' => 'p class="all-12"',
                'order' => 14,
                'text' => "The chatbot works by matching the words in a user's query to those contained in the
                pre-defined questions – the more words matched, the more likely that the question is a match. When the
                question matched was very broad, a follow up question would be returned with pre-defined follow up
                options so that the response returned would be more focussed and specific to the information required
                to the user. The response provided could also contain links to external information if this was more
                appropriate than displaying the information within the application. Initially, the chatbot would
                compare every word in the users query with every word in each question, meaning that the chatbot would
                be considering words such as 'and', 'of' and 'can' which did not help to identify the correct question.
                To improve the accuracy and performance of the chatbot, the Keyword Extractor API was created which
                extracted and stored keywords from questions and extracted keywords from the user's query. This meant
                that the chatbot could compare the keywords, which reduced processing time and returned more accurate
                results. The chatbot can be used without the Keyword Extractor API, however the accuracy and
                performance are diminished.",
            ],
            [
                'project_id' => 6,
                'format' => 'h3 class="all-12"',
                'order' => 15,
                'text' => "FAQ's Mobile Website",
            ],
            [
                'project_id' => 6,
                'format' => 'p class="all-12"',
                'order' => 16,
                'text' => "The FAQ's mobile website was created so that the results from the research with the chatbot
                could be compared. The FAQ's mobile website was created using Laravel and inside the same project as
                the chatbot as BotMan Studio is a framework built on top of Laravel. No aspect of BotMan Studio was
                used for the FAQ's mobile website. The information was structured in topics, and inside a topic
                contained the individual questions, which would expand when clicked to show the answer or a follow
                up question with follow up options. When a follow up option was selected, the answer would be revealed
                to the user.",
            ],
            [
                'project_id' => 6,
                'format' => 'h3 class="all-12"',
                'order' => 17,
                'text' => "Testing",
            ],
            [
                'project_id' => 6,
                'format' => 'p class="all-12"',
                'order' => 18,
                'text' => "Behaviour Driven Development (BDD) was used to test the applications using CodeCeption. The
                BDD tests were created prior to development of the applications so that coding would start with a
                collection of failing tests. The applications were coded according to the stage of the test that needed
                to be passed. The BDD tests had to be adapted due to issues with JavaScript functionality in the
                chatbot. The affected tests were modified to test the backend functionality and more tests created to
                test the data being returned from the BotMan API rather than test it being displayed to the user. This
                was felt to be an acceptable compromise as the displaying of chatbot responses was completed manually.",
            ],
            [
                'project_id' => 7,
                'format' => 'p class="all-12"',
                'order' => 1,
                'text' => "This project was completed as part of the MComp Web Design and Development course at Edge
                Hill University.",
            ],
            [
                'project_id' => 7,
                'format' => 'h3 class="all-12"',
                'order' => 2,
                'text' => "Summary",
            ],
            [
                'project_id' => 7,
                'format' => 'p class="all-12"',
                'order' => 3,
                'text' => "The Keyword Extractor API is used to extract keywords from some text. The API was developed
                using Python's Flask framework and uses part-of-speech (POS) tagging to tag each word in a query and
                returns the words whose POS tags match the rules provided prior (nouns [singular, plural and mass],
                proper nouns [singular], verbs and adjectives).",
            ],
            [
                'project_id' => 7,
                'format' => 'h3 class="all-12"',
                'order' => 4,
                'text' => "Problem",
            ],
            [
                'project_id' => 7,
                'format' => 'p class="all-12"',
                'order' => 5,
                'text' => "The problem encountered which inspired this project was encountered while developing the
                chatbot for my dissertation project. The chatbot was comparing every word in the user's query with
                every word in each question, including conjunctions which do not add meaning to a query, and appear in
                almost every question in the dataset. This was impacting upon the performance of the chatbot as it was
                making many unnecessary comparisons; the accuracy of the chatbot was also impaired, as one extra 'and'
                in a question could make the difference between the chatbot selecting one question over another.",
            ],
            [
                'project_id' => 7,
                'format' => 'h3 class="all-12"',
                'order' => 6,
                'text' => "Implementation",
            ],
            [
                'project_id' => 7,
                'format' => 'p class="all-12"',
                'order' => 7,
                'text' => "From the outset, it was decided that the solution would be built using Python, as I have
                experience of using the Natural Language Toolkit package in Python. As the chatbot is written in PHP,
                the keyword extractor had to built as an API so that the languages would not be a barrier to
                implementation. Flask was used because it is simple to develop API's, and this project was only going
                to be a small part of my dissertation project. The POS tags used as rules were identified using a trial
                and error approach; 6 random questions were POS tagged to identify which tag they contained. The POS
                tags of words that added meaning to the question were added to a list to include in the rules. One of
                the questions contained the word 'xbox', which had a POS tag of '$' – this was included as it was felt
                that the word 'xbox' added context to the question.",
            ],
            [
                'project_id' => 7,
                'format' => 'p class="all-12"',
                'order' => 8,
                'text' => "The keyword extractor receives a query as a URL parameter and then the query is tokenised.
                Once the query is tokenised, the resulting words are tagged with part-of-speech tags. These tags
                identified whether the word was a verb, adjective, etc. The POS tags are checked against pre-defined
                rules which dictates which words should be considered keywords. The resulting keywords are then
                returned.",
            ],
            [
                'project_id' => 7,
                'format' => 'p class="all-12"',
                'order' => 9,
                'text' => "All of the questions in the database were automatically sent to the keyword extractor API
                and their keywords stored, so that the comparisons would be of the stored keywords rather than each
                word in the question. Users queries were sent to the keyword extractor API and the keywords of the
                query were returned. This approach did not allow for spelling errors, and a word with a spelling error
                would be unlikely to match a rule and would therefore be discarded.",
            ],
            [
                'project_id' => 7,
                'format' => 'h3 class="all-12"',
                'order' => 10,
                'text' => "Findings",
            ],
            [
                'project_id' => 7,
                'format' => 'p class="all-12"',
                'order' => 11,
                'text' => "The chatbot was significantly faster after implementing the keyword extractor – each
                question generally had two keywords, which is significantly less than the number of words contained in
                the question. This resulted in significantly quicker results. Another benefit of this application was
                that the question matches by the chatbot were more accurate, as words that did not add meaning could
                not skew the chatbot towards one question or another. This keyword extractor was only a small part of
                the project, but it made a great difference to the chatbot.",
            ],
            [
                'project_id' => 8,
                'format' => 'p class="all-12"',
                'order' => 1,
                'text' => "This project was completed as part of the MComp Web Design and Development course at Edge
                Hill University.",
            ],
            [
                'project_id' => 8,
                'format' => 'h3 class="all-12"',
                'order' => 2,
                'text' => "Scenario",
            ],
            [
                'project_id' => 8,
                'format' => 'p class="all-12"',
                'order' => 3,
                'text' => "The scenario for this project was that a company was going to invest in a company that makes
                apps that are distributed via Amazon. The company wanted to identify the best company to invest in
                using machine learning to analyse the sentiment of a dataset of Amazon product reviews. Each of the
                three companies had three apps. The dataset consisted of 20,000 reviews for training the machine
                learning algorithms and 20,000 reviews to test the algorithms predictions; each row in the dataset
                consisted of a product ID, the sentiment score and the text of the product review. My task was to
                identify the best algorithm to complete the task, implement it and identify the best company for
                investment according to the predictions made by the best algorithm.",
            ],
            [
                'project_id' => 8,
                'format' => 'h3 class="all-12"',
                'order' => 4,
                'text' => "Summary",
            ],
            [
                'project_id' => 8,
                'format' => 'p class="all-12"',
                'order' => 5,
                'text' => "The six machine learning algorithms which were evaluated included Linear Support Vector
                Machine (Linear SVM), Feed Forward Neural Network, Naïve Bayes, Random Forest, ID3 Decision Tree and
                K-Nearest Neighbours. The modifier values for each algorithm were experimented with on a trial and
                error basis, and a total of 72 experiments were completed with the six algorithms and their various
                modifiers. The performance of the algorithms was evaluated using the f-score, precision and recall.
                Once complete, the company scores would be calculated using the best algorithms predictions and a
                company would be identified as being the best for investment.",
            ],
            [
                'project_id' => 8,
                'format' => 'h3 class="all-12"',
                'order' => 6,
                'text' => "Implementation",
            ],
            [
                'project_id' => 8,
                'format' => 'p class="all-12"',
                'order' => 7,
                'text' => "The implementation was completed using Python's Scikit Learn package. Each word of each
                review was used as a feature (bag of words) and the matrix of features created for the training
                dataset was used to train the algorithm. Each algorithm was then implemented with its various modifier
                values, with K-NN being used as the baseline for which all other results were compared. All predictions
                were then pulled together into a single table and the results were sorted. Graphs were automatically
                created and stored for each algorithm showing the performance. The best predictions for each algorithm
                were stored in CSV files to be used later. A table was also created automatically in the LaTeX format
                to be inserted into the report. After the algorithm evaluation was complete, company analysis
                commenced.",
            ],
            [
                'project_id' => 8,
                'format' => 'p class="all-12"',
                'order' => 8,
                'text' => "The company analysis was completed by counting the number of predicted neutral, positive and
                negative reviews across all applications belonging to the company. The positive and negative review
                counts were weighted to be worth twice that of the neutral reviews. This was calculated as:",
            ],
            [
                'project_id' => 8,
                'format' => 'p class="all-12"',
                'order' => 9,
                'text' => "Score = (Neutral + (Positive * 2) – (Negative * 2)) / 2",
            ],
            [
                'project_id' => 8,
                'format' => 'p class="all-12"',
                'order' => 10,
                'text' => "The best company for investment was the company with the highest score.",
            ],
            [
                'project_id' => 8,
                'format' => 'h3 class="all-12"',
                'order' => 11,
                'text' => "Results",
            ],
            [
                'project_id' => 8,
                'format' => 'p class="all-12"',
                'order' => 12,
                'text' => "The best (highest f-score) algorithm for the sentiment analysis of the reviews was the
                Linear SVM algorithm (C value = 0.03) with an f-score of 0.779. This application also managed to
                identify the best company for investment which was Company 2. The algorithm evaluation was completed in
                a way so that the script could be run and all of the 72 experiments would run in turn with the graphs
                and other files being created without any intervention required.",
            ],
            [
                'project_id' => 9,
                'format' => 'p class="all-12"',
                'order' => 1,
                'text' => "This project was completed as part of the MComp Web Design and Development course at Edge
                Hill University.",
            ],
            [
                'project_id' => 9,
                'format' => 'h3 class="all-12"',
                'order' => 2,
                'text' => "Scenario",
            ],
            [
                'project_id' => 9,
                'format' => 'p class="all-12"',
                'order' => 3,
                'text' => "The scenario for this assignment was that a self-contained currency converter needed to be
                constructed, that could be added to a website. The currency converter had to obtain the current
                exchange rates and be responsive. The styling of the currency converter was not to be a major
                consideration; however, it should be assumed that this would be added to doggiegadgets.com for
                customers to use.",
            ],
            [
                'project_id' => 9,
                'format' => 'h3 class="all-12"',
                'order' => 4,
                'text' => "Summary",
            ],
            [
                'project_id' => 9,
                'format' => 'p class="all-12"',
                'order' => 5,
                'text' => "The currency converter was created as a standalone application and was designed specifically
                for mobile as it would be used as a widget. The currency converter gets the current exchange rates and
                converts to the five most popular currencies (as of April 2018). A webpage for a product from
                doggiegadgets.com was downloaded and the currency converter was implemented into it.",
            ],
            [
                'project_id' => 9,
                'format' => 'h3 class="all-12"',
                'order' => 6,
                'text' => "Standalone Implementation",
            ],
            [
                'project_id' => 9,
                'format' => 'p class="all-12"',
                'order' => 7,
                'text' => "The currency converter was created using JavaScript, JQuery, Sass and HTML5. It was built in
                an object-oriented manner and converts amounts to the US Dollar, Euro, Japanese Yen, Australian Dollar
                and the Canadian Dollar. The exchange rates were obtained from <a href=\"https://fixer.io/\"
                target=\"_blank\">fixer.io</a>; this API was deprecated after this assignment was completed so the API
                was switched to <a href=\"http://exchangeratesapi.io/\" target=\"_blank\">exchangeratesapi.io</a>. The
                  new API works identically to the old one so only the URL needed changing within the code. The
                  currency converter also contains the flags for the relevant institution that the currency belongs to.
                  Within the standalone currency converter, the exchange rate is shown beneath the conversion.",
            ],
            [
                'project_id' => 9,
                'format' => 'h3 class="all-12"',
                'order' => 8,
                'text' => "Doggiegadgets.com Implementation",
            ],
            [
                'project_id' => 9,
                'format' => 'p class="all-12"',
                'order' => 9,
                'text' => "The currency converter was implemented in a webpage from doggiegadgets.com, however rather
                than integrate it as a standalone widget, it uses the prices in the page to complete the conversion.
                The page contains a retail price which has a line through it and a sale price. When a currency is
                selected, both of these prices are converted using the converter and the prices are updated to reflect
                the new currency. An additional feature of the website implementation is that the prices can be changed
                back to GBP. Other than these additional features, the implementation is identical to that of the
                standalone currency converter.",
            ],
        ]);
    }
}
