<?php
/**
 * Barcode view helper
 *
 * PHP version 5
 *
 * Copyright (C) The National Library of Finland 2017.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @category VuFind
 * @package  View_Helpers
 * @author   Ere Maijala <ere.maijala@helsinki.fi>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org   Main Site
 */
namespace Finna\View\Helper\Root;

/**
 * Barcode view helper
 *
 * @category VuFind
 * @package  View_Helpers
 * @author   Ere Maijala <ere.maijala@helsinki.fi>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org   Main Site
 */
class Barcode extends \Zend\View\Helper\AbstractHelper
{
    /**
     * Create a barcode PNG
     *
     * @param string $code   String to use as the barcode
     * @param string $type   Barcode type
     * @param int    $width  Barcode narrow bar width
     * @param int    $height Barcode height
     *
     * @return string Base 64 encoded image data
     */
    public function createPng($code, $width = 2, $height = 30, $type = null)
    {
        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
        $type = null !== $type ? $type : $generator::TYPE_CODE_39;
        return base64_encode($generator->getBarcode($code, $type, $width, $height));
    }
}