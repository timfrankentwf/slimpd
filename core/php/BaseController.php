<?php
namespace Slimpd;
/* Copyright (C) 2015-2016 othmar52 <othmar52@users.noreply.github.com>
 *
 * This file is part of sliMpd - a php based mpd web client
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU Affero General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License
 * for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

class BaseController {
    use \Slimpd\Traits\CommonResponseMethods;

    protected $container;

    public function __construct($container) {
        $this->container = $container;
    }

    // Magic property
    public function __get($property) {
        if ($this->container->{$property}) {
            return $this->container->{$property};
        }
    }

    // Magic property
    public function getRenderItems() {
        #print_r($this->container->db); die;
        $args = func_get_args();
        $return = array(
            "genres" => [],
            "labels" => [],
            "artists" => [],
            "albums" => [],
            "itembreadcrumbs" => [],
        );

        foreach($args as $argument) {
            if(is_object($argument) === TRUE) {
                if(get_class($argument) === "Slimpd\Models\Directory") {
                    continue;
                }
                $repoKey = $argument->getRepoKey();
                $this->container->$repoKey->fetchRenderItems($return, $argument);
            }
            if(is_array($argument) === TRUE) {
                foreach($argument as $item) {
                    if(is_object($item) === FALSE) {
                        continue;
                    }
                    if(get_class($item) === "Slimpd\Models\Directory") {
                        continue;
                    }
                    $repoKey = $item->getRepoKey();
                    $this->container->$repoKey->fetchRenderItems($return, $item);
                }
            }
        }
        return $return;
    }
}
