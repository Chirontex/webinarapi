<?php
/**
 *    WebinarAPI Handler 0.35
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
spl_autoload_register(function($classname) {

    $mobule_namespace = 'WebinarAPI';

    if (strpos($classname, $mobule_namespace) !== false) {

        $dir = __DIR__.'/classes/';

        if (substr($classname, -9) === 'Interface') $dir .= 'interfaces/';

        $filename = substr($classname, strpos($classname, $mobule_namespace.'\\') + (iconv_strlen($mobule_namespace) + 1)).'.php';

        if (file_exists($dir.$filename)) require_once $dir.$filename;

    }

});
