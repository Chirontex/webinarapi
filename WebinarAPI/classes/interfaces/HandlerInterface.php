<?php
/**
 *    WebinarAPI Handler
 *    Copyright (C) 2020  Dmitry Shumilin (dr.noisier@yandex.ru)
 *
 *    This program is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */
namespace WebinarAPI;

interface HandlerInterface
{

    /**
     * Handler constructor.
     * 
     * @param string $token
     */
    public function __construct(string $token);

    /**
     * Method for register a participant to a webinar. See the docs: https://help.webinar.ru/ru/articles/3149210
     * 
     * @param string $event_session_ID
     * @param string $email
     * If email is incorrect, the method will return false.
     * @param array $params
     * @return array|string|bool
     */
    public function registerWebinarParticipant(string $event_session_ID, string $email, array $params = []);

    /**
     * Method for register a participant to an event. See the docs: https://help.webinar.ru/ru/articles/3149396
     * 
     * @param string $event_ID
     * @param string $email
     * If email is incorrect, the method will return false.
     * @param array $params
     * @return array|string|bool
     */
    public function registerEventParticipant(string $event_ID, string $email, array $params = []);

    /**
     * Receives an information about events. See the docs: https://help.webinar.ru/ru/articles/3148981
     * 
     * @param array $params
     * @return array|string
     */
    public function getAllEventsInfo(array $params = []);

    /**
     * Receives an info about an event. See the docs: https://help.webinar.ru/ru/articles/3149030
     * 
     * @param string $event_ID
     * @return array|string
     */
    public function getEventInfo(string $event_ID);

    /**
     * Receives an info about a webinar. See the docs: https://help.webinar.ru/ru/articles/3148997
     * 
     * @param string $event_session_ID
     * @return array|string
     */
    public function getWebinarInfo(string $event_session_ID);

    /**
     * Receives an info about a test. See the docs: https://help.webinar.ru/ru/articles/3185356
     * 
     * @param string $test_ID
     * @param array $params
     * @return array|string
     */
    public function getTestInfo(string $test_ID, array $params = []);

    /**
     * Receives test results. See the docs: https://help.webinar.ru/ru/articles/3185593
     * 
     * @param string $test_ID
     * @param array $params
     * @return array|string
     */
    public function getTestResults(string $test_ID, array $params = []);

    /**
     * Receives test custom answers. See the docs: https://help.webinar.ru/ru/articles/3185522
     * 
     * @param string $test_ID
     * @param array $params
     * @return array|string
     */
    public function getTestCustomAnswers(string $test_ID, array $params = []);

    /**
     * Sends an answer to the test. See the docs: https://help.webinar.ru/ru/articles/3185471
     * 
     * @param string $test_session_ID
     * @param array $params
     * If required data is absent in $params, the method will return false.
     * @return array|string|bool
     */
    public function answerTest(string $test_session_ID, array $params);

    /**
     * Receives chat messages. See the docs: https://help.webinar.ru/ru/articles/3154793
     * 
     * @param string $event_session_ID
     * @param array $params
     * @return array|string
     */
    public function getChatMessages(string $event_session_ID, array $params = []);

    /**
     * Sends message to the chat. See the docs: https://help.webinar.ru/ru/articles/3154801
     * 
     * @param string $event_session_ID
     * @param $text
     * Text will be converted to string type.
     * @param array $params
     * @return array|string
     */
    public function sendChatMessage(string $event_session_ID, $text, array $params = []);

    /**
     * Receives webinar questions. See the docs: https://help.webinar.ru/ru/articles/3154818
     * 
     * @param string $event_session_ID
     * @param array $params
     * @return array|string
     */
    public function getWebinarQuestions(string $event_session_ID, array $params = []);

    /**
     * Sends question or answer. See the docs: https://help.webinar.ru/ru/articles/3154823
     * 
     * @param string $event_session_ID
     * @param $text
     * Text will be converted to string type.
     * @param array $params
     * @return array|string
     */
    public function sendQuestionAnswer(string $event_session_ID, $text, array $params = []);

    /**
     * Gets webinars statistics in period. See the docs: https://help.webinar.ru/ru/articles/3149503
     * 
     * @param array $params
     * @return array|string
     */
    public function getWebinarsStat(array $params = []);

    /**
     * Gets participants statistics in period. See the docs: https://help.webinar.ru/ru/articles/3149510
     * 
     * @param array $params
     * @return array|string
     */
    public function getParticipantsStat(array $params = []);
    
    /**
     * Gets participants visits stats in period. See the docs: https://help.webinar.ru/ru/articles/3149516
     * 
     * @param array $params
     * @return array|string
     */
    public function getVisitsStat(array $params = []);

    /**
     * Gets the list of webinar participants. See the docs: https://help.webinar.ru/ru/articles/3149487
     */
    public function getWebinarParticipants(string $event_session_ID, array $params = []);

}
