<?php
namespace TYPO3\TYPO3CR\Domain\Repository;

/*
 * This file is part of the TYPO3.TYPO3CR package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\TYPO3CR\Domain\Model\ContentDimension;

/**
 * A repository for access to available content dimensions (from configuration)
 *
 * @Flow\Scope("singleton")
 */
class ContentDimensionRepository
{
    /**
     * @var array
     */
    protected $dimensionsConfiguration = array();

    /**
     * Returns an array of content dimensions that are available in the system.
     *
     * @return array<\TYPO3\TYPO3CR\Domain\Model\ContentDimension>
     */
    public function findAll()
    {
        $dimensions = array();
        foreach ($this->dimensionsConfiguration as $dimensionIdentifier => $dimensionConfiguration) {
            $dimensions[] = new ContentDimension($dimensionIdentifier, $dimensionConfiguration['default']);
        }
        return $dimensions;
    }

    /**
     * Set the content dimensions available in the system.
     *
     * @param array $dimensionsConfiguration
     * @return void
     */
    public function setDimensionsConfiguration(array $dimensionsConfiguration)
    {
        $this->dimensionsConfiguration = $dimensionsConfiguration;
    }
}
