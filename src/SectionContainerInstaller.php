<?php

namespace Apiato\Installer;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class SectionContainerInstaller extends LibraryInstaller
{
    protected const PACKAGE_TYPE = 'apiato-section-container';

    protected const DEFAULT_SECTION = 'Vendor';

    public function getInstallPath(PackageInterface $package): string
    {
        $extras = json_decode(json_encode($package->getExtra()));

        $containerName = self::DEFAULT_SECTION;
        if (isset($extras->apiato->container->name)) {
            $containerName = $extras->apiato->container->name;
        }

        $sectionName = $package->getPrettyName();
        if (isset($extras->apiato->section->name)) {
            $sectionName = $extras->apiato->section->name;
        }

        return "app/Containers/{$sectionName}/{$containerName}";
    }

    public function supports($packageType): bool
    {
        return self::PACKAGE_TYPE === $packageType;
    }
}