<?php

class Utils {

	/**
	* Read asset version from manifest and append to filename
	* @param  string $fileName Filename
	* @param  string $manifest Manifest filename
	*/
	public static function getAssetRevision($fileName, $manifest) {
		$manifestPath = "rev/" . $manifest . ".json";

	// Get manifest if file exists
		if ( file_exists( $manifestPath ) ) {
			$payload = json_decode( file_get_contents( $manifestPath ), true );
		} else {
			$payload = array();
		}

		if ( is_array( $payload ) ) {
			if ( array_key_exists( $fileName, $payload ) ) {
				return $fileName . "?v=" . $payload[$fileName];
			}
		}

		return $fileName;
	}	
}

?>