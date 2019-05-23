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
 * Trax Logs for Moodle.
 *
 * @package    logstore_trax
 * @copyright  2019 Sébastien Fraysse {@link http://fraysse.eu}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Plugin.

$string['pluginname'] = 'Trax Logs';
$string['pluginname_desc'] = 'A log plugin which transforms Moodle logs into xAPI statements, and sends then to your LRS.';


// Settings.

$string['lrs_settings'] = 'LRS Settings';
$string['lrs_settings_help'] = "The following settings should be found in your LRS.
    If you did'n choose an LRS yet, you should take a look at 
    <a href='http://traxlrs.com' target='_blank'>Trax LRS</a>.
    However, this plugin should work with any 
    <a href='https://adopters.adlnet.gov/products/all/0' target='_blank'>xAPI compliant LRS</a>.";

$string['lrs_endpoint'] = 'LRS endpoint';
$string['lrs_endpoint_help'] = "This is the URL used to call the xAPI services of your LRS.";

$string['lrs_username'] = 'LRS username (Basic HTTP)';
$string['lrs_username_help'] = "This is the username of the Basic HTTP account created on your LRS.";

$string['lrs_password'] = 'LRS password (Basic HTTP)';
$string['lrs_password_help'] = "This is the password of the Basic HTTP account created on your LRS.";

$string['xapi_identification_settings'] = 'xAPI Identification Settings';
$string['xapi_identification_settings_help'] = "In this section, you can define how users will 
    be identified in the Statements. Be carefull with data privacy and take a look at the 
    <a href='https://eugdpr.org/' target='_blank'>GDPR</a>.";

$string['platform_iri'] = 'Platform IRI';
$string['platform_iri_help'] = "An IRI that will identify your platform and will never change.";

$string['anonymization'] = 'Anonymization';
$string['anonymization_help'] = "Anonymize actors in Statements. 
    When selected, usernames are replaced by generated UUIDs.
    This option should be selected to conform with the GDPR.";

$string['xis_provide_names'] = 'Provide user names when requested';
$string['xis_provide_names_help'] = 'When this option is selected and when Web Services are activated, 
    client applications are allowed to get the user names using the "full" 
    option of the "logstore_trax_get_actors" function. 
    Be aware of the consequences in terms of GDPR compliance when you select this option.';

$string['logged_events'] = 'Logged events';
$string['logged_events_help'] = 'In this section, you can choose the events you want to send to the LRS.
    The sync mode must be set to "asynchronous". When set to "synchronous", all known events are sent.';

$string['firstlogs'] = 'First logs';
$string['firstlogs_help'] = "Format: DD/MM/YYYY. 
    This is the date of the first logs to sync from the Moodle standard logstore.";

$string['core_events'] = 'Moodle core events';
$string['core_events_help'] = 'Select event families you want to track.';
$string['authentication'] = 'Authentication';
$string['navigation'] = 'Navigation';
$string['completion'] = 'Completion';
$string['grading'] = 'Grading';

$string['moodle_components'] = 'Moodle components';
$string['moodle_components_help'] = 'Select Moodle components you want to track.';

$string['additional_components'] = 'Additional components';
$string['additional_components_help'] = 'Select additional components you want to track.';
$string['mod_hvp'] = 'H5P';
$string['other_components'] = 'Other components';

$string['data_transfert_settings'] = 'Data Transfer Settings';
$string['data_transfert_settings_help'] = 'This section defines how this plugin will transfer
    data to the LRS. Please, take the time to make tests and define the right settings 
    before going into production.';

$string['sync_mode'] = 'Sync mode';
$string['sync_mode_help'] = "In asynchronous mode, logs are read from the Moodle logstore
    with a CRON job. This is the best choice for production. In synchronous mode,
    events are catched in real time. Choose it for tests only.
    ";
$string['sync'] = 'Synchronous (test)';
$string['async'] = 'Asynchronous (production)';

$string['attempts'] = 'Attempts';
$string['attempts_help'] = "Number of attempts when a request fails (async mode only).";

$string['db_batch_size'] = 'Database batch size';
$string['db_batch_size_help'] = "Number of log entries that can be processed during a single CRON job.";

$string['xapi_batch_size'] = 'xAPI batch size';
$string['xapi_batch_size_help'] = "Number of Statements that can be grouped in a single POST request.";


// Exceptions.
$string['invalid_entry_identification'] = 'Invalid entry identification.';
$string['entry_not_found'] = 'Entry not found.';
$string['record_not_found'] = 'Record not found.';


// Privacy metadata.

$string['privacy:metadata:actors'] = 'Matching table between Moodle user ID and anonymous identifier used by external LRS.';
$string['privacy:metadata:actors:mid'] = 'User ID stored by Moodle';
$string['privacy:metadata:actors:uuid'] = 'Anonymous identifier sent to the external LRS';
$string['privacy:metadata:lrs'] = 'Logs generated by users are sent to an LRS which store them in its own database.';
$string['privacy:metadata:lrs:uuid'] = 'Anonymous identifier sent to the external LRS';


// Events.

$string['event_hvp_question_answered'] = 'H5P question answered';
$string['event_hvp_module_answered'] = 'H5P module answered (single question)';
$string['event_hvp_module_completed'] = 'H5P module completed';
$string['event_hvp_xapi_error_json'] = 'H5P xAPI event: invalid JSON string!';
$string['event_hvp_xapi_error_iri'] = 'H5P xAPI event: unknown object IRI!';
$string['event_hvp_xapi_error_unsupported'] = 'H5P xAPI event: unsupported event!';


// Tasks.

$string['sync_task'] = 'TRAX LOGS: sync Moodle standard logstore with the LRS.';




