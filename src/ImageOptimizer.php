<?php

declare(strict_types = 1);

namespace App;

use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Psr\Log\LoggerInterface;

class ImageOptimizer
{
    private const MAX_WIDTH = 300;
    private const MAX_HEIGHT = 250;

    /** @var Imagine */
    private $imagine;
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->imagine = new Imagine();
        $this->logger = $logger;
    }

    public function resize(string $filePath): void
    {
        list($iwidth, $iheight) = getimagesize($filePath);
        $ratio = $iwidth / $iheight;
        $width = self::MAX_WIDTH;
        $height = self::MAX_HEIGHT;
        if ($width / $height > $ratio) {
            $width = $height * $ratio;
        } else {
            $height = $width / $ratio;
        }

        $photo = $this->imagine->open($filePath);
        $this->logger->debug('RESIZE IMAGE PATH: ' . $filePath);

        $photo->resize(new Box($width, $height))->save($filePath);
    }
}
