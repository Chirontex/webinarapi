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
     * Method for register a participant to a webinar.
     * 
     * @param string $event_session_ID
     * Webinar ID.
     * @param array $params
     * If $params['email'] is not set or have an incorrect value, the method will return false.
     * @return array|string|bool
     */
    public function registerWebinarParticipant(string $event_session_ID, array $params);

    /**
     * Method for register a participant to an event.
     * 
     * @param string $event_ID
     * Webinar ID.
     * @param array $params
     * If $params['email'] is not set or have an incorrect value, the method will return false.
     * @return array|string|bool
     */
    public function registerEventParticipant(string $event_ID, array $params);

    /**
     * Receives an information about webinars.
     * 
     * @param array $params
     * @return array|string|bool
     */
    public function getWebinarsInfo(array $params = []);

}
