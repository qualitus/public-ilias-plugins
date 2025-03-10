<?php

/**
 * This file is part of ILIAS, a powerful learning management system
 * published by ILIAS open source e-Learning e.V.
 *
 * ILIAS is licensed with the GPL-3.0,
 * see https://www.gnu.org/licenses/gpl-3.0.en.html
 * You should have received a copy of said license along with the
 * source code, too.
 *
 * If this is not the case or you just want to try ILIAS, you'll find
 * us at:
 * https://www.ilias.de
 * https://github.com/ILIAS-eLearning
 *
 *********************************************************************/

declare(strict_types=1);

namespace QU\LERQ\API;

use QU\LERQ\API\Service\Registration;
use QU\LERQ\Model\RoutinesModel;
use QU\LERQ\UI\Table\Data\Provider;

/**
 * @implements Provider<array{"name": string, "path": string, "active_overrides": RoutinesModel, "has_overrides": bool}>
 */
class ProviderTableProvider implements Provider
{
    public function getList(array $params, array $filter): array
    {
        $providerRegistration = new Registration();
        $providers = $providerRegistration->load();

        $items = [];
        foreach ($providers as $provider) {
            $items[] = [
                'name' => $provider->getName(),
                'path' => $provider->getPath(),
                'active_overrides' => $provider->getActiveOverrides(),
                'has_overrides' => $provider->getHasOverrides(),
            ];
        }

        return [
            'items' => $items,
            'cnt' => count($items)
        ];
    }
}
