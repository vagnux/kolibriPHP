<?php
/*
 *  Copyright (C) 2016 vagner    
 * 
 *    This file is part of Kolibri.
 *
 *    Kolibri is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    Kolibri is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with Kolibri.  If not, see <http://www.gnu.org/licenses/>. 
 */

class taskRun {
	function run($executavel) {
		switch (pcntl_fork ()) {
			case 0 :
				$cmd = "$executavel";
				$args = array (
						"",
						"" 
				);
				pcntl_exec ( $cmd, $args );
				// the child will only reach this point on exec failure,
				// because execution shifts to the pcntl_exec()ed command
				exit ( 0 );
			default :
				break;
		}
	}
}