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
 * Config functions.
 *
 * @package    logstore_trax
 * @copyright  2019 Sébastien Fraysse {@link http://fraysse.eu}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace logstore_trax\src;

defined('MOODLE_INTERNAL') || die();

/**
 * Config functions.
 *
 * @package    logstore_trax
 * @copyright  2019 Sébastien Fraysse {@link http://fraysse.eu}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class config {

    /**
     * Synchronous mode.
     */
    const SYNC = 0;

    /**
     * Asynchronous mode.
     */
    const ASYNC = 1;

    
    /**
     * Get the sync modes.
     *
     * @return array
     */
    public static function sync_modes() {
        return [
            self::SYNC => get_string('sync', 'logstore_trax'),
            self::ASYNC => get_string('async', 'logstore_trax'),
        ];
    }

    /**
     * Is sync mode?
     *
     * @return bool
     */
    public static function sync() {
        return get_config('logstore_trax', 'sync_mode') == self::SYNC;
    }

    /**
     * Get the loggable core events.
     *
     * @return array
     */
    public static function loggable_core_events() {
        return [
            'authentication' => get_string('authentication', 'logstore_trax'),
            'navigation' => get_string('navigation', 'logstore_trax'),
            'completion' => get_string('completion', 'logstore_trax'),
            'grading' => get_string('grading', 'logstore_trax'),
        ];
    }

    /**
     * Get the core events selected by default.
     *
     * @return array
     */
    public static function default_core_events() {
        $default = array_map(function ($key, $comp) {
            return [$key => 1];
        }, array_keys(self::loggable_core_events()), self::loggable_core_events());
        return call_user_func_array("array_merge", $default);
    }

    /**
     * Get the core selected events.
     *
     * @param stdClass $config Config
     * @return array
     */
    public static function selected_core_events(\stdClass $config) {
        $families = explode(',', $config->core_events);
        $families = array_intersect_key(events::core(), array_flip($families));
        if (empty($families)) return [];
        return call_user_func_array("array_merge", $families);
    }

    /**
     * Get the loggable Moodle components.
     *
     * @return array
     */
    public static function loggable_moodle_components() {
        $components = events::moodle_components();
        $components = array_map(function ($key, $comp) {
            $parts = explode('_', $key);
            return [$key => get_string('modulename', $parts[1])];
        }, array_keys($components), $components);
        $components = call_user_func_array("array_merge", $components);
        return $components;
    }

    /**
     * Get the Moodle components selected by default.
     *
     * @return array
     */
    public static function default_moodle_components() {
        $default = array_map(function ($key, $comp) {
            return [$key => 1];
        }, array_keys(self::loggable_moodle_components()), self::loggable_moodle_components());
        return call_user_func_array("array_merge", $default);

    }

    /**
     * Get the selected Moodle components.
     *
     * @param stdClass $config Config
     * @return array
     */
    public static function selected_moodle_events(\stdClass $config) {
        $components = explode(',', $config->moodle_components);
        $components = array_intersect_key(events::moodle_components(), array_flip($components));
        if (empty($components)) return [];
        return call_user_func_array("array_merge", $components);

    }

    /**
     * Get the loggable additional components.
     *
     * @return array
     */
    public static function loggable_additional_components() {
        $components = events::additional_components();
        $components = array_map(function($key, $comp) {
            return [$key => get_string($key, 'logstore_trax')];
        }, array_keys($components), $components);
        $components = call_user_func_array("array_merge", $components);
        $components['other'] = get_string('other_components', 'logstore_trax');
        return $components;
    }

    /**
     * Get the additional components selected by default.
     *
     * @return array
     */
    public static function default_additional_components() {
        $default = array_map(function ($key, $comp) {
            return [$key => 1];
        }, array_keys(self::loggable_additional_components()), self::loggable_additional_components());
        return call_user_func_array("array_merge", $default);
    }

    /**
     * Get the additional selected events.
     *
     * @param stdClass $config Config
     * @return array
     */
    public static function selected_additional_events(\stdClass $config) {
        $components = explode(',', $config->additional_components);
        $key = array_search('other', $components);
        unset($components[$key]);
        $components = array_intersect_key(events::additional_components(), array_flip($components));
        if (empty($components)) return [];
        return call_user_func_array("array_merge", $components);
    }

    /**
     * Return true when the "Other components" checkbox is selected.
     *
     * @param stdClass $config Config
     * @return bool
     */
    public static function other_components_selected(\stdClass $config) {
        $additional = $config->additional_components;
        return isset($additional['other']) && $additional['other'];
    }

    /**
     * Get all the selected events.
     *
     * @param stdClass $config Config
     * @return array
     */
    public static function selected_events(\stdClass $config) {
        return array_merge(
            self::selected_core_events($config),
            self::selected_moodle_events($config),
            self::selected_additional_events($config)
        );
    }

    /**
     * Are other events selected?
     *
     * @param stdClass $config Config
     * @return bool
     */
    public static function other_events(\stdClass $config) {
        $components = explode(',', $config->additional_components);
        return in_array('other', $components);
    }
    

}
