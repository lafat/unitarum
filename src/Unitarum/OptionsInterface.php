<?php

namespace Unitarum;

/**
 * Class OptionsInterface
 * @package Unitarum
 */
interface OptionsInterface
{
    const FIXTURE_FOLDER_OPTION = 'fixtureFolder';

    public function __construct(array $options);

    /**
     * @return mixed
     */
    public function getFixtureFolder();

    /**
     * @param mixed $fixtureFolder
     * @return OptionsInterface
     */
    public function setFixtureFolder($fixtureFolder);
}
