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
 * Activity types vocab.
 *
 * @package    logstore_trax
 * @copyright  2019 Sébastien Fraysse {@link http://fraysse.eu}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace logstore_trax\src\vocab;

defined('MOODLE_INTERNAL') || die();

/**
 * Activity types vocab.
 *
 * @package    logstore_trax
 * @copyright  2019 Sébastien Fraysse {@link http://fraysse.eu}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class activity_types extends vocab {

    /**
     * Vocab class.
     *
     * @var string $class
     */
    protected $class = 'activity_types';

    
    /**
     * Vocab items.
     *
     * @var array $items
     */
    protected $items = [
        'profile' => [
            'type' => 'http://adlnet.gov/expapi/activities/profile',
        ],

        // Structural concepts.

        'system' => [
            'type' => 'http://vocab.xapi.fr/activities/system',
        ],
        'course' => [
            'type' => 'http://vocab.xapi.fr/activities/course',
        ],
        'course_category' => [
            'type' => 'http://vocab.xapi.fr/activities/course-category',
        ],

        // Modules.

        'assign' => [
            'type' => 'http://vocab.xapi.fr/activities/assignment',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'production',
        ],
        'book' => [
            'type' => 'http://vocab.xapi.fr/activities/web-content',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'resource',
        ],
        'chat' => [
            'type' => 'http://vocab.xapi.fr/activities/chat-room',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'discussion',
        ],
        'choice' => [
            'type' => 'http://vocab.xapi.fr/activities/poll',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'feedback',
        ],
        'data' => [
            'type' => 'http://vocab.xapi.fr/activities/collaborative-content',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'resource',
        ],
        'feedback' => [
            'type' => 'http://vocab.xapi.fr/activities/poll',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'feedback',
        ],
        'folder' => [
            'type' => 'http://vocab.xapi.fr/activities/resources',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'resource',
        ],
        'forum' => [
            'type' => 'http://vocab.xapi.fr/activities/forum',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'discussion',
        ],
        'glossary' => [
            'type' => 'http://vocab.xapi.fr/activities/collaborative-content',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'resource',
        ],
        'imscp' => [
            'type' => 'http://vocab.xapi.fr/activities/web-content',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'resource',
            'standard' => 'imscp',
        ],
        'lesson' => [
            'type' => 'http://vocab.xapi.fr/activities/web-content',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'resource',
        ],
        'lti' => [
            'type' => 'http://vocab.xapi.fr/activities/external-activity',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'standard' => 'lti',
        ],
        'page' => [
            'type' => 'http://vocab.xapi.fr/activities/web-page',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'resource',
        ],
        'quiz' => [
            'type' => 'http://vocab.xapi.fr/activities/quiz',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'assessment',
        ],
        'resource' => [
            'type' => 'http://adlnet.gov/expapi/activities/file',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'resource',
        ],
        'scorm' => [
            'type' => 'http://vocab.xapi.fr/activities/web-content',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'resource',
            'standard' => 'scorm',
        ],
        'survey' => [
            'type' => 'http://vocab.xapi.fr/activities/survey',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'feedback',
        ],
        'url' => [
            'type' => 'http://vocab.xapi.fr/activities/web-link',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'resource',
        ],
        'wiki' => [
            'type' => 'http://vocab.xapi.fr/activities/collaborative-content',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'resource',
        ],
        'workshop' => [
            'type' => 'http://vocab.xapi.fr/activities/workshop',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'production',
        ],

        // SCORM items.

        'sco' => [
            'type' => 'http://vocab.xapi.fr/activities/content-object',
            'level' => 'http://vocab.xapi.fr/categories/inside-learning-unit',
            'standard' => 'scorm',
        ],

        // H5P modules.

        'hvp-single-question' => [
            'type' => 'http://vocab.xapi.fr/activities/poll',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'feedback',
        ],
        'hvp-quiz' => [
            'type' => 'http://vocab.xapi.fr/activities/quiz',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'assessment',
        ],
        'hvp-summary' => [
            'type' => 'http://vocab.xapi.fr/activities/quiz',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'assessment',
        ],
        'hvp-interactive-video' => [
            'type' => 'http://vocab.xapi.fr/activities/interactive-video',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'resource',
        ],
        'hvp-course-presentation' => [
            'type' => 'http://vocab.xapi.fr/activities/web-content',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'resource',
        ],
        'hvp-column' => [
            'type' => 'http://vocab.xapi.fr/activities/web-content',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'resource',
        ],

        // Trax Video.

        'traxvideo' => [
            'type' => 'http://vocab.xapi.fr/activities/resources',
            'level' => 'http://vocab.xapi.fr/categories/learning-unit',
            'family' => 'resource',
        ],

    ];


}
