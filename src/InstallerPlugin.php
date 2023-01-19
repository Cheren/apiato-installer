<?php

namespace Apiato\Installer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class InstallerPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $sectionInstaller = new SectionInstaller($io, $composer);
        $sectionContainerInstaller = new SectionContainerInstaller($io, $composer);

        $installationManager = $composer->getInstallationManager();

        $installationManager->addInstaller($sectionInstaller);
        $installationManager->addInstaller($sectionContainerInstaller);
    }

    public function deactivate(Composer $composer, IOInterface $io)
    {
    }

    public function uninstall(Composer $composer, IOInterface $io)
    {
    }
}
