<?php namespace Potsky\LaravelLocalizationHelpers\Factory;

class MessageBag implements MessageBagInterface
{
	const LINE     = 'line';
	const INFO     = 'info';
	const COMMENT  = 'comment';
	const QUESTION = 'question';
	const ERROR    = 'error';

	private $bag = array();

	/**
	 * Tell whether or not this bag has pending messages
	 *
	 * @return bool
	 */
	public function hasMessages()
	{
		return ( count( $this->bag ) > 1 );
	}

	/**
	 * Get all messages as an array
	 *
	 * Use getMessageType and getMessage to parse a message
	 *
	 * @return array
	 */
	public function getMessages()
	{
		return $this->bag;
	}

	/**
	 * Clean the bag by removing all messages
	 */
	public function deleteMessages()
	{
		$this->bag = array();
	}

	/**
	 * Get the message type of a message get by getMessages
	 *
	 * @param array $message
	 *
	 * @return mixed
	 */
	public function getMessageType( $message )
	{
		return $message[ 0 ];
	}


	/**
	 * Get the message text
	 *
	 * @param array $message
	 *
	 * @return mixed
	 */
	public function getMessage( $message )
	{
		return $message[ 1 ];
	}


	/**
	 * Add a simple message
	 *
	 * @param   string $s the message to display
	 *
	 * @return  void
	 */
	public function writeLine( $s )
	{
		$this->bag[] = array( self::LINE , $this->cleanMessage( $s ) );
	}

	/**
	 * Add an info message
	 *
	 * @param   string $s the message to display
	 *
	 * @return  void
	 */
	public function writeInfo( $s )
	{
		$this->bag[] = array( self::INFO , $this->cleanMessage( $s ) );
	}

	/**
	 * Add a comment message
	 *
	 * @param   string $s the message to display
	 *
	 * @return  void
	 */
	public function writeComment( $s )
	{
		$this->bag[] = array( self::COMMENT , $this->cleanMessage( $s ) );
	}

	/**
	 * Add a question message
	 *
	 * @param   string $s the message to display
	 *
	 * @return  void
	 */
	public function writeQuestion( $s )
	{
		$this->bag[] = array( self::QUESTION , $this->cleanMessage( $s ) );
	}

	/**
	 * Add an error message
	 *
	 * @param   string $s the message to display
	 *
	 * @return  void
	 */
	public function writeError( $s )
	{
		$this->bag[] = array( self::ERROR , $this->cleanMessage( $s ) );
	}

	/**
	 * Trim and remove all XML tags
	 *
	 * @param string $m the message to clean
	 *
	 * @return string
	 */
	protected function cleanMessage( $m )
	{
		return preg_replace( '@<[A-Za-z0-9/]*>@' , '' , trim( $m ) );
	}
}