<?php

namespace Unitarum;

use Unitarum\Exception\NotExistFileException;

/**
 * Class Reader
 * @package Unitarum
 */
class Reader implements ReaderInterface
{
    /**
     * @var string
     */
    private $fixturePath;

    /**
     * FixtureReader constructor.
     * @param string $fixturePath
     * @throws NotExistFileException
     */
    public function __construct(string $fixturePath)
    {
        $this->setPath($fixturePath);
    }

    public function getPath(): string
    {
        return $this->fixturePath;
    }

    /**
     * @param $fixturePath
     * @throws NotExistFileException
     */
    private function setPath($fixturePath)
    {
        if (!file_exists($fixturePath)) {
            throw new NotExistFileException('Path not exist! '.$fixturePath);
        }
        $this->fixturePath = $fixturePath;
    }

    /**
     * @param string $fixtureName
     * @return array
     */
    public function read(string $fixtureName): array
    {
        $filename = realpath($this->getPath() . DIRECTORY_SEPARATOR . $fixtureName . '.php');
        return (include $filename);
    }
}