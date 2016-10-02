<?php
namespace Slimpd\Modules\albummigrator\SchemaTests\Dirname;
use Slimpd\RegexHelper as RGX;
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
 * FITNESS FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License
 * for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

class ArtistTitle extends \Slimpd\Modules\albummigrator\AbstractTests\AbstractTest {

	public function __construct($input) {
		$this->input = $input;
		$this->pattern = "/^" . RGX::NO_MINUS . "-" . RGX::NO_MINUS . "$/";
		return $this;
	}

	public function run() {
		if(preg_match($this->pattern, $this->input, $matches)) {
			$this->matches = $matches;
			$this->result = 'artist-title';
			return;
		}
	}

	public function scoreMatches(&$trackContext, &$albumContext, $jumbleJudge) {
		
		if(count($this->matches) === 0) {
			return;
		}
		$albumContext->recommend([
			'setArtist' => $this->matches[1],
			'setTitle' => $this->matches[2]
		]);
	}
}
