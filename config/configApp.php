<?php

	const SERVER="localhost";
	const DB="renta_casas";
	const USER="root";
	const PASS="";

	const SGBD="mysql:host=".SERVER.";dbname=".DB;

	/** values to encryot and decrypt a string */
	const METHOD="AES-256-CBC";
	const SECRET_KEY='$RENTACASAS@2020';
	const SECRET_IV='037970';