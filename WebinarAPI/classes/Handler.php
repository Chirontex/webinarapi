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

class Handler implements HandlerInterface
{

    private $token;

    public function __construct(string $token)
    {
        
        $this->token = $token;

    }

    public function registerWebinarParticipant(string $event_session_ID, string $email, array $params = [])
    {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $params['email'] = $email;

            return Sender::post('https://userapi.webinar.ru/v3/eventsessions/'.$event_session_ID.'/register', $this->token, $params);

        } else return false;

    }

    public function registerEventParticipant(string $event_ID, string $email, array $params = [])
    {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $params['email'] = $email;

            return Sender::post('https://userapi.webinar.ru/v3/events/'.$event_ID.'/register', $this->token, $params);

        } else return false;

    }

    public function getAllEventsInfo(array $params = [])
    {

        return Sender::get('https://userapi.webinar.ru/v3/organization/events/schedule', $this->token, $params);

    }

    public function getEventInfo(string $event_ID)
    {

        return Sender::get('https://userapi.webinar.ru/v3/organization/events/'.$event_ID, $this->token, []);

    }

    public function getWebinarInfo(string $event_session_ID)
    {

        return Sender::get('https://userapi.webinar.ru/v3/eventsessions/'.$event_session_ID, $this->token, []);

    }

    public function getTestInfo(string $test_ID, array $params = [])
    {

        return Sender::get('https://userapi.webinar.ru/v3/tests/'.$test_ID, $this->token, $params);

    }

    public function getTestResults(string $test_ID, array $params = [])
    {

        return Sender::get('https://userapi.webinar.ru/v3/tests/'.$test_ID.'/results', $this->token, $params);

    }

    public function getTestCustomAnswers(string $test_ID, array $params = [])
    {

        return Sender::get('https://userapi.webinar.ru/v3/tests/'.$test_ID.'/customanswers', $this->token, $params);

    }

    public function answerTest(string $test_session_ID, array $params)
    {

        if (isset($params['userData']) && isset($params['answers'])) {

            if (filter_var($params['userData']['email'], FILTER_VALIDATE_EMAIL) &&
                isset($params['answers']['questionId']) &&
                isset($params['answers']['answersId']) &&
                isset($params['answers']['customAnswer'])) $result = Sender::post('https://userapi.webinar.ru/v3/testsessions/'.$test_session_ID.'/answers', $this->token, $params);
            else $result = false;

        } else $result = false;

        return $result;

    }

    public function getChatMessages(string $event_session_ID, array $params = [])
    {

        return Sender::get('https://userapi.webinar.ru/v3/eventsessions/'.$event_session_ID.'/chat', $this->token, $params);

    }

    public function sendChatMessage(string $event_session_ID, $text, array $params = [])
    {

        $params['text'] = (string)$text;

        return Sender::post('https://userapi.webinar.ru/v3/eventsessions/'.$event_session_ID.'/chat', $this->token, $params);

    }

    public function getWebinarQuestions(string $event_session_ID, array $params = [])
    {

        return Sender::get('https://userapi.webinar.ru/v3/eventsessions/'.$event_session_ID.'/questions', $this->token, $params);

    }

    public function sendQuestionAnswer(string $event_session_ID, $text, array $params = [])
    {

        $params['text'] = (string)$text;

        return Sender::post('https://userapi.webinar.ru/v3/eventsessions/'.$event_session_ID.'/questions', $this->token, $params);

    }

    public function getWebinarsStat(array $params = [])
    {

        return Sender::get('https://userapi.webinar.ru/v3/stats/events', $this->token, $params);

    }

    public function getParticipantsStat(array $params = [])
    {

        return Sender::get('https://userapi.webinar.ru/v3/stats/users', $this->token, $params);

    }

    public function getVisitsStat(array $params = [])
    {

        return Sender::get('https://userapi.webinar.ru/v3/stats/users/visits', $this->token, $params);

    }

    public function getWebinarParticipants(string $event_session_ID, array $params = [])
    {

        return Sender::get('https://userapi.webinar.ru/v3/eventsessions/'.$event_session_ID.'/participations', $this->token, $params);

    }

}
