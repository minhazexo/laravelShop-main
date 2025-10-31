import './bootstrap';
// Import jQuery
// Load jQuery and make it globally accessible
import $ from 'jquery';
window.$ = window.jQuery = $;

// Load Flot core
import 'flot';

// Load Flot plugins (resize & tooltip)
import 'flot/source/jquery.flot.resize';
import 'jquery.flot.tooltip';

