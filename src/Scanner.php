<?php

namespace WyriHaximus\RepositoryTemplate;

use League\Flysystem\FilesystemInterface;
use League\Flysystem\Plugin\ListFiles;

class Scanner
{
    /**
     * @param FilesystemInterface $templates
     * @param FilesystemInterface $targets
     * @return array
     */
    public static function scan(FilesystemInterface $templates, FilesystemInterface $targets)
    {
        $files = [];
        foreach ($templates->listFiles() as $template) {
            foreach ($targets->listFiles() as $target) {
                if (substr($template['path'], 0, -5) === $target['path']) {
                    $files[] = new File($template['path'], $target['path']);
                }
            }
        }

        return $files;
    }

    /**
     * @param FilesystemInterface $filesystem
     * @return FilesystemInterface
     */
    protected static function addPlugins(FilesystemInterface $filesystem)
    {
        $plugin = new ListFiles();
        $plugin->setFilesystem($filesystem);
        $filesystem->addPlugin($plugin);
        return $filesystem;
    }
}
