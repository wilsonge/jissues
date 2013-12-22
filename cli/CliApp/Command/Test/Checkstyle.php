<?php
/**
 * Part of the Joomla! Tracker application.
 *
 * @copyright  Copyright (C) 2013 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace CliApp\Command\Test;

use CliApp\Command\TrackerCommandOption;

use PHP_CodeSniffer_CLI;

/**
 * Class for running checkstyle tests.
 *
 * @since  1.0
 */
class Checkstyle extends Test
{
	/**
	 * The command "description" used for help texts.
	 *
	 * @var    string
	 * @since  1.0
	 */
	protected $description = 'Run PHP CodeSniffer tests';

	/**
	 * Constructor.
	 *
	 * @since   1.0
	 */
	public function __construct()
	{
		parent::__construct();

		$this->addOption(
			new TrackerCommandOption(
				'noprogress', '',
				'Don\'t use a progress bar.'
			)
		);
	}

	/**
	 * Execute the command.
	 *
	 * @throws \UnexpectedValueException
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function execute()
	{
		$this->application->outputTitle('Test Checkstyle');

		$options = array();

		$options['files'] = array(
			JPATH_ROOT . '/cli',
			JPATH_ROOT . '/src'
		);

		$options['standard'] = array(JPATH_ROOT . '/build/phpcs/Joomla');

		/*
		$options['verbosity']       = 0;
		$options['interactive']     = false;
		$options['explain']         = false;
		$options['local']           = false;
		$options['showSources']     = false;
		$options['extensions']      = array();
		$options['sniffs']          = array();
		$options['ignored']         = array();

		$options['reports'][$reportFormat] = null;
		$options['reportFile']      = null;

		$options['generator']       = '';
		$options['reports']         = array();
		$options['errorSeverity']   = null;
		$options['warningSeverity'] = null;

		$options['tabWidth'] = 0;
		$options['errorSeverity']   = 0;
		$options['encoding'] = 'iso-8859-1';
		$options['warningSeverity'] = 0;
		$options['reportWidth'] = 80;
		*/

		$options['showProgress'] = true;

		$phpcs = new PHP_CodeSniffer_CLI;
		$phpcs->checkRequirements();

		$numErrors = $phpcs->process($options);

		if ($numErrors)
		{
			$this->out(sprintf('<error> Finished with %d errors </error>', $numErrors));

			// @throw new \UnexpectedValueException('There have been errors.');
		}

		$this
			->out()
			->out('Finished =;)');
	}
}