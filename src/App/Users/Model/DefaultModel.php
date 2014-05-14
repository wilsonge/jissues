<?php
/**
 * Part of the Joomla Tracker's Users Application
 *
 * @copyright  Copyright (C) 2012 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

namespace App\Users\Model;

use Joomla\Filter\InputFilter;
use JTracker\Model\AbstractTrackerDoctrineModel;

/**
 * Default model class for the Users component.
 *
 * @since  1.0
 */
class DefaultModel extends AbstractTrackerDoctrineModel
{
	/**
	 * The name of the entity.
	 *
	 * @var string
	 *
	 * @since  1.0
	 */
	protected $entityName = 'User';

	/**
	 * Save the item.
	 *
	 * @param   array  $src  The source.
	 *
	 * @return  $this
	 *
	 * @since   1.0
	 * @throws  \UnexpectedValueException
	 */
	public function save(array $src)
	{
		if (isset($src['params']))
		{
			$src['params'] = json_encode($src['params']);
		}

		return parent::save($src);
	}
}
