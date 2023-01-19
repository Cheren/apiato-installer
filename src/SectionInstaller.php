<?php

namespace Apiato\Installer;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class SectionInstaller extends LibraryInstaller
{
    protected const PACKAGE_TYPE = 'apiato-section';

    public function getInstallPath(PackageInterface $package): string
    {
        $sectionName = $package->getPrettyName();
        $extras = json_decode(json_encode($package->getExtra()));

        if (isset($extras->apiato->section->name)) {
            $sectionName = $extras->apiato->section->name;
        }

        return 'app/Containers/' . $sectionName;
    }

    public function supports($packageType): bool
    {
        return self::PACKAGE_TYPE === $packageType;
    }
}
