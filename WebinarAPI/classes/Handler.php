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

    public function registerWebinarParticipant(string $event_session_ID, array $params)
    {

        if (isset($params['email'])) {

            if (filter_var($params['email'], FILTER_VALIDATE_EMAIL)) $result = Sender::post('https://userapi.webinar.ru/v3/eventsessions/'.$event_session_ID.'/register', $this->token, $params);
            else $result = false;

        } else $result = false;

        return $result;

    }

    public function registerEventParticipant(string $event_ID, array $params)
    {

        if (isset($params['email'])) {

            if (filter_var($params['email'], FILTER_VALIDATE_EMAIL)) $result = Sender::post('https://userapi.webinar.ru/v3/events/'.$event_ID.'/register', $this->token, $params);
            else $result = false;

        } else $result = false;

        return $result;

    }

    public function getWebinarsInfo(array $params = [])
    {

        return Sender::get('https://userapi.webinar.ru/v3/organization/events/schedule', $this->token, $params);

    }

}