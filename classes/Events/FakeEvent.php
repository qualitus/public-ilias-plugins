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

namespace QU\LERQ\Events;

class FakeEvent extends AbstractEvent
{
    public function handle_event(string $a_event, array $a_params): bool
    {
        $a_params['event'] = $a_event;
        $a_params['timestamp'] = time();

        return $this->save($a_params);
    }
}
