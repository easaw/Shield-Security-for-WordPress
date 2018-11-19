<?php

namespace FernleafSystems\Wordpress\Plugin\Shield\Databases\Scanner;

use FernleafSystems\Wordpress\Plugin\Shield\Databases\Base\BaseInsert;

class Insert extends BaseInsert {

	/**
	 * @param \FernleafSystems\Wordpress\Plugin\Shield\Databases\Scanner\EntryVO $oEntry
	 * @return bool
	 */
	public function insert( $oEntry ) {
		if ( !is_string( $oEntry->data ) || strpos( $oEntry->data, '{' ) === false ) {
			$oEntry->data = json_encode( $oEntry->data );
		}
		return parent::insert( $oEntry );
	}
}