<?php
/**
 * Represent a field in an active record and hold additional information from
 * the DatabaseManager
 *
 * This software is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License version 2.1 as published by the Free Software Foundation
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * @copyright  2007 Mayflower GmbH (http://www.mayflower.de)
 * @license    LGPL 2.1 (See LICENSE file)
 * @version    CVS: $Id:
 * @author     David Soria Parra <soria_parra@mayflower.de>
 * @package    PHProjekt
 * @subpackage Core
 * @link       http://www.phprojekt.com
 * @since      File available since Release 1.0
 */

/**
 * Represent a field in an active record and hold additional information from
 * the DatabaseManager
 *
 * @copyright  2007 Mayflower GmbH (http://www.mayflower.de)
 * @version    Release: @package_version@
 * @license    LGPL 2.1 (See LICENSE file)
 * @author     Eduardo Polidor <polidor@mayflower.de>
 * @package    PHProjekt
 * @subpackage Core
 * @link       http://www.phprojekt.com
 * @since      File available since Release 1.0
 * @todo       Remove this class when removing smarty and the FormViewRenderer
 */
class Phprojekt_DatabaseManager_Field
{
    protected $_dbManager;
    protected $_metadata = array();
    public $right='';
    public $value;

    /**
     * Initialise a new object
     *
     * @param Phprojekt_DatabaseManager $dbm   DatabaseManager Object
     * @param string                    $name  Name of the field
     * @param mixed                     $value Value of the field
     */
    public function __construct(Phprojekt_DatabaseManager $dbm, $name, $value)
    {
        $this->value     = (string) $value;
        $this->_metadata = $dbm->find($name);
    }

    /**
     * Get a value
     *
     * @param string $name Name of the field
     *
     * @return mix
     */
    public function __get($name)
    {
        if (isset($this->_metadata->$name)) {
            return $this->_metadata->$name;
        }

        return null;
    }

    /**
     * Function to print this class
     *
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}