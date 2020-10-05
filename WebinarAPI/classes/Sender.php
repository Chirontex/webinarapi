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

class Sender implements SenderInterface
{

    public static function post(string $url, string $token, array $params)
    {

        $data = json_encode($params);

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'x-auth-token: '.$token,
            'Content-Type: application/x-www-form-urlencoded'
        ]);

        $answer = curl_exec($ch);
        $result = json_decode($answer, true);

        if (is_array($result)) return $result;
        else return $answer;

    }

    public static function get(string $url, string $token, array $params)
    {

        $req = $url;

        foreach ($params as $key => $value) {
            
            if ($req === $url) $req .= '?';
            else $req .= '&';

            $req .= urlencode($key).'='.urlencode($value);

        }

        $ch = curl_init($req);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'x-auth-token: '.$token,
            'Content-Type: application/x-www-form-urlencoded'
        ]);

        $answer = curl_exec($ch);
        $result = json_decode($answer, true);

        if (is_array($result)) return $result;
        else return $answer;

    }

}
