<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * xAPI transformation of a Moodle event.
 *
 * @package    logstore_trax
 * @copyright  2019 Sébastien Fraysse {@link http://fraysse.eu}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace logstore_trax\src\statements\core;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/completionlib.php');

use logstore_trax\src\statements\base_statement;
use logstore_trax\src\utils\module_context;

/**
 * xAPI transformation of a Moodle event.
 *
 * @package    logstore_trax
 * @copyright  2019 Sébastien Fraysse {@link http://fraysse.eu}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class course_module_completion_updated extends base_statement {

    use module_context;

    /**
     * Plugin.
     *
     * @var string $plugin
     */
    protected $plugin;

    /**
     * Activity type.
     *
     * @var string $activitytype
     */
    protected $activitytype;

    
    /**
     * Build the Statement.
     *
     * @return array
     */
    protected function statement() {

        // Get data.
        list($completion, $module, $object) = $this->get_completion_data();
        if (!$completion) return false;
        list($verb, $result) = $this->get_verb_result($completion);

        // Init.
        $this->init($object);

        // Build the statement.
        return array_replace($this->base($module->name, true, $this->activitytype, $this->plugin), [
            'actor' => $this->actors->get('user', $this->event->userid),
            'verb' => $verb,
            'object' => $this->activities->get($module->name, $object->id, true, 'module', $this->activitytype, $this->plugin),
            'result' => $result
        ]);
    }

    /**
     * Init.
     *
     * @param \stdClass $object object
     * @return void
     */
    protected function init(\stdClass $object) {
    }

    /**
     * Get completion data.
     *
     * @return array
     */
    protected function get_completion_data() {
        global $DB;

        // Get completion.
        $completion = $DB->get_record('course_modules_completion', ['id' => $this->event->objectid], '*', MUST_EXIST);
        $cm = $DB->get_record('course_modules', ['id' => $completion->coursemoduleid], '*', MUST_EXIST);
        $module = $DB->get_record('modules', ['id' => $cm->module], '*', MUST_EXIST);
        $object = $DB->get_record($module->name, ['id' => $cm->instance], '*', MUST_EXIST);

        // Check that the completion is automated.
        if ($cm->completion != COMPLETION_TRACKING_AUTOMATIC) {
            return [false, false, false];
        }

        // Check the completion status.
        if (!in_array($this->eventother->completionstate, [COMPLETION_COMPLETE, COMPLETION_COMPLETE_PASS, COMPLETION_COMPLETE_FAIL])) {
            return [false, false, false];
        }

        return [$completion, $module, $object];
    }

    /**
     * Get verb and result.
     *
     * @param \stdClass $completion Completion
     * @return array
     */
    protected function get_verb_result(\stdClass $completion) {

        // Define the verb.
        $verb = $this->verbs->get('completed');

        // Define the success.
        $passed = null;
        switch ($completion->completionstate) {
            case COMPLETION_COMPLETE_PASS:
                $passed = true;
                break;
            case COMPLETION_COMPLETE_FAIL:
                $passed = false;
                break;
        }

        // Define the result.
        $result = [
            'completion' => true
        ];
        if (!is_null($passed)) {
            $result['success'] = $passed;
        }

        // Result.
        return [$verb, $result];
    }



}
