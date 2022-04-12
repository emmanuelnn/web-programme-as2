<?php
namespace Ijdb\Enity;
class Joke {
	public $authorsTable;
	public $joketext;
	public $jokedate;
	public $id;
	public $uathorId;

	public function __construct(\CSY2028\DatabaseTable $authorsTable) {
		$this->authorsTable = $authorsTable;
	}

	public function getAuthor() {
		return $this->authorsTable->
	}
}